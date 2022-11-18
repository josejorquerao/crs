<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ContactController;
use App\Models\Contact;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    protected function userStore(Request $request)
    {
        if ($request->ajax()) {
            $user = new User();
            $user->name = $request->get('name');
            $user->lastname = $request->get('lastname');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->save();
            $lastUserId = User::latest('id')->first();

            $lastUserId->assignRole(Role::latest('id')->first());
            
            $contact = new Contact();
            $contact->city = $request->get('city');
            $contact->user_id = $lastUserId->id;
            $contact->timestamps = false;
            $contact->save();
            return response()->json(['success' => 'true']);
        }
    }
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
