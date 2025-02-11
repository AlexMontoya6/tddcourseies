<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;

class PageHomeController extends Controller
{
    public function __invoke()
    {
        $courses = Course::query()
            ->released()
            ->orderByDesc('released_at')
            ->get();

        $categories = Category::query()
            ->orderBy('name')
            ->get();

        return view('pages.home', compact(['courses', 'categories']));
    }
}
