<?php

namespace App\Http\Controllers;

use App\Models\Movie;


use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return view('index', ['movies' => $movies]); //array clave--> valor
        //en las vistas se reciben las variables ya extraidas, no hay que indexarlars.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
    $movie=Movie::find($id);
    $data['director']=$movie->director;



    //Esto devuelve todos los datos de movie*/
   /* $data['title'] = $movie->title;
    $data['release_date'] = $movie->release_date;
    $data['duration'] = $movie->duration;
    $data['image'] = $movie->image;
    $data['synopsys'] = $movie->synopsys;
    $data['genre_id'] = $movie->genre_id;
    $data['director_id'] = $movie->director_id;
    $data['lean_actor_id'] = $movie->lean_actor_id;*/

    return view('pelicula', $data);


        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
