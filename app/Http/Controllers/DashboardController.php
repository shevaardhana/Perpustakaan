<?php

namespace App\Http\Controllers;

use App\Models\TransactionHeader;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ongoing = TransactionHeader::where('status','ONGOING')->count();
        $receive = TransactionHeader::where('status','RECEIVED')->count();
        $process = TransactionHeader::where('status','PROCESS')->count();
        $late = TransactionHeader::where('status','LATE')->count();

        return view('backend.pages.dashboard')->with([
            'ongoing' => $ongoing,
            'receive' => $receive,
            'process' => $process,
            'late' => $late
        ]);
    }
}
