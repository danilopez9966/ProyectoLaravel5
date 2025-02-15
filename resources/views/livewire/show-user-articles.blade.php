<x-mios.base>
    <div class="flex w-full items-center mb-4 justify-between">
        <div class="mb-4">
            <x-input type="search" placeholder="buscar...." wire:model.live="buscar" />
        </div>
        <div>
            @livewire('crear-article')
        </div>
    </div>
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
                            TAG ID
                        </th>
                        <th scope="col" class="px-6 py-3 text-center font-semibold uppercase tracking-wider cursor-pointer">
                            Contenido
                        </th>
                        <th scope="col" class="px-6 py-3 text-center font-semibold uppercase tracking-wider cursor-pointer">
                            Fecha
                        </th>
                        <th scope="col" class="px-6 py-3 text-center font-semibold uppercase tracking-wider cursor-pointer">
                            Aciones
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
                            {{$item->tag_id}}
                        </td>
                        <td class="px-6 py-4 text-center font-semibold text-gray-900 dark:text-white">
                            {{$item->content}}
                        </td>
                        <td class="px-6 py-4 text-center font-semibold text-gray-900 dark:text-white">
                            {{$item->updated_at->format('d-m-Y H:i')}}
                        </td>
                        <td class="px-6 py-4 text-center font-semibold text-gray-900 dark:text-white">
                        <button wire:click="mostrarAlerta({{$item->id}})">
                            <i class="fas fa-trash text-red-500 text-lg hover:text-2xl"></i>
                        </button>
                        <button wire:click="edit({{$item->id}})">
                            <i class="fas fa-edit text-lg text-blue-500 hover:text-2xl"></i>
                        </button>
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
    <!-- Modal para actualizar -->
    <x-dialog-modal wire:model="openUpdate">
        <x-slot name="title">
            EDITAR ARTICULO
        </x-slot>
        <x-slot name="content">
            <!-- Título -->
            <div>
                <label for="title" class="block text-gray-600 font-medium mb-1">Título</label>
                <div class="relative">
                    <input type="text" wire:model="uform.title" id="title" name="title" class="w-full border rounded-lg px-4 py-2 pl-10 focus:ring focus:ring-blue-300" placeholder="Título del post">
                    <x-input-error for="uform.title" />
                    <i class="fas fa-heading absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>

            <!-- Contenido -->
            <div>
                <label for="content" class="block text-gray-600 font-medium mb-1">Contenido</label>
                <textarea wire:model="uform.content" id="content" name="content" rows="4" class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-300" placeholder="Escribe el contenido aquí"></textarea>
                <x-input-error for="uform.content" />
            </div>

            <!-- Tag -->
            <div>
                <label for="tag_id" class="block text-gray-600 font-medium mb-1">Tag</label>
                <select name="tag_id" id="tag_id" wire:model="uform.tag_id">
                    @foreach($tags as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                <x-input-error for="uform.tag_id" />
            </div>

            <x-slot name="footer">
                <!-- Botón de envío -->
                <button wire:click="update" wire:loading.attr="disabled" type="submit" class="bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                    <i class="fas fa-paper-plane mr-2"></i> Actualizar
                </button>
                <button wire:click="cancelar" type="submit" class="bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition">
                    <i class="fas fa-xmark mr-2"></i> Cancelar
                </button>
            </x-slot>
        </x-slot>
    </x-dialog-modal>
</x-mios.base>