@extends('Admin.layouts.headeer')
@section('content')
<div class="row">
	@foreach ($flight as $user)
	  @foreach ($feminino as $ts)
	      @if(($user->product_id) === ($ts->id))
			<div class="card" style="width: 18rem;">
			  <img class="card-img-top" src="upload\{{ $user->filename }}" alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title">{{ $user->product_id}} {{ $ts->titulo }}</h5>
				<div class="btn-group btn-group-toggle" data-toggle="buttons">
				  <label class="btn btn-secondary active">
				    <input type="radio" name="options" id="option1" autocomplete="off" checked>${{ $ts->preco }}
				  </label>
				  <label class="btn btn-secondary">
				    <input type="radio" name="options" id="option2" autocomplete="off">{{ $ts->categoria }}
				  </label>
				</div>
			    <p class="card-text">{{ $ts->descricao }}
			    	<div class="alert alert-info" role="alert">
                     Publicado em: {{ $ts->created_at }}
                    </div>
			     </p>
			    <a href="{{ route('editar',['id'=>$ts->id]) }}"  class="btn btn-primary">Editar</a>
			    <a href="deletar/{{ $ts->id }}" value="{{ $ts->id }}" class="btn btn-danger">Deletar</a>
			  </div>
			</div>
		   @endif
	  @endforeach
	@endforeach
</div>
@endsection