<?php

namespace App\Livewire;

use App\Livewire\Forms\FormCrearArticle;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearArticle extends Component
{
    //para trabajar con ficheros
    use WithFileUploads;
    //para abrir y cerrar la modal
    public bool $openCrear=false;
    //para traer aqui la logica
    public FormCrearArticle $cform;

    public function render()
    {
        $tags = Tag::all();
        return view('livewire.crear-article',compact('tags'));
    }

    //para el boton de enviar
    public function store(){
        $this->cform->fguardarArticulo();
        //esto lo hacemos para q se actualice sola la pagina al crear el articulo
        $this->dispatch('ArticuloCreado')->to(ShowUserArticles::class);
        //esto es para la mensajeria
        $this->dispatch('mensaje','articulo creado exitosamente!!!!!');
        $this->cancelar();
    }

    //para el boton de cancelar
    public function cancelar(){
        $this->openCrear=false;
        $this->cform->freset();
    }
}
