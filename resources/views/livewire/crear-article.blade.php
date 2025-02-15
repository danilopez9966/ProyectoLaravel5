<div>
    <x-button class="font-bold" wire:click="$set('openCrear',true)">
        <i class="fas fa-add mr-2"></i>NUEVO
    </x-button>
    <x-dialog-modal maxWidth="4xl" wire:model="openCrear">
        <x-slot name="title">
            CREAR ARTICULO
        </x-slot>
        <x-slot name="content">
            <div class="container mt-5">
                <h2>Crear Articulo</h2>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" wire:model="cform.title">
                    <x-input-error for="cform.title" />
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <input type="text" class="form-control" id="content" name="content" wire:model="cform.content">
                    <x-input-error for="cform.content" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Tag</label>
                    <select name="tag_id" id="tag_id" wire:model="cform.tag_id">
                    @foreach($tags as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                    </select>
                    <x-input-error for="cform.tag_id" />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <!-- Botón de envío -->
            <button wire:click="store" wire:loading.attr="disabled" type="submit" class="bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                <i class="fas fa-paper-plane mr-2"></i> Enviar
            </button>
            <button wire:click="cancelar" type="submit" class="bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition">
                <i class="fas fa-xmark mr-2"></i> Cancelar
            </button>
        </x-slot>
    </x-dialog-modal>
</div>