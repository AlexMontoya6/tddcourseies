<div>
    <!-- Botón para abrir el modal -->
    <button wire:click="openModal" class="btn btn-primary">
        Crear categoría
    </button>

    <!-- Modal: se muestra solo si $isOpen es true -->
    @if ($isOpen)
        <!-- Fondo semi-transparente -->
        <div
            class="fixed inset-0 flex items-center justify-center z-50"
            style="background-color: rgba(0, 0, 0, 0.5);"
            x-data
            x-on:click.away="$wire.closeModal()"
        >
            <!-- Contenedor del modal; x-on:click.stop evita que el clic se propague al fondo -->
            <div class="bg-white p-6 rounded shadow-lg relative" x-on:click.stop>
                <!-- Botón de cierre (X) -->
                <button
                    class="absolute top-0 right-0 mt-2 mr-2 text-gray-600 hover:text-gray-800"
                    wire:click="closeModal"
                >
                    X
                </button>

                <!-- Formulario para crear categoría -->
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="name" class="block text-gray-700">Nueva categoría</label>
                        <input type="text" class="form-control border rounded w-full p-2" id="name" name="name" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="courses" class="block text-gray-700">Seleccionar cursos</label>
                        <select id="courses" name="courses[]" class="form-control border rounded w-full p-2" multiple>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded">
                        Crear Categoría
                    </button>
                </form>
            </div>
        </div>
    @endif
</div>
