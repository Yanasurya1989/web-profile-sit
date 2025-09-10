<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function create()
    {
        $vacancies = Vacancy::where('status', 'open')->get();
        return view('vacancies.applications.create', compact('vacancies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vacancy_id' => 'required|exists:vacancies,id',
            'nama_pelamar' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'nomor_wa' => 'required|string',
            'jurusan' => 'nullable|string',
            'sekolah_universitas' => 'required|string',
            'nilai_ipk' => 'nullable|string',
            'jumlah_lembar_tilawah' => 'nullable|integer',
            'hafalan_bersanad' => 'nullable|boolean',
            'riwayat_penyakit' => 'nullable|string',
            'surat_lamaran' => 'nullable|file|mimes:pdf,doc,docx',
            'cv' => 'nullable|file|mimes:pdf,doc,docx',
            'transkrip_nilai' => 'nullable|file|mimes:pdf,doc,docx',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        // Handle upload
        foreach (['surat_lamaran', 'cv', 'transkrip_nilai', 'foto'] as $file) {
            if ($request->hasFile($file)) {
                $data[$file] = $request->file($file)->store('applications/' . $file, 'public');
            }
        }

        Application::create($data);

        return redirect()->back()->with('success', 'Lamaran berhasil dikirim!');
    }

    public function index()
    {
        $vacancies = Vacancy::withCount('applications')->get();
        return view('vacancies.applications.index', compact('vacancies'));
    }

    public function show(Vacancy $vacancy)
    {
        $applications = Application::where('vacancy_id', $vacancy->id)->latest()->get();
        return view('vacancies.applications.show', compact('vacancy', 'applications'));
    }
}
