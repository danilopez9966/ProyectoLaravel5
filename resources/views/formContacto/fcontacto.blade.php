<x-app-layout>
    <x-mios.base>
        <h3 class="text-2xl font-bold text-center mb-4">FORMULARIO DE CONTACTO</h3>
        <div class="p-4 rounded-2xl shadow-xl border-2 border-black">
            <form method="post" action="{{route('contacto.procesar')}}">
                @csrf
                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="mt-1 block w-full p-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
                    <x-input-error for="nombre" />
                </div>
                @guest
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full p-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
                    <x-input-error for="email" />
                </div>
                @endguest
                <div class="mb-4">
                    <label for="body" class="block text-sm font-medium text-gray-700">Mensaje</label>
                    <textarea id="body" name="body" rows="4" class="mt-1 block w-full p-2 border rounded-md focus:ring-blue-500 focus:border-blue-500"></textarea>
                    <x-input-error for="body" />
                </div>
                <div class="flex justify-between">
                    <button type="reset" class="px-4 py-2 bg-gray-400 text-white rounded-md hover:bg-gray-500">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Enviar</button>
                </div>
            </form>
        </div>
    </x-mios.base>
</x-app-layout>