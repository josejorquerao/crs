<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = User::where('id', Auth::user()->id)->first();
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

    public function update(Request $request, User $profile)
    {
        $profile->name = $request->txtName;
        $profile->lastname = $request->txtLastname;
        $profile->email = $request->txtEmail;
        $profile->save();
        $contact = new Contact();
        $contact->timestamps = false;
        $contact->where('user_id', $profile->id)->update(['city' => $request->txtCity]);
        return view('dashboard.info-profile-dashboard', compact('profile'));
        //return redirect()->route('profile');
    }

    public function destroy($id)
    {
        //
    }
}
