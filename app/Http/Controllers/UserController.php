<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // show register/create form
    public function create() {
        return view('users.register');
    }

    // store new User data
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6'] 
            // confirmed używamy tylko wtedy jeżeli name dla pola 
            // do potwierdzenia hasło ma na końcu _confirmation
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // tworzymy nowego użytkownika i automatycznie się logujemy
        $user = User::create($formFields);
        // Login - użyjemy helpera do uwierzytelniania auth
        auth()->login($user);

        return redirect('/')->with('message','Utworzono konto i zalogowano');
    }

    // logout User
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message','Użytkownik został wylogowany');
    }

    // show login form
    public function login(){
        return view('users.login');
    }

    // authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Użytkownik zalogował się poprawnie !!!');
        }

        return back()->withErrors(['email' => 'Nieprawidłowe dane uwierzytelniające'])
        ->onlyInput('email');
    }
}
