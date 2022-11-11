<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        $request->validate([
            'txtName' => 'required',
            'txtDescription' => 'required',
            'txtPrice' => 'required',
        ]);
        $service = new Service();
        $service->name = $request->txtName;
        $service->description = $request->txtDescription;
        $service->price = $request->txtPrice;
        $service->timestamps = false;
        if ($request->hasFile("txtImage")) {
            $image = $request->file("txtImage");
            $nombreImagen = Str::slug($request->txtImage) . "." . $image->guessExtension();
            $ruta = public_path("img");
            $image->move($ruta, $nombreImagen);
            $service->image = $nombreImagen;
        }
        $service->save();
        $services = Service::orderBy("id", "DESC")->get();
        return view('partials.service-list', compact('services'));
    }
    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        $services = Service::orderBy("id", "DESC")->get();
        return view('services', ['services' => $services]);
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return redirect()->route('services');
    }

    public function update(Request $request, Service $service)
    {
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->timestamps = false;
        if ($request->hasFile("image")) {
            $image = $request->file("image");
            $nombreImagen = Str::slug($request->image) . "." . $image->guessExtension();
            $ruta = public_path("img");
            $image->move($ruta, $nombreImagen);
            $service->image = $nombreImagen;
        }
        $service->save();
        return redirect()->route('services');
    }

    public function destroy(Service $service)
    {

        $service->delete();
        return redirect()->route('services');
    }
}
