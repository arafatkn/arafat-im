<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\{User,Project,Testimonial};

class ProjectController extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->setRoute('projects');
        $this->setView('projects');
    }

    public function index()
    {
        $this->header();
        $this->data["clients"] = Storage::files('public/clients');
        $this->data["projects"] = Project::orderBy('started_at','desc')->take(30)->get();
        $this->data["testimonials"] = Testimonial::all();
        $this->data["filters"] = ["Laravel", "VueJS", "NuxtJS", "Wordpress", "SASS", "PWA", "SPA", "SSR", "Education", "LMS", "Finance", "Classified", "Newspaper", "Magazine", "Blog", "Company", "Organization"];
        return $this->view('index');
    }

}
