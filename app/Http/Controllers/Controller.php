<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\{Setting};

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $data = array(), $breadcrumbs = array(), $default, $setting, $public, $req;
    protected $view = "", $route = "";
    protected $user, $page, $today, $count;

    function __construct()
    {
        $this->public = Storage::disk('public');
        $this->req = request();
    }

    public function setView($v)
    {
    	$this->view .= $v.'.';
    }
    public function setRoute($r)
    {
    	$this->route .= $r.'.';
    }

    protected function loadSettings()
    {
        /* $settings = Setting::all();

        $this->setting =  app('StdClass');

        foreach($settings as $set)
        {
            if(strpos($set->name, '.') === false)
                $this->setting->{$set->name} = $set->value;
            else
            {
                $s = explode('.', $set->name);
                if(count($s)==2)
                {
                    if(!isset($this->setting->{$s[0]}))
                        $this->setting->{$s[0]} = app('StdClass');
                    $this->setting->{$s[0]}->{$s[1]} = $set->value;
                }
                else
                    $this->setting->{$set->name} = $set->value;
            }
        } */
        $this->setting = (object) config('settings');
        $this->data["setting"] = $this->setting;
    }

    public function header()
    {
        if(Auth::check())
            $this->user = Auth::user();
        $this->loadSettings();
        $default = app('stdClass');
        $this->count = app('stdClass');
/*
        $this->today = app('stdClass');
        $this->today->date = today();
        $this->count->courses = Course::count(); */

        $this->page = app('stdClass');
        $this->page->title = "MessBook - Platform for Bachelors";
        $this->page->type = "website";
        $this->page->locale = "bn_BD";
        $this->page->author = "MessBook Softwares Ltd.";
        $this->page->image = url('/ogimage.png');
        $this->page->description = "MessBook is a Platform for Bachelors combining with App, WebApp and Messenger Bot which will reduce the pain of bachelors like students, job holders who live in mess.";
    }

    public function notfound($file='')
    {
    	$this->breadcrumbs = array('name' => 'Not Found', 'url'=> '#', );
    	if(empty($file))
    		return $this->view('404');
    	else
    		return $this->view($file);
    }
    public function view($file="index")
    {
        //$this->data["notifications"] = collect([]);//$this->user->notifications()->latest()->take(5)->get();
        $this->data["default"] = $this->default;
        $this->data["user"] = $this->user;
        $this->data['public'] = $this->public;
        $this->data["req"] = $this->req;
        $this->data["route"] = route($this->route.'index');
        $this->data["breadcrumbs"] = $this->breadcrumbs;
        $this->data["page"] = $this->page;
        return view($this->view.$file, $this->data);
    }
    public function route($file,$id='')
    {
        if(empty($id))
            return route($this->route.$file);
        else
            return route($this->route.$file, $id);
    }
}
