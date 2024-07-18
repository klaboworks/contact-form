<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Contact;
use App\Models\Category;
use App\Models\User;
use Symfony\Component\HttpFoundation\StreamedResponse;

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
        $contacts = Contact::with('category')
            ->KeywordSearch($request->keyword)
            ->GenderSearch($request->gender)
            ->CategorySearch($request->category_id)
            ->DateSearch($request->created_at)
            ->get();
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }

    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        $contacts = Contact::with('category')->get();
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }

    public function csv()
    {
        $contacts = Contact::all();
        $csvHeader = ['id', 'category_id', 'first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'detail', 'created_at', 'updated_at'];
        $csvData = $contacts->toArray();

        $response = new StreamedResponse(function () use ($csvHeader, $csvData) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $csvHeader);

            foreach ($csvData as $row) {
                fputcsv($handle, $row);
            }

            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="users.csv"',
        ]);

        return $response;
    }
}
