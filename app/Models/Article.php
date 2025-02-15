<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    //variable fillable
    protected $fillable = ['title','content','tag_id','user_id'];

    //relacion 1N con tag, un article pertenece a un unico tag
    public function tag():BelongsTo{
        return $this->belongsTo(Tag::class);
    }

    //relacion 1N con user, un article puede tener solo un usuario
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;
}
