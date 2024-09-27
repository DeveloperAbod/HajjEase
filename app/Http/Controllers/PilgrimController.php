<?php

namespace App\Http\Controllers;

use App\Enums\IdentityType;
use App\Http\Middleware\CheckUserStatus;
use App\Models\Pilgrim;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class PilgrimController extends Controller
{

    function __construct()
    {
        // Apply the auth middleware to all actions in this controller
        $this->middleware('auth');
        $this->middleware(CheckUserStatus::class);
    }

    // Display a list of all pilgrims
    public function index()
    {
        $pilgrims = Pilgrim::all();
        return view('pilgrims.index', compact('pilgrims'));
    }

    // Show the form for creating a new pilgrim
    public function create()
    {
        return view('pilgrims.create');
    }

    // Store a newly created pilgrim in the database
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'identity_number' => 'required|numeric',
            'identity_type' => ['required', new Enum(IdentityType::class)], // Validate using Enum rule
            'phone' => 'numeric|digits:9|regex:/^7\d{8}$/|required|unique:pilgrims,phone',
            'health_status' => 'required|string|max:255',
        ]);

        // Create a new pilgrim instance
        Pilgrim::create([
            'name' => $request->name,
            'identity_number' => $request->identity_number,
            'identity_type' => $request->identity_type,
            'phone' => $request->phone,
            'health_status' => $request->health_status,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('pilgrims')
            ->with('icon', 'success')
            ->with('msg', 'تم إضافة الحاج بنجاح');
    }

    // Show a specific pilgrim
    public function show(Pilgrim $pilgrim)
    {
        return view('pilgrims.show', compact('pilgrim'));
    }

    // Show the form for editing an existing pilgrim
    public function edit(Pilgrim $pilgrim)
    {
        return view('pilgrims.edit', compact('pilgrim'));
    }

    // Update the specified pilgrim in the database
    public function update(Request $request, Pilgrim $pilgrim)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'identity_number' => 'required|numeric',
            'identity_type' => ['required', new Enum(IdentityType::class)], // Validate using Enum rule
            'phone' => 'numeric|digits:9|regex:/^7\d{8}$/|required|unique:pilgrims,phone,' . $pilgrim->id,
            'health_status' => 'required|string|max:255',
        ]);

        // Update the pilgrim with the new data
        $pilgrim->update([
            'name' => $request->name,
            'identity_number' => $request->identity_number,
            'identity_type' => $request->identity_type,
            'phone' => $request->phone,
            'health_status' => $request->health_status,
        ]);

        return redirect()->route('pilgrims')
            ->with('icon', 'success')
            ->with('msg', 'تم تحديث الحاج بنجاح');
    }

    // Delete the specified pilgrim from the database
    public function destroy(Pilgrim $pilgrim)
    {
        // Delete the pilgrim
        $pilgrim->delete();
        return redirect()->route('pilgrims')
            ->with('icon', 'success')
            ->with('msg', 'تم حذف الحاج بنجاح');
    }
}
