<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//fornecedors
//fornecedores

class Fornecedor extends Model
{
    //
    use SoftDeletes;

    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];

    public function produtos()
    {
        return $this->hasMany('App\Item', 'fornecedor_id', 'id'); // 1º parâmetro: Model relacionado | 2º parâmetro: chave estrangeira na tabela relacionada | 3º parâmetro: chave primária na tabela atual  
    }
}
