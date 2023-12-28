<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    public function index()
    {
        return view('admin.permohonan.index');
    }

    public function create()
    {
        return view('admin.permohonan.create');
    }
}
