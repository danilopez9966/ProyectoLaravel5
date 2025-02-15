<x-app-layout>
    <x-mios.base>
    <div class="w-1/2 mx-auto p-4 rounded-xl shadow-xl bg-gray-100">
    <form action="{{route('tags.update',$tag)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
            <input type="text" value="{{@old('name',$tag->name)}}"
            id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Nombre de la etiqueta">
            <x-input-error for="name" />
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Decripcion:</label>
            <input type="description" value="{{@old('description',$tag->description)}}"
            id="description" name="description" class="shadow rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <x-input-error for="description" />
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Enviar
            </button>
            <a href="{{route('tags.index')}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Cancelar
            </a>
        </div>
    </form>
    </div>
    </x-mios.base>
</x-app-layout>