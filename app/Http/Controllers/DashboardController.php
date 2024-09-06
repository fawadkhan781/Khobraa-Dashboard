<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Job;
use App\Models\Receipt;
use App\Models\Staff;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'customers' => Customer::count(),
            'staff' => Staff::count(),
            'jobs' => Job::count(),
            'receipts' => Receipt::count(),
        ];

        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        return view('pages.dashboards.index', compact('data'));
    }
}