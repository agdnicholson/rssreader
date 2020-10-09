<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class Index extends Controller
{
    /**
     * Index Controller / Home
     */
    public function index()
    {
        return view('index');
    }
}