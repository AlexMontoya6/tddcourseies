<x-guest-layout :page-title="config('app.name')">

    <div class="container">
        <h1>Crear Curso</h1>
        <form action="{{ route('courses.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="learnings">Aprendizajes</label>
                <textarea class="form-control" id="learnings" name="learnings" required placeholder='Ejemplo: ["Laravel", "Blade", "Eloquent"]'></textarea>
            </div>

            <div class="form-group">
                <label for="released_at">Fecha de Lanzamiento</label>
                <input type="date" class="form-control" id="released_at" name="released_at" required>
            </div>

            <div class="form-group">
                <label for="paddle_product_id">Paddle Product ID</label>
                <input type="text" class="form-control" id="paddle_product_id" name="paddle_product_id" required>
            </div>

            <div class="form-group">
                <label for="tagline">Eslogan</label>
                <input type="text" class="form-control" id="tagline" name="tagline" required>
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>

            <div class="form-group">
                <label for="image_name">Nombre de la Imagen</label>
                <input type="text" class="form-control" id="image_name" name="image_name" required>
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" required>
            </div>

            <button type="submit" class="btn btn-primary">Crear Curso</button>
        </form>
    </div>

    </x-guest-layout>
