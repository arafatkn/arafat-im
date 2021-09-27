<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\{User,Experience,Project,Testimonial,Submission,Subscriber};
use App\Notifications\{ContactFormSubmission};
use \Carbon\Carbon;
use Notification;

class PageController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->header();
        $this->data["awards"] = Storage::files('public/awards');
        $this->data["partners"] = Storage::files('public/partners');
        $this->data["clients"] = Storage::files('public/clients');
        $this->data["experiences"] = Experience::orderBy('joined_at','desc')->get();
        $this->data["projects"] = Project::orderBy('started_at','desc')->where('is_featured', 1)->get();
        $this->data["testimonials"] = Testimonial::all();
        $this->data["filters"] = ["Laravel", "VueJS", "NuxtJS", "Wordpress", "SASS", "PWA", "SPA", "SSR", "Education", "LMS", "Finance", "Classified", "Newspaper", "Magazine", "Blog", "Company", "Organization"];
        return $this->view('index');
    }

    public function management()
    {
        $this->header();
        $this->data["launch_date"] = "2020-06-30";
        return $this->view('comming-soon');
    }

    public function finder()
    {
        $this->header();
        $this->data["divisions"] = Division::orderBy('serial')->get();
        $this->data["districts"] = District::withCount(['tolets'])->get();
        return $this->view('finder');
    }

    public function about()
    {
        return $this->page('about');
    }

    public function contact()
    {
        return $this->page('contact');
    }

    public function contactPost(Request $req)
    {
        $req->validate([
            'name' => 'bail|required',
            'email' => 'bail|required|email',
            'message' => 'bail|required',
        ]);

        Notification::route('mail', 'arafatkn@gmail.com')
                        ->notify(new ContactFormSubmission($req));

        $sub = Submission::create([
            'type' => 'contact',
            'ip' => $req->ip(),
            'ua' => $req->userAgent(),
            'data' => $req->only(['name','mobile','email','subject','message']),
        ]);

        if($sub)
        {
            return response()->json(['message'=>'Message has been sent successfully!']);
        }
        else
        {
            return response()->json(['message'=>'Message can not be sent at this moment!'], 501);
        }
    }

    public function subscribe(Request $req)
    {
        $req->validate([
            'email' => 'bail|required|email',
        ]);

        $s = new Subscriber();
        $s->email = $req->email;
        $s->ip = $req->ip();
        $s->ua = substr($req->userAgent(), 0, 255);

        if($s->save())
        {
            return response()->json(['message'=>'You have been subscribed to our newsletter successfully.']);
        }
        else
        {
            return response()->json(['message'=>'Error subscribing to our newsletter']);
        }
    }

    public function page($slug)
    {
        $this->header();

        if(view()->exists('web.page.'.$slug))
        {
            $this->breadcrumbs[] = array('name' => 'Page', 'url'=> '', );
            return $this->view('page.'.$slug);
        }
        else
            return $this->view('page.404');
    }

}
