<?php

namespace App\Http\Controllers;

use App\Models\Academician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AcademicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (! Gate::allows('manage-academicians')) {
            return $this->unauthorized();
        }
        $academicians = Academician::paginate(10);
        return view('academicians.index', compact('academicians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (! Gate::allows('manage-academicians')) {
            return $this->unauthorized();
        }
        return view('academicians.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (! Gate::allows('manage-academicians')) {
            return $this->unauthorized();
        }
        // Validate the request
        $request->validate([
            'staff_number' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:academicians,email',
            'college' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        // Create the Academician
        Academician::create($request->all());

        // Redirect to the index page or another view
        return redirect()->route('academicians.index')->with('success', 'Academician created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($staff_number)
    {
        // Fetch a specific academician by staff_number
        $academician = Academician::findOrFail($staff_number);
        return response()->json($academician);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($staff_number)
    {
        if (! Gate::allows('manage-academicians')) {
            return $this->unauthorized();
        }
        $academician = Academician::findOrFail($staff_number);
        return view('academicians.edit', compact('academician'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $staff_number)
    {
        if (! Gate::allows('manage-academicians')) {
            return $this->unauthorized();
        }
        // Validate the request
        $request->validate([
            'staff_number' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:academicians,email,' . $staff_number . ',staff_number',
            'college' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        // Find the Academician and update their details
        $academician = Academician::findOrFail($staff_number);
        $academician->update($request->all());

        // Redirect to the index page or another view
        return redirect()->route('academicians.index')->with('success', 'Academician updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($staff_number)
    {
        if (! Gate::allows('manage-academicians')) {
            return $this->unauthorized();
        }
        $academician = Academician::findOrFail($staff_number);
        $academician->delete();

        return redirect()->route('academicians.index')->with('success', 'Academician deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $academicians = Academician::where('name', 'LIKE', "%{$query}%")->get(['staff_number', 'name', 'email']);

        // Return a view with the search results
        return view('academicians.search_results', compact('academicians'));
    }
}
