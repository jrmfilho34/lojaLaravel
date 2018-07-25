<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;

use App\Feminino;
use App\ProdutosFotos;
use Illuminate\Support\Facades\DB;

class InicioController extends Controller
{
    public function contador(){

      $start = microtime(true);
      if(!Cache::has('fotos')){
      Cache::put('fotos', DB::table('Produtos_Fotos')->get(),1);
      Cache::put('feminino', DB::table('femininos')->get(),1);

      }
      $fotos   = Cache::get('fotos');//DB::table('Produtos_Fotos')->get();
      //$fotos =DB::table('Produtos_Fotos')->get();
      //$feminino =DB::table('femininos')->get();
      $feminino = Cache::get('feminino');
      $tempo = ($start - microtime(true))*1000;
     // dd($tempo);

      return view('welcome',['dado' => '1', 'fotos'=> $fotos,'feminino'=> $feminino, 'tempo' => $tempo]);
    }
}
