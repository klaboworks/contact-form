<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Contact;
use App\Models\Category;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('category')->get();
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }

    public function search(Request $request)
    {
        $contacts = Contact::with('category')->CategorySearch($request->category_id)->get();
        $categories = Category::all();
        return view('admin', compact('contacts'));
    }
}
