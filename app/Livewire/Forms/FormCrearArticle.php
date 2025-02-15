<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FormCrearArticle extends Form
{
    //validamos asi los campos
    #[Rule(['required','string','min:3','max:40','unique:articles,title'])]
    public string $title = "";
    
    #[Rule(['required','string','min:5','max:99'])]
    public string $content="";
    
    #[Rule(['required','exists:tags,id'])]
    public string $tag_id="";

    //metodo para crear el articulo
    public function fguardarArticulo(){
        $this->validate();
        Article::create([
            'title'=>$this->title,
            'content'=> $this->content,
            'user_id'=>Auth::user()->id,
            'tag_id'=>$this->tag_id
        ]);
    }

    //metodo para borrar los errores
    public function freset(){
        $this->resetValidation();
        $this->reset();
    }
}
