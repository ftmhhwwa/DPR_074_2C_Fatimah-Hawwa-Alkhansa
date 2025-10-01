<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        // View Admin Dashboard
        return view('admin/dashboard'); 
    }
}