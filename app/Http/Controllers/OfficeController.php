<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckUserStatus;
use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    function __construct()
    {
        // Apply the auth middleware to all actions in this controller
        $this->middleware('auth');
        $this->middleware(middleware: CheckUserStatus::class);

        $this->middleware('permission:عرض المكاتب', ['only' => ['index', 'show']]);
        $this->middleware('permission:اضافة مكتب', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل مكتب', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف مكتب', ['only' => ['destroy']]);
    }

    public function index()
    {
        $offices = Office::with(['creator'])->get();

        return view('offices.index', compact('offices'));
    }

    public function create()
    {
        return view('offices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'map_url' => 'nullable|string',
            'phone' => 'required|numeric|regex:/^7\d{8}$/|digits:9|unique:offices,phone',
            'contact_person' => 'required|string|max:255',
        ]);

        Office::create([
            'name' => $request->name,
            'location' => $request->location,
            'map_url' => $request->map_url,
            'phone' => $request->phone,
            'contact_person' => $request->contact_person,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('offices')
            ->with('icon', 'success')
            ->with('msg', 'تم إضافة المكتب بنجاح');
    }

    public function show(Office $office)
    {
        return view('offices.show', compact('office'));
    }

    public function edit(Office $office)
    {
        return view('offices.edit', compact('office'));
    }

    public function update(Request $request, Office $office)
    {
        // تحقق من صحة بيانات الطلب
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'map_url' => 'nullable|url',
            'phone' => 'required|numeric|regex:/^7\d{8}$/|digits:9|unique:offices,phone,' . $office->id,
            'contact_person' => 'required|string|max:255',
        ]);

        $office->update([
            'name' => $request->name,
            'location' => $request->location,
            'map_url' => $request->map_url,
            'phone' => $request->phone,
            'contact_person' => $request->contact_person,
        ]);

        return redirect()->route('offices')
            ->with('icon', 'success')
            ->with('msg', 'تم تحديث المكتب بنجاح');
    }

    public function destroy(Office $office)
    {
        $office->delete();
        return redirect()->route('offices')
            ->with('icon', 'success')
            ->with('msg', 'تم حذف المكتب بنجاح');
    }
}
