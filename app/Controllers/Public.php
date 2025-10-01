<?php namespace App\Controllers\Public;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        // View Public Dashboard
        return view('public/dashboard'); 
    }
}