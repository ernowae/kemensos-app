<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = [
            'title'             => 'Dashboard',
            'page_category'     => 'Dashboard',
        ];
        return view('dashboard.dashboard')->with($params);
    }
}
