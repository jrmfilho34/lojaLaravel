<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use App\Feminino;
use App\ProdutosFotos;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
      if(!Cache::has('fotos')){
      Cache::put('fotos', DB::table('Produtos_Fotos')->get(),1);
      Cache::put('feminino', DB::table('femininos')->get(),1);

      }
      $fotos   = Cache::get('fotos');
      $feminino = Cache::get('feminino');
 

      return view('welcome',['dado' => '1', 'fotos'=> $fotos,'feminino'=> $feminino]);
    }
    
    public function contador(Request $request)
    {
      dd($request->all());
    }
 
}
