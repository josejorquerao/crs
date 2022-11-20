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
        try {
            if ($request->ajax()) {
                $user = new User();
                $user->name = $request->get('nameRegister');
                $user->lastname = $request->get('lastnameRegister');
                $user->email = $request->get('emailRegister');
                $user->password = Hash::make($request->get('passwordRegister'));
                $user->save();
                $lastUserId = User::latest('id')->first();
                $role=Role::latest('id')->first();
    
                $lastUserId->assignRole($role);
                
                $contact = new Contact();
                $contact->city = $request->get('cityRegister');
                $contact->user_id = User::max('id');
                $contact->email= $request->get('emailRegister');
                $contact->guest_id=1;
                $contact->id=Contact::max('id')+1;
                $contact->timestamps = false;
                $contact->save();
                return response()->json(['success' => 'true']);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => 'false']);
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
