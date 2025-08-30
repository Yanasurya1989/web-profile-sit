<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::orderBy('order')->get();
        return view('admin.section.index', compact('sections'));
    }

    public function toggleActive(Section $section)
    {
        $section->update(['is_active' => !$section->is_active]);
        return redirect()->back()->with('success', 'Status section berhasil diubah.');
    }

    public function updateOrder(Request $request)
    {
        $orders = $request->order; // array section_id => order

        foreach ($orders as $id => $order) {
            Section::where('id', $id)->update(['order' => $order]);
        }

        return response()->json(['success' => true]);
    }
}
