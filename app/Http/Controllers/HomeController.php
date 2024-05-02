<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Member;
use App\Models\Stok;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.home', [
            "title" => "Dashboard",
            "menuCount" => Menu::count(),
            "memberCount" => Member::count(),
            "stokCount" => Stok::SUM('jumlah')
        ]);
    }
}
