<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    function __construct()
    {
        // Apply the auth middleware to all actions in this controller
        $this->middleware('auth');
    }

    // عرض قائمة بجميع المكاتب
    public function index()
    {
        $offices = Office::with(['creator'])->get();

        return view('offices.index', compact('offices'));
    }

    // عرض نموذج إنشاء مكتب جديد
    public function create()
    {
        return view('offices.create');
    }

    // تخزين مكتب جديد في قاعدة البيانات
    public function store(Request $request)
    {
        // تحقق من صحة بيانات الطلب
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'map_url' => 'nullable|string',
            'phone' => 'required|numeric|regex:/^7\d{8}$/|digits:9|unique:offices,phone',
            'contact_person' => 'required|string|max:255',
        ]);

        // إنشاء مكتب جديد
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

    // عرض تفاصيل مكتب معين
    public function show(Office $office)
    {
        return view('offices.show', compact('office'));
    }

    // عرض نموذج تعديل مكتب معين
    public function edit(Office $office)
    {
        return view('offices.edit', compact('office'));
    }

    // تحديث المكتب المحدد في قاعدة البيانات
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

        // تحديث المكتب بالبيانات الجديدة
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

    // حذف المكتب المحدد من قاعدة البيانات
    public function destroy(Office $office)
    {
        // حذف المكتب
        $office->delete();
        return redirect()->route('offices')
            ->with('icon', 'success')
            ->with('msg', 'تم حذف المكتب بنجاح');
    }
}