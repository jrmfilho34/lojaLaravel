<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Feminino;
use App\ProdutosFotos;

class PublicacoesController extends Controller
{
    public function buscar()
    {
      
      $flight   =DB::table('Produtos_Fotos')->get();
      $feminino =DB::table('femininos')->get();
      /*foreach ($feminino as $key) {
      	$fotos = Feminino::find($key->id)->fotos;
      }*/
      
      //$flight=DB::table('Produtos_Fotos')->where('product_id', 22)->get();  
      return view('Admin.publicacoes',['flight' => $flight, 'feminino' => $feminino]);
    }
    public function deletar($id)
    {
        $morto = DB::table('femininos')->where('id',$id)->delete();
        $morto2 = DB::table('Produtos_Fotos')->where('product_id',$id)->delete();
        return redirect()->route('publicacoes');
    }


    public function editar($id)
    {
      $editar = DB::table('femininos')->where('id',$id)->get();
      $fotos = DB::table('Produtos_Fotos')->where('product_id',$id)->get();
     // dd($editar->titulo);
     /* foreach ($editar as $key) {
        dd($fotos = $key->titulo);
      }*/
      return view('Admin.editar',['editar'=> $editar, 'fotos'=> $fotos]);
    }

    
}
