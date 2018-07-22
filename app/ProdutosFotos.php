<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutosFotos extends Model
{
    protected $fillable = ['product_id', 'filename'];
 
    public function feminino()
    {
        return $this->belongsTo('App\Feminino','product_id');
    }

}
