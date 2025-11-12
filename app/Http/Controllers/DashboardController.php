<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Certificate;
use App\Models\Sharing;
use App\Models\Education;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'certificates' => Certificate::count(),
            'sharings' => Sharing::count(),
            'education' => Education::count(),
        ];
        
        return view('dashboard.index', compact('stats'));
    }
}

