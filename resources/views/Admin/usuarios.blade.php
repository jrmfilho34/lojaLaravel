@extends('Admin.layouts.headeer')
@section('content')
<div class="container">
<div class="row">
		    <table class="table table-dark">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Nome</th>
			      <th scope="col">E-mail</th>
			      <th scope="col">Último acesso</th>
			    </tr>
			  </thead>
			  <tbody>
	@foreach ($user as $a)
	  @foreach ($acesso as $b)
	      @if(($b->user_id) === ($a->id))
			    <tr>
	              <th scope="row">{{ $b->id}}</th>
			      <td>{{$a->name}}</td>
			      <td>{{$a->email}}</td>
			      <td>{{$b->datetime}}</td>
			    </tr>	   
        @endif
	  @endforeach
	@endforeach
			   </tbody>
			</table>
</div>
</div>
@endsection