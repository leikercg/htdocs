<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $productList = Product::all();
        return view('all', ['productList' => $productList]); //array clave--> valor
        //en las vistas se reciben las variables ya extraidas, no hay que indexarlars.
    }

    public function show($id)
    {
        $p               = Product::find($id);
        $data['product'] = $p;
        return view('product.show', $data);
    }

    public function create()
    {
        return view('form');
    }

    public function store(Request $r)
    {
        $p              = new Product();
        $p->name        = $r->name;
        $p->description = $r->description;
        $p->price       = $r->price;
        $p->save();
        return redirect()->route('product.index');

        /* Método alternativo
        public function store() {
            $email = request("email");
            $asunto = request("asunto");
        }*/

        /*      EN caso de fillable
        $product = Product::create([
         name' => 'Producto 1',
        'description' => 'Descripción del producto 1',
        'price' => 99.99,
        ]);
         */
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('form', ['product' => $product]);
    }

    public function update($id, Request $r)
    {
        $p              = Product::find($id);
        $p->name        = $r->name;
        $p->description = $r->description;
        $p->price       = $r->price;
        $p->save();
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $p = Product::find($id);
        $p->delete();
        return redirect()->route('product.index');
    }

    // Error 404 si el artículo no existe
    //$myArticle = Article::findOrFail($id);
    // SELECT con WHERE
    //$articlesList = Article::where('id', '>', 100)->get();
    // SELECT con WHERE y TAKE
    //$articlesList = Article::where('id', '>', 100)->take(10)->get();
    // Devuelve el último id asignado
    //$maxId = Article::max('id');

}
