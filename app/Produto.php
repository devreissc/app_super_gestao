<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function unidade()
    {
        // Relacionamento N:1
        // Fazendo a relação entre a tabela de produtos e a tabela de unidades
        return $this->belongsTo('App\Unidade');
    }

    public function produtoDetalhe()
    {
        // Relacionamento 1:1
        // Fazendo a relação entre a tabela de produtos e a tabela de produtos_detalhes
        return $this->hasOne('App\ProdutoDetalhe');
    }
}
