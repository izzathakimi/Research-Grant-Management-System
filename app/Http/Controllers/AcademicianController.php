<?php

namespace App\Http\Controllers;

use App\Models\Academician;
use Illuminate\Http\Request;

class AcademicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academicians = Academician::paginate(10);
        return view('academicians.index', compact('academicians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('academicians.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
    public function edit(Academician $academician)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $staff_number)
    {
        // Validate and update the academician
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:academicians,email,' . $staff_number . ',staff_number',
            'college' => 'sometimes|required|string|max:255',
            'department' => 'sometimes|required|string|max:255',
            'position' => 'sometimes|required|string|max:255',
        ]);

        $academician = Academician::findOrFail($staff_number);
        $academician->update($request->all());
        return response()->json($academician);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($staff_number)
    {
        // Delete the academician
        $academician = Academician::findOrFail($staff_number);
        $academician->delete();
        return response()->json(null, 204);
    }
}
