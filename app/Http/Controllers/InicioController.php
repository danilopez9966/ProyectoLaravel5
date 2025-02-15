<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function inicio(){
        $articles = Article::with('user')
        ->with('tag')
        ->paginate(5);
        return view('welcome',compact('articles'));
    }
}
