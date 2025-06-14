<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tender;


class FrontEndController extends Controller
{
    /**
     * Display the front-end view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tenders = Tender::all();
        return view('frontend.index',compact('tenders'));
    }
}
