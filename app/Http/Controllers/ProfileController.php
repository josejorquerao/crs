<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $profile= User::where('id', Auth::user()->id)->first();
        return view('profile', compact('profile'));
    }
    
    public function validateEmail(Request $request)
    {
        $email = User::where('email', $request->email)->get();
            if (count($email) == 0) {
                return response()->json('true');
            } else {
                return response()->json('false');
            }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
