<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    public function index(){

        $enrollments = Enrollment::all();
        return view('enrollment_index', compact('enrollments'));

    }
}
