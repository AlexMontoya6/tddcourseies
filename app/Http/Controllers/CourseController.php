<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CourseController extends Controller
{
    public function create()
    {

        return view('pages.courses-create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'paddle_product_id' => 'required',
            'title' => 'required',
            'tagline' => 'required',
            'description' => 'required',
            'image_name' => 'required',
            'slug' => 'required',
            'released_at' => 'required|date',
            'learnings' => 'required|string', // Se recibe como texto
        ]);

        // Convertir el string de learnings a JSON
        $data['learnings'] = json_decode($data['learnings'], true);

        if (!is_array($data['learnings'])) {
            return redirect()->back()->withErrors(['learnings' => 'El formato de Aprendizajes debe ser un JSON válido.']);
        }

        Course::create($data);

        return redirect()->route('pages.home')->with('success', 'Curso creado exitosamente.');
    }

    public function edit($id) {


    }

    public function update(Request $request, $id) {}

    public function destroy($id) {

    }
}
