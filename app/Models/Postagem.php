<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\PostagemComentario;

class Postagem extends Model
{
    use HasFactory;
    protected $table = 'postagens';
    protected $fillable = ['titulo', 'conteudo', 'url_img'];

    public function usuario() {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id');
    }

    public function comentarios() {
        return $this->hasMany(PostagemComentario::class, 'postagem_id', 'id');
    }


}
