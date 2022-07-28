<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required','string','max:255','min:3',Rule::unique('users','username')],
            'email' => ['required','email:rfc,dns',Rule::unique('users','email')],
            'password' => ['required', 'string', 'min:8',],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        auth()->login($user);

        return redirect('/')->with('success','Welcome Dear '.$request->name);
    }

    public function logout()
    {
        auth()->logout();
        return  redirect('/');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function check_login()
    {
       $data = request()->validate([
            'email' => ['required','email:rfc,dns',Rule::exists('users','email')],
            'password' => ['required', 'string', 'min:8'],
        ],[
            'email.required' => "We need your email!"
        ]);

        if(auth()->attempt($data)){
            return redirect('/')->with('success','Welcome back');
        }else{
            return redirect()->back()->withErrors([
                'email' => 'User credentials wrong'
            ]);
        }
    }
}
