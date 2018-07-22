@extends('Admin.layouts.headeer')
<style type="text/css">
</style>
@section('content')
<div class="row">
        <div class="card" style="width: 18rem;">
      @foreach ($fotos as $img)
			  <img class="card-img-top" src="{{asset('upload')}}/{{ $img->filename }}" alt="Card image cap">
			@endforeach
			  <div class="card-body">
			    <h5 class="card-title">Altere os campos</h5>
      <form action="{{ route('edicao')}}" method="POST" enctype="multipart/form-data" id="file-upload-form" >
              <div class="uploader">  
                <input id="file-upload" type="file" name="fileUpload" accept="image/*" />
                <label for="file-upload" id="file-drag">
                  <img id="file-image" src="#" alt="Preview" class="hidden">
                  <div id="start">
                    <i class="fa fa-download" aria-hidden="true"></i>
                    <div>Selecione outra imagem</div>
                    <div id="notimage" class="hidden">Please select an image</div>
                    <span id="file-upload-btn" class="btn btn-primary">Clique aqui</span>
                  </div>
                  <div id="response" class="hidden">
                    <div id="messages"></div>
                    <progress class="progress" id="file-progress" value="0">
                      <span>0</span>%
                    </progress>
                  </div>
                </label>
              </div>
            @foreach ($editar as $ds)
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <input type="hidden" name="id" value="{{ $ds->id }}">
                <div class="form-group">
                  <label for="formGroupExampleInput">Título</label>
                  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="{{ $ds-> titulo }}" name="titulo">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">Preço</label>
                  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="{{ $ds->preco }}" name="preco">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Selecione a area de exposição</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="categoria">
                    <option>Femininos</option>
                    <option>Masculinos</option>
                    <option>Infantil</option>
                    <option>Plus size</option>
                    <option>Gestantes</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Descrição</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{ $ds->descricao }}" name="descricao"></textarea>
                </div>
            </div>
          <div class="card-footer bg-transparent border-success">
          <button type="submit" class="btn btn-primary">Finalizar</button>
          </form>
			@endforeach
			    
			  </div>
			</div>
    </form>
</div>

@endsection