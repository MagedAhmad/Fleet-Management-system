<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Customer;
use App\Models\Feedback;
use App\Models\Project;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customersCount = Customer::count();
        
        return view('dashboard.home', get_defined_vars());
    }
}
