<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tender;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $tenderCount = Tender::count();
        $userCount = Admin::count();
        return view('admin.dashboard', compact('tenderCount', 'userCount'));
    }
}
