<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    // form apply dari tombol "Daftar"
    public function create(Request $request)
    {
        $vacancies = Vacancy::where('status', 'open')->get();
        $selectedVacancyId = $request->get('vacancy_id'); // dari query string

        return view('vacancies.applications.create', compact('vacancies', 'selectedVacancyId'));
    }

    // simpan lamaran
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
            'transkrip_nilai' => 'required|mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/jpeg,image/png|max:2048',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->except(['surat_lamaran', 'cv', 'transkrip_nilai', 'foto']);

        // upload file
        foreach (['surat_lamaran', 'cv', 'transkrip_nilai', 'foto'] as $file) {
            if ($request->hasFile($file)) {
                $data[$file] = $request->file($file)->store("applications/{$file}", 'public');
            }
        }

        $data['user_id'] = auth()->id();

        Application::create($data);

        // return redirect()->route('vacancies.index')->with('success', 'Lamaran berhasil dikirim!');
        return redirect()->route('user.applications.index')->with('success', 'Lamaran berhasil dikirim!');
        // return redirect()->route('home')->with('success', 'Lamaran berhasil dikirim!');
    }

    // admin melihat daftar vacancy + jumlah pelamar
    public function index()
    {
        $vacancies = Vacancy::withCount('applications')->get();
        return view('vacancies.applications.index', compact('vacancies'));
    }

    // admin melihat pelamar per vacancy
    public function show(Vacancy $vacancy)
    {
        $applications = Application::where('vacancy_id', $vacancy->id)->latest()->get();
        return view('vacancies.applications.show', compact('vacancy', 'applications'));
    }

    public function detil($id)
    {
        $application = Application::with('vacancy', 'user')->findOrFail($id);
        return view('vacancies.applications.detil', compact('application'));
    }

    public function updateStatusCek(Request $request, Application $application)
    {
        try {
            $request->validate([
                'status' => 'required|in:accepted,rejected,process',
            ]);

            $application->status = $request->status;
            $application->save();

            return redirect()->back()->with('success', 'Status pelamar berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function updateStatus(Request $request, Application $application)
    {
        $request->validate([
            'status' => 'required|in:accepted,rejected,process',
        ]);

        $application->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status pelamar berhasil diubah!');
    }


    public function indexUser()
    {
        // ambil data aplikasi user yang login
        $applications = auth()->user()->applications ?? collect();

        return view('vacancies.applications.user.index', compact('applications'));
    }
}
