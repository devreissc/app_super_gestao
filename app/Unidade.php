<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $fillable = ['unidade', 'descricao'];
    protected $table = 'unidades';

    public function produtos()
    {
        // Relacionamento 1:N
        // Fazendo a relação entre a tabela de unidades e a tabela de produtos
        return $this->hasMany('App\Produto');
    }
}
