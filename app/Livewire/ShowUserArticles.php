<?php

namespace App\Livewire;

use App\Livewire\Forms\FormUpdateArticle;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ShowUserArticles extends Component
{
    //para trabajar con ficheros
    use WithFileUploads;
    use WithPagination;
    public string $buscar="";
    //para la modal de actualizar
    public bool $openUpdate=false;
    //para traer la logica de actualizar
    public FormUpdateArticle $uform;
    
    #[On('ArticuloCreado')]
    public function render()
    {
        $articles = Article::where('user_id',Auth::user()->id)->where(function ($query){
            $query->where('title','like',"%{$this->buscar}%")
                ->orwhere('content','like',"%{$this->buscar}%");
        })->paginate(5);
        $tags = Tag::all();
        return view('livewire.show-user-articles',compact('articles','tags'));
    }

    public function updatingBuscar(){
        $this->resetPage();
    }

    //este metodo va para la mensajeria
    public function mostrarAlerta(Article $article){    
        $this->dispatch('alertaBorrar',$article->id);
    }

    #[On('borrarOK')]
    public function delete(Article $article){
        $this->authorize('delete',$article);
        $article->delete();
        $this->dispatch('mensaje','articulo borrado!!');
    }

    //traemos los datos del articulo,autorizamos y abrimos la modal
    public function edit(Article $article){
        $this->authorize('update',$article);
        $this->uform->fsetArticulo($article);
        $this->openUpdate=true;
    }

    //actualizamos el articulo,con mensaje incluido
    public function update(){
        $this->uform->fupdateArticulo();
        $this->cancelar();
        $this->dispatch('mensaje','articulo editado!!');
    }

    //para el boton cancelar
    public function cancelar(){
        $this->openUpdate=false;
        $this->uform->freset();
    }
}
