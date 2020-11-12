<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\visits;
use App\patients;
use App\appointments;

class dashboardController extends Controller
{
    public function getDashboard(){
        $count_patients = patients::count();
        $count_visits = visits::count();
        $count_appointments = appointments::count();
        return view('admin_layouts.dashboard',compact('count_patients','count_visits','count_appointments'));
    }
    public function getGraphs(){
        $data=patients::select('age','first_name')->get();
        return response()->json($data);
    }
    public function getPieChart(){
        $data=patients::select('age','first_name')->get();
        return response()->json($data);
    }
}
