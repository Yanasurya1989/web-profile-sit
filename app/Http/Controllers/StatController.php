<?php

namespace App\Http\Controllers;

use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    private $icons = [
        'bi bi-people-fill',
        'bi bi-person-badge-fill',
        'bi bi-building',
        'bi bi-award-fill',
        'bi bi-star-fill',
        'bi bi-heart-fill',
        'bi bi-gear-fill',
        'bi bi-lightning-fill',
        'bi bi-check-circle-fill',
        'bi bi-x-circle-fill',
    ];

    public function index()
    {
        $stats = Stat::all();
        return view('stats.index', compact('stats'));
    }

    public function create()
    {
        $icons = $this->icons;
        return view('stats.create', compact('icons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon'   => 'required',
            'number' => 'required|integer',
            'label'  => 'required|string|max:255',
        ]);

        Stat::create($request->only('icon', 'number', 'label'));

        return redirect()->route('stats.index')->with('success', 'Stat berhasil ditambahkan.');
    }

    public function edit(Stat $stat)
    {
        $icons = $this->icons;
        return view('stats.edit', compact('stat', 'icons'));
    }

    public function update(Request $request, Stat $stat)
    {
        $request->validate([
            'icon'   => 'required',
            'number' => 'required|integer',
            'label'  => 'required|string|max:255',
        ]);

        $stat->update($request->only('icon', 'number', 'label'));

        return redirect()->route('stats.index')->with('success', 'Stat berhasil diperbarui.');
    }

    public function destroy(Stat $stat)
    {
        $stat->delete();
        return redirect()->route('stats.index')->with('success', 'Stat berhasil dihapus.');
    }
}
