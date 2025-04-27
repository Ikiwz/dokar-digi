<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $data = array(
            "title" => "Dashboard",
            "menuDashboard" => "active",
            "jumlahUser" => User::count(),
        );

        return view('dashboard', $data);
    }
}
