<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Borrower;

class BorrowersController extends Controller
{
    public function index()
    {
        return view('books.borrowers');
    }

    public function create(Request $request)
    {
        $rules = [];
        $borrowers = $request->input('borrowers');
        foreach ($borrowers as $index => $borrower) {
            if (!empty($borrower['name'])) {
                $rules["borrowers.{$index}.email"] = 'required|email';
                $rules["borrowers.{$index}.phone"] = 'required|string';
            }
        }
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('borrowers.index')
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($validator->passes()) {
            foreach ($borrowers as $borrower) {
                if (!empty($borrower['name'])) {
                    Borrower::create([
                        'name' => $borrower['name'],
                        'email' => $borrower['email'],
                        'phone' => $borrower['phone'],
                    ]);
                }
            }
            return redirect()->route('borrowers.index')->with('success', 'Borrowers added successfully');
        }
    }
}
