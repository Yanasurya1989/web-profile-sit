<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DetilJenjang;

class DetilJenjangFrontendController extends Controller
{
    public function showByLevel($level)
    {
        $detils = DetilJenjang::where('level', strtoupper($level))
            ->where('status', 1)
            ->get();

        $link = $detils->first()->link_pendaftaran ?? null;

        return view("jenjang." . strtolower($level), compact('detils', 'link'));
    }
}
