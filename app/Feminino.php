<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feminino extends Model
{
        protected $fillable = [
         'titulo','categoria','descricao','preco',
    ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'femininos';

    public function fotos()
    {
    	return $this->hasMany(ProdutosFotos::class,'product_id');
    }
}
