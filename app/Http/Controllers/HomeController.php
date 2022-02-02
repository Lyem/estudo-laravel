<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Event;

class HomeController extends Controller
{
    private $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    public function index()
    {
        $events = $this->event->with('photos')->paginate(10);
        return view('home', ['events'=> $events]);
    }

    public function show($slug)
    {
        try{
            $event = $this->event->whereSlug($slug)->first();
        }
        catch(Exception $e){
            $event = false;
        }

        return view('event', ['event' => $event]);
    }
}
