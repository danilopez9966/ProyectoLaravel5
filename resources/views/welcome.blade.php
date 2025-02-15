<x-app-layout>
    <x-mios.base>
        <h3 class="text-center text-2xl mb-2">ARTICULOS</h3>
        <div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-collapse border border-gray-300 dark:border-gray-600 shadow-lg rounded-lg overflow-hidden">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                        <tr class="border-b border-gray-300 dark:border-gray-600">
                            <th scope="col" class="px-6 py-3 text-center font-semibold uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-center font-semibold uppercase tracking-wider cursor-pointer">
                                Titulo
                            </th>
                            <th scope="col" class="px-6 py-3 text-center font-semibold uppercase tracking-wider cursor-pointer">
                                Nombre Tag
                            </th>
                            <th scope="col" class="px-6 py-3 text-center font-semibold uppercase tracking-wider cursor-pointer">
                                Email Usuario
                            </th>
                            <th scope="col" class="px-6 py-3 text-center font-semibold uppercase tracking-wider cursor-pointer">
                                Contenido
                            </th>
                            <th scope="col" class="px-6 py-3 text-center font-semibold uppercase tracking-wider cursor-pointer">
                                Fecha
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $item)
                        <tr class="bg-white dark:bg-gray-800 border-b border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200">
                            <td class="p-4 text-center font-medium text-gray-900 dark:text-white">
                                {{$item->id}}
                            </td>
                            <td class="px-6 py-4 text-center font-semibold text-gray-900 dark:text-white">
                                {{$item->title}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{$item->tag->name}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{$item->user->email}}
                            </td>
                            <td class="px-6 py-4 text-center font-semibold text-gray-900 dark:text-white">
                                {{$item->content}}
                            </td>
                            <td class="px-6 py-4 text-center font-semibold text-gray-900 dark:text-white">
                                {{$item->updated_at->format('d-m-Y H:i')}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            {{$articles->links()}}
        </div>
    </x-mios.base>
    @session('mensaje')
    <script>
        Swal.fire("{{session('mensaje')}}");
    </script>
    @endsession
</x-app-layout>