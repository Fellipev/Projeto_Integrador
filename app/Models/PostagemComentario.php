<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class PostagemComentario extends Model
{
    use HasFactory;
    protected $table = 'postagem_comentarios';
    protected $fillable = ['usuario_id', 'postagem_id', 'comentario'];

    public function usuario() {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }

}
