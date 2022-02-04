<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Event;
use App\Http\Requests\PhotoRequest;
use Illuminate\Support\Facades\Storage;

class EventPhotoController extends Controller
{
    private $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
        $this->middleware('user.has.event')->only('store', 'index','destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($event)
    {
        $event = $this->event->find($event);
        return view('admin.events.photos', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotoRequest $request, $event)
    {
        $uploadedPhotos = [];
        foreach($request->file('photos') as $photo)
        {
            $uploadedPhotos[] = ['photo' => $photo->store('events/photos', 'public')];
        }
        $event = $this->event->find($event);
        $event->photos()->createMany($uploadedPhotos);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($event, $photo)
    {
        $event = $this->event->find($event);
        $photo = $event->photos()->find($photo);
        if(!$photo) return redirect('admin.events.index');
        if(Storage::disk('public')->exists($photo->photo))
        {
            Storage::disk('public')->delete($photo->photo);
        }
        $photo->delete();
        return redirect()->back();
    }
}
