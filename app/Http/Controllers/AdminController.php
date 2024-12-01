<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use App\Models\Staf;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $stafsCount = Staf::count();
        $pengunjungsCount = Pengunjung::count();
        $usersCount = User::count();
         return view('admin.master', ['staf_count' => $stafsCount, 'pengunjung_count' => $pengunjungsCount, 'user_count' => $usersCount]);
    }
    

    
}
