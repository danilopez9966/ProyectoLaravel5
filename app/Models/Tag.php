<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    //variable fillable imprescindible
    protected $fillable = ['name','description'];

    //relacion 1N con article, un tag puede tener muchos articulos
    public function articles(): HasMany{
        return $this->hasMany(Article::class);
    }
}
