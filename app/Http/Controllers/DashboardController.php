<?php

namespace App\Http\Controllers;

use App\Models\dnc;
use App\Models\lead;
use App\Models\User;
use App\Models\dncNumber;
use App\Models\sanitized;
use App\Models\leadNumber;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user=User::count();
        $dnc=dncNumber::count();
        $lead=leadNumber::count();
        $sanitized=sanitized::count();
        return view('admin.index',compact(['user','lead','dnc','sanitized']));
    }
}
