<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Enrollment;
use App\Models\Course;

use DB;
use PDF;

class EnrollmentController extends Controller
{
    public function index(){

        $course_id = isset($_GET['course_id']) ? $_GET['course_id'] : "ALL";
        $search = isset($_GET['search']) ? $_GET['search'] : null;

        $enrollments = Enrollment::query();

        if($course_id != 'ALL'){
            $enrollments = $enrollments->where('course_id', $course_id);
        }

        if($search){
            $enrollments = $enrollments->whereHas('user', function($query) use ($search){
                $query->where('name', 'LIKE', '%'.$search.'%');
                $query->orWhere('email', 'LIKE', '%'.$search.'%');
            })->orWhereHas('course', function($query) use ($search){
                $query->where('name', 'LIKE', '%'.$search.'%');
                $query->orWhere('description', 'LIKE', '%'.$search.'%');
            });
        }

        //$enrollments = DB::select('select * from users;');
        //dd($enrollments);

        $total = $enrollments->count();
        $enrollments = $enrollments->paginate(3);

        $courses = Course::all();
        return view('enrollment_index', compact('enrollments','courses','course_id','search','total'));

    }

    public function pdf(){

        $course_id = isset($_GET['course_id']) ? $_GET['course_id'] : "ALL";
        $search = isset($_GET['search']) ? $_GET['search'] : null;

        $enrollments = Enrollment::query();

        if($course_id != 'ALL'){
            $enrollments = $enrollments->where('course_id', $course_id);
        }

        if($search){
            $enrollments = $enrollments->whereHas('user', function($query) use ($search){
                $query->where('name', 'LIKE', '%'.$search.'%');
            });
        }

        $total = $enrollments->count();
        $enrollments = $enrollments->paginate(3);

        $courses = Course::all();
        $pdf = PDF::loadView('enrollment_pdf', compact('enrollments','courses','course_id','search','total'));
        return $pdf->download('Enrollment.pdf');

    }
}
