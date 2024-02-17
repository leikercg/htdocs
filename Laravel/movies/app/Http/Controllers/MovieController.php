<?php

namespace App\Http\Controllers;

use App\Models\Genres;
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

    public function genero($g) {
        $genero=Genres::where('genre',$g)->first();//instancia de genero
        // o
        //$genero = Genres::where('genre', $g)->first(); para coger el primero
        $movies=Movie::where('genre_id',$genero->id)->get(); //para coger todos
        $data['movies']=$movies;
        $data['genero']= strtoupper($g);
        return view('genero',$data);
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

        $data['title']=$movie->title;
        $data['release_date']=$movie->release_date;
        $data['duration']=$movie->duration;
        $data['image']=$movie->image;
        $data['synopsis']=$movie->synopsis;

        $data['writers']=$movie->writers;

        $data['genre']=Genres::find($movie->genre_id)->genre;

        $data['director']=$movie->director;
        $data['leadActor']=$movie->leadActor;
        $data['writers']=$movie->writers;
        //$data['genre']=$movie->genres->genre;



        //Esto devuelve todos los datos de movie*/
        /* $data['title'] = $movie->title;
         $data['release_date'] = $movie->release_date;
         $data['duration'] = $movie->duration;
         $data['image'] = $movie->image;
         $data['synopsys'] = $movie->synopsys;
         $data['genre_id'] = $movie->genre_id;
         $data['director_id'] = $movie->director_id;
         $data['lean_actor_id'] = $movie->lean_actor_id;

         SE DEVEN DEVOLVER ARRAYS!!!
         */

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
