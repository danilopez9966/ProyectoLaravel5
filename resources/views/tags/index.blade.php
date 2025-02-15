<x-app-layout>
    <x-mios.base>
        <div class="flex flex-row-reverse mb-2">
            <a href="{{route('tags.create')}}" class="p-2 rounded-xl text-white font-bold bg-blue-500 hover:bg-blue-700">
                <i class="fas fa-add mr-2"></i>NUEVA
            </a>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Descripcion
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$item->name}}
                        </th>
                        <td class="px-6 py-4">
                            <div class="p-2 rounded-xl w-32">
                                {{$item->description}}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <form method="POST" action="{{route('tags.destroy', $item)}}">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('tags.edit', $item)}}"><i class="fas fa-edit text-blue-500 hover:text-xl"></i></a>
                                <button type="submit"><i class="fas fa-trash text-red-500 hover:text-xl"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-mios.base>
    @session('mensaje')
    <script>
        Swal.fire({
            title: "{{session('mensaje')}}",
            icon: "success",
            draggable: true
        });
    </script>
    @endsession
</x-app-layout>