<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('admin.index');
    }

    public function users(): View
    {
        return view('admin.users.index');
    }

    public function categories(): View
    {
        return view('admin.categories.index');
    }
}
