<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function indexSetHalamanByStatus()
    {
        $vacancies = Vacancy::where('status', 'open')->get();

        if ($vacancies->count() > 0) {
            return view('vacancies.index', compact('vacancies'));
        }

        return view('vacancies.closed');
    }

    public function indexSetByStatus()
    {
        $vacancies = Vacancy::where('status', 'open')->latest()->get();
        return view('vacancies.index', compact('vacancies'));
    }

    public function indexMenampilkanSemua()
    {
        $vacancies = Vacancy::latest()->get();
        return view('vacancies.index', compact('vacancies'));
    }

    public function index()
    {
        $vacancies = Vacancy::where('is_active', true) // hanya ambil yang aktif
            // ->where('status', 'open')                  // kalau mau sekalian filter yang open
            ->latest()
            ->get();

        return view('vacancies.index', compact('vacancies'));
    }

    public function notify(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        return back()->with('status', 'Thank you! We will notify you when new vacancies are available.');
    }

    public function create()
    {
        return view('vacancies.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'qualifications' => 'nullable|array',
            'status' => 'required|in:open,closed',
            'is_active' => 'boolean',
        ]);

        Vacancy::create($data);

        return redirect()->route('admin.vacancies.adminIndex')
            ->with('success', 'Lowongan berhasil ditambahkan');
    }

    public function edit(Vacancy $vacancy)
    {
        return view('vacancies.admin.edit', compact('vacancy'));
    }

    public function update(Request $request, Vacancy $vacancy)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'qualifications' => 'nullable|array',
            'status' => 'required|in:open,closed',
            'is_active' => 'boolean',
        ]);

        $vacancy->update($data);

        return redirect()->route('admin.vacancies.adminIndex')
            ->with('success', 'Lowongan berhasil diperbarui');
    }

    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return redirect()->route('vacancies.index')->with('success', 'Lowongan berhasil dihapus');
    }

    public function adminIndex()
    {
        $vacancies = Vacancy::latest()->get();
        return view('vacancies.admin.index', compact('vacancies'));
    }

    public function toggleActive(Vacancy $vacancy)
    {
        $vacancy->update([
            'is_active' => !$vacancy->is_active
        ]);

        return back()->with('success', 'Status aktif berhasil diperbarui');
    }

    public function toggleStatus(Vacancy $vacancy)
    {
        $vacancy->update([
            'status' => $vacancy->status === 'open' ? 'closed' : 'open'
        ]);

        return back()->with('success', 'Status lowongan berhasil diperbarui');
    }
}
