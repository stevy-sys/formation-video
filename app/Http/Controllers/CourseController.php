<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        //on recupere la relation avec user + compteur de episode en relation avec course
        $courses = Course::with("user")->withCount("episodes")->get();

        //dd($courses);
        return Inertia::render('Courses/Index',compact('courses')); //directement dans Pages
    }
}
