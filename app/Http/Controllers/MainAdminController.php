<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class MainAdminController extends Controller
{
    public function create(){
        dd(Event::all());
        return view('admin.event.create');
    }

    public function store(Request $request){

        $validated = $request->validate([
        'title'    => 'required|string|max:255',
        'format'   => 'required|string|max:100',
        'tags'     => 'required|string|max:255',
        'content'     => 'required|string|min:100',
        'date'     => 'required|date',
        'location' => 'required|string|max:100',
        'age_minimum' =>'required|min:0',
        'age_maximum' =>'required|max:100',
        'image'    => '',
    ]);

    $image = $request->file('image');
    $imageName   = time() . '_' . $image->getClientOriginalName();
    $image->move(public_path('images'), $imageName);

    // Сохранение, например:
    Event::create([
        'title'    => $validated['title'],
        'format'   => $validated['format'],
        'tags'     => $validated['tags'],
        'content'     => $validated['content'],
        'date'     => $validated['date'],
        'location' => $validated['location'],
        'image'    => $imageName,
        'age_minimum' =>$validated['age_minimum'],
        'age_maximum' => $validated['age_maximum'],
        'user_id'  => auth()->id(),
    ]);

        return redirect('/');

    }

    public function delete(){

    }
    public function api_info_data(){
        //return response($eventData = [
    /* 'title' => 'Summer Tech Conference',
    'content' => 'A full-day conference focused on the latest in web and mobile development.',
    'location' => 'Kyiv, Ukraine',
    'age_minimum' => 18,
    'age_maximum' => 35,
    'tags' => 'technology,web,conference',
    'format' => 'offline',
    'user_id' => 1, // повинен існувати користувач з таким ID
    'image' => 'images/events/summer-tech-2025.jpg',
    'date' => '2025-08-10', *//*
]); */
    return response(Event::all());

    }
}
