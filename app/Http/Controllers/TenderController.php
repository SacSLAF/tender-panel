<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tender;

class TenderController extends Controller
{
    // Show all tenders
    public function index()
    {
        // $tenders = Tender::all();
        // return view('admin.tenders.index', compact('tenders'));
        $tenders = Tender::paginate(10); // Paginate with 10 items per page
        return view('admin.tenders.index', compact('tenders'));
    }

    // Show the form to create a new tender
    public function create()
    {
        return view('admin.tenders.create');
    }

    // Store a new tender in the database
    public function store(Request $request)
    {
        $request->validate([
            'tender_no' => 'required',
            'category' => 'required',
            'entitled_to_quote' => 'required',
            'items' => 'required',
            'date_of_opening' => 'required|date',
            'type' => 'required|in:local,foreign',
        ]);

        Tender::create($request->all());

        return redirect()->route('admin.tenders.index')->with('success', 'Tender created successfully.');
    }

    // Show the form to edit an existing tender
    public function edit(Tender $tender)
    {
        return view('admin.tenders.edit', compact('tender'));
    }

    // Update an existing tender
    public function update(Request $request, Tender $tender)
    {
        $request->validate([
            'tender_no' => 'required',
            'category' => 'required',
            'entitled_to_quote' => 'required',
            'items' => 'required',
            'date_of_opening' => 'required|date',
            'type' => 'required|in:local,foreign',
        ]);

        $tender->update($request->all());

        return redirect()->route('admin.tenders.index')->with('success', 'Tender updated successfully.');
    }

    // Delete a tender
    public function destroy(Tender $tender)
    {
        $tender->delete();

        return redirect()->route('admin.tenders.index')->with('success', 'Tender deleted successfully.');
    }
}
