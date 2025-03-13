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

    public function pedidos()
    {
        // Relacionamento 1:N
        // Fazendo a relação entre a tabela de produtos e a tabela de pedidos
        return $this->belongsToMany('App\Pedido', 'pedidos_produtos', 'produto_id', 'pedido_id')->withPivot('quantidade', 'created_at', 'updated_at');
    }
}
