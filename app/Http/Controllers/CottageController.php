<?php

namespace App\Http\Controllers;

use App\Models\Cottage;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CottageController extends Controller
{

    public function index()
    {
    }

    public function create(Request $request)
    {
        $request->validate([
            'txtName' => 'required',
            'txtDescription' => 'required',
            'txtBeedrooms' => 'required',
            'txtToilets' => 'required',
            'txtPrice' => 'required'
        ]);
        $cottage = new Cottage();
        $cottage->name = $request->txtName;
        $cottage->description = $request->txtDescription;
        $cottage->beedrooms = $request->txtBeedrooms;
        $cottage->toilets = $request->txtToilets;
        $cottage->price = $request->txtPrice;
        $cottage->timestamps = false;
        if ($request->hasFile("txtImage")) {
            $image = $request->file("txtImage");
            $nombreImagen = Str::slug($request->txtImage) . "." . $image->guessExtension();
            $ruta = public_path("img");
            $image->move($ruta, $nombreImagen);
            $cottage->image = $nombreImagen;
        }
        $cottage->save();
        $cabanas = Cottage::orderBy("id", "DESC")->get();
        return view('partials.cottage-list', compact('cabanas'));
    }
    public function store(Request $request)
    {
    }

    public function show()
    {
        $cottages = Cottage::orderBy("id", "DESC")->get();
        return view('cottages', ['cabanas' => $cottages]);
    }

    public function edit($id)
    {
        $cottage = Cottage::find($id);
        return redirect()->route('cottages');
    }

    public function update(Request $request)
    {

        $cottage = Cottage::where('id', $request->idCabana)->update([
            'name' => $request->txtName2,
            'description' => $request->txtDescription2,
            'beedrooms' => $request->txtBeedrooms2,
            'toilets' => $request->txtToilets2,
            'price' => $request->txtPrice2,
        ]);
        if ($request->hasFile("txtImage2")) {
            $image = $request->file("txtImage2");
            $nombreImagen = Str::slug($request->txtImage2) . "." . $image->guessExtension();
            $ruta = public_path("img");
            $image->move($ruta, $nombreImagen);
            $cottage = Cottage::where('id', $request->idCabana)->update([
                'image' => $nombreImagen
            ]);
        }
        $cabanas = Cottage::orderBy("id", "DESC")->get();
        return view('partials.cottage-list', compact('cabanas'));
    }

    public function destroy(Request $request, Cottage $cottage)
    {
        Cottage::where('id', $request->idCabana3)->delete();
        $cabanas = Cottage::orderBy("id", "DESC")->get();
        return view('partials.cottage-list', compact('cabanas'));
    }
}
