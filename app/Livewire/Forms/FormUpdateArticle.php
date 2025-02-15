<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FormUpdateArticle extends Form
{
    public ? Article $article=null;

    public string $title = "";
    
    #[Rule(['required','string','min:5','max:99'])]
    public string $content="";
    
    #[Rule(['required','exists:tags,id'])]
    public string $tag_id="";

    public function rule(): array{
        return [
            'title' => ['required','string','min:3','max:40','unique:articles,title'.$this->article->id]
        ];
    }

    //establece los datos del articulo
    public function fsetArticulo(Article $article){
        $this->article =$article;
        $this->title = $article->title;
        $this->content = $article->content;
        $this->tag_id = $article->tag_id;
    }

    //actualizamos el articulo
    public function fupdateArticulo(){
        $this->validate();
        $this->article->update([
            'title'=>$this->title,
            'content'=>$this->content,
            'tag_id'=>$this->tag_id
        ]);
    }

    //reseteamos y cerramos la modal
    public function freset(){
        $this->resetValidation();
        $this->reset();
    }
}
