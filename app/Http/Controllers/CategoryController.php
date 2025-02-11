<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $coursesAll = Course::all();
        $courses = $category->categoryCourses()->get();
        return view('pages.category-list' , compact('courses', 'category', 'coursesAll'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'courses' => 'nullable|array',
        ]);

        $category = Category::create($request->only('name'));

        $category->categoryCourses()->attach($request->courses);

        return redirect()->route('pages.home');

    }
}
