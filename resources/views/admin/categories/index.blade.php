@extends('layouts.app')

@section('content')
<div class="container-fluid">

	@include('admin.alert')
	
        <p class="text-right">
		   <a class="btn btn-primary" href="{{ route('categories.create') }}" role="button">
		      <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Nova Categoria
		   </a>
		</p>

		<div class="panel panel-primary">
		   <div class="panel-heading">
		      Lista de Categorias
		   </div>
		   
		   <table class="table table-hover">
		      <thead>
		         <tr>
		            <td>#</td>
		            <td>Description</td>
		            <td>Lote</td>
		            <td colspan="2">Ações</td>
		         </tr>
		      </thead>
		      <tbody>
		         @foreach ($categories as $category)
		         <tr>
		            <td>{{ $category->id }}</td>
		            <td>{{ $category->description }} </td>
		            <td>{{ $category->lot->code }}</td>
		            <td width="50">
		               <a class="btn btn-primary" href="{{ route('categories.edit', $category->id) }}" role="button">
		                  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
		               </a>
		            </td>
		            <td>
		            	<form method="POST" action="{{ route('categories.destroy',$category->id) }}">
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