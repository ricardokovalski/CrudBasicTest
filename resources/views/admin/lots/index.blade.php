@extends('layouts.app')

@section('content')
	<div class="container-fluid">

		@include('admin.alert')
		
        <p class="text-right">
		   <a class="btn btn-primary" href="{{ route('lots.create') }}" role="button">
		      <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Novo Lote
		   </a>
		</p>

		<div class="panel panel-primary">
		   <div class="panel-heading">
		      Lista de Lotes
		   </div>
		   
		   <table class="table table-hover">
		      <thead>
		         <tr>
		            <td>#</td>
		            <td>Code</td>
		            <td colspan="2">Ações</td>
		         </tr>
		      </thead>
		      <tbody>
		         @foreach ($lots as $lot)
		         <tr>
		            <td>{{ $lot->id }}</td>
		            <td>{{ $lot->code }} </td>
		            <td width="50">
		               <a class="btn btn-primary" href="{{ route('lots.edit', $lot->id) }}" role="button">
		                  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
		               </a>
		            </td>
		            <td>
		            	<form method="POST" action="{{ route('lots.destroy',$lot->id) }}">
		            		{{ csrf_field() }}
		            		{{ method_field('DELETE') }}
		            		
			               	<button type="submit" class="btn btn-primary">
                                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  
                            </button>
		            	</form>		               
		            </td>
		         </tr>
		         @endforeach
		      </tbody>
		   </table>
		</div>
    </div>
@endsection
