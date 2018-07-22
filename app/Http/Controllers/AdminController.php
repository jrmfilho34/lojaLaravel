<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Feminino;
use App\ProdutosFotos;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
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
        $cont = Feminino::all()->count();

        return view('Admin.Admin',['cont'=>$cont]);
    }

    public function armazenar(Request $request)
    {
        
        $PosteA = Feminino::all()->max()->id;
       // $results = DB::select('select * from users where id = :id', ['id' => 1]);
       //dd($PosteA);

        if ($request->file('file')) {

                $image = $request->file('file');
                $imageName = ($PosteA +1)."_".time().$image->getClientOriginalName();
                $upload_success = $image->move(public_path('upload'),$imageName);
                ProdutosFotos::create(['product_id' => ($PosteA +1),'filename' => $imageName]);
                if ($upload_success) {
                return response()->json($upload_success, 200);
                }
                // Else, return error 400
                else {
                return response()->json('error', 400);
                }
        }
        $Poste= new Feminino();
        $Poste->categoria=$request->post('categoria');
        $Poste->descricao=$request->post('descricao');
        $Poste->titulo=$request->post('titulo');
        $Poste->preco=$request->post('preco');
        $Poste->save();
        

        return redirect()->route('publicacoes');

    }
    public function upload(Request $request)
    {
        $id = $request->post('id');
        $atualizar = DB::table('femininos')->where('id',$id)->get();

        if($request->post('titulo')){
             $titulo = $request->post('titulo');
        }else{
             foreach ($atualizar as $key) {
                $titulo = $key->titulo;
              }
        }
        if($request->post('categoria')){
             $categoria = $request->post('categoria');
        }else{
             foreach ($atualizar as $key) {
                $categoria = $key->categoria;
              }
        }
        if($request->post('descricao')){
             $descricao = $request->post('descricao');
        }else{
             foreach ($atualizar as $key) {
                $descricao = $key->descricao;
              }
        }
        if($request->post('preco')){
             $preco = $request->post('preco');
        }else{
             foreach ($atualizar as $key) {
                $preco = $key->preco;
              }
        }
   
   

       DB::table('femininos')
            ->where('id', $id)
            ->update(['titulo' => $titulo,
                      'categoria'=> $categoria, 
                      'descricao'=>$descricao, 
                      'preco'=> $preco]);

        if ($image1 = $request->file('fileUpload')){

        $imageName1 =time().$image1->getClientOriginalName();
        $upload_success = $image1->move(public_path('upload'),$imageName1);
        DB::table('Produtos_Fotos')
            ->where('product_id',$id)
            ->update(['filename' => $imageName1]);
      
        }
        return redirect()->route('publicacoes');
    }
}
