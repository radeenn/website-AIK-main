<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\View\View;

class PageController extends Controller
{
    public function team(): View
    {
        $members = Anggota::query()->orderBy('id')->get();

        return view('pages.team', compact('members'));
    }
}
