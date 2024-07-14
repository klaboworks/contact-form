<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Contact;
use App\Models\User;

class AdminController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function createAccount(UserRequest $request)
    {
        $user = $request->only(['name', 'email', 'password']);
        User::create($user);
        return view('login');
    }

    public function login()
    {
        return view('login');
    }

    public function loginSucces()
    {
        
    }

    public function index()
    {
        $contacts = Contact::Paginate(7);
        return view('admin', compact('contacts'));
    }
}
