<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\PurchasedCourse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageCourseDetailsController extends Controller
{
    public function __invoke(Course $course)
    {
        if (! $course->released_at) {
            throw new NotFoundHttpException;
        }

        if (auth()->check()) {
            $user = auth()->user();
            $purchased = PurchasedCourse::where('user_id', $user->id)
                ->where('course_id', $course->id)
                ->exists();

            if ($purchased) {

                return redirect()->route('pages.course-videos', compact('course'));
            }
        }

        $course->loadCount('videos')->toSql();

        return view('pages.course-details', compact('course'));
    }
}
