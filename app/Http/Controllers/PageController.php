<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Houses;
use App\Services;

class PageController extends Controller
{
    public function login()
    {
        return view("login");
    }

    public function dieukhoan()
    {
        return view("dieukhoan");
    }

    public function chinhsachbaomat()
    {
        return view("chinhsachbaomat");
    }

    public function contact()
    {
        return view("contact");
    }

    public function index()
    {
        $houses = Houses::all();
        $services = Services::all();
        return view('index', ['houses' => $houses, 'services' => $services]);
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('searchkey');

        $houses = Houses::where('header', 'LIKE', '%' . $searchTerm . '%')->get();
        $services = Services::where('header', 'LIKE', '%' . $searchTerm . '%')->get();

        return view('search', ['houses' => $houses, 'services' => $services, 'searchTerm' => $searchTerm]);
    }

    public function housedetail($slug)
    {
        $house = Houses::where('slug', $slug)->first();
        if (!$house) {
            return redirect()->back()->with('error', 'Quầy hiện không tồn tại');
        }
        return view('quay', ['house' => $house]);
    }

    public function servicedetail($slug)
    {
        $service = Services::where('slug', $slug)->first();
        if (!$service) {
            return redirect()->back()->with('error', 'Dịch vụ hiện không tồn tại');
        }
        return view('dichvu', ['service' => $service]);
    }

    public function forgotpassword()
    {
        return view("forgot-password");
    }

    public function register()
    {
        return view("register");
    }
}
