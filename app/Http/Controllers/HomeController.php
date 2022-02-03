<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\{Event, Category};

class HomeController extends Controller
{
    private $event;
    private $category;

    public function __construct(Event $event, Category $category)
    {
        $this->event = $event;
        $this->category = $category;
    }

    public function index()
    {
        $events = $this->event->with('photos');

        if($query = request()->query('title')){
            $events->where('title', 'LIKE', '%' . $query . '%');
        }

        if($query = request()->query('category')){
            $events = $this->category->whereSlug($query)->first()->events();
        }

        $events->whereRaw('DATE(start_event) >= DATE(NOW())');

        $events = $events->paginate(10);

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
