<?php
namespace App\Http\Controllers;
use App\Models\Cottage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CottageController extends Controller
{

    public function index()
    {
        
    }

    public function create(Request $request)
    {
        $cottage= new Cottage();
        $cottage->name = $request->name;
        $cottage->description = $request->description;
        $cottage->beedrooms = $request->beedrooms;
        $cottage->toilets = $request->toilets;
        $cottage->price = $request->price;
        $cottage->timestamps = false;
        if($request->hasFile("image")){
            $image = $request->file("image");
            $nombreImagen = Str::slug($request->image).".".$image->guessExtension();
            $ruta = public_path("img");
            $image->move($ruta,$nombreImagen);
            $cottage->image = $nombreImagen;
        }
        $cottage->save();
        $cabanas=Cottage::all();
        return view('cottages', compact('cabanas'));
    }

    public function store(Request $request)
    {
        
    }

    public function show()
    {
        $cottages=Cottage::all();
        return view('cottages',['cabanas'=>$cottages]);
    }

    public function edit($id)
    {
        $cottage= Cottage::find($id);
        return redirect()->route('cottages');
    }

    public function update(Request $request, Cottage $cottage)
    {
        $cottage->name = $request->name;
        $cottage->description = $request->description;
        $cottage->beedrooms = $request->beedrooms;
        $cottage->toilets = $request->toilets;
        $cottage->price = $request->price;
        $cottage->timestamps = false;
        $cottage->save();
        return redirect()->route('cottages');
    }

    public function destroy(Cottage $cottage)
    {
        $cottage->delete();
        return redirect()->route('cottages');
    }
}