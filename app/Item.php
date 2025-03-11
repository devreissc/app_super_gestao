<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function unidade()
    {
        // Relacionamento N:1
        // Fazendo a relação entre a tabela de produtos e a tabela de unidades
        return $this->belongsTo('App\Unidade');
    }

    // public function produtoDetalhe()
    // {
    //     // Relacionamento 1:1
    //     // Fazendo a relação entre a tabela de produtos e a tabela de produtos_detalhes
    //     return $this->hasOne('App\ProdutoDetalhe');
    // }

    public function produtoDetalhe()
    {
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id'); // 3º parâmetro é a chave estrangeira da tabela produtos_detalhes e 2º parâmetro é a chave primária da tabela produtos
    }

    public function fornecedor()
    {
        // Relacionamento N:N
        // Fazendo a relação entre a tabela de produtos e a tabela de fornecedores
        return $this->belongsTo('App\Fornecedor');
    }
}
