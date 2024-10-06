<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function table() 
    {
        return view('halaman.table');
    }

    public function dataTable() 
    {
        return view('halaman.data-table');
    }
}

