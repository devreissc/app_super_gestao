<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['cliente_id', 'data_pedido', 'observacoes', 'status'];

    public function produtos()
    {
        // Relacionamento N:N
        // Fazendo a relação entre a tabela de pedidos e a tabela de produtos
        // return $this->belongsToMany('App\Item', 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('quantidade'); // 'quantidade' é o campo adicional da tabela de relacionament, withPivot() é usado para especificar o campo adicional
        return $this->belongsToMany('App\Item', 'pedidos_produtos', 'pedido_id', 'produto_id'); // 1º parâmetro: Model de destino, 2º parâmetro: nome da tabela de relacionamento, 3º parâmetro: chave estrangeira da tabela de origem, 4º parâmetro: chave estrangeira da tabela de destino
        // return $this->belongsToMany('App\Produto', 'pedidos_produtos');
    }
}
