<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{   
    protected $table = 'produto_detalhes';
    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

    public function produto()
    {
        // belongsTo fica na classe mais fraca do relacionamento
        // Relacionamento 1:1
        // Fazendo a relação entre a tabela de produtos_detalhes e a tabela de produtos
        // ProdutoDetalhe pertence a Produto
        // return $this->belongsTo('App\Produto');
        return $this->belongsTo('App\Item', 'produto_id', 'id'); //2º parâmetro é a chave estrangeira da tabela produtos_detalhes e 3º parâmetro é a chave primária da tabela produtos
    }

    public function unidade()
    {
        // belongsTo fica na classe mais fraca do relacionamento
        // Relacionamento 1:1
        // Fazendo a relação entre a tabela de produtos_detalhes e a tabela de unidades
        // ProdutoDetalhe pertence a Unidade
        return $this->belongsTo('App\Unidade');
    }
}
