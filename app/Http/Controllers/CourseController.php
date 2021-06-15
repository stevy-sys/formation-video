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

    public function show($id)
    {
        $course = Course::where("id",$id)->with("episodes")->first();

        $watched = auth()->user()->episodes ;
        return Inertia::render('Courses/Show',compact('course','watched'));
    }

    public function toggleProgess(Request $request)
    {
        $id =$request->episodeId;
        $user = auth()->user();

        $user->episodes()->toggle($id);

        return $user->episodes;
    }
}
