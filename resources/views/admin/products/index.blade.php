@extends('layouts.app')

@section('content')
<div class="container-fluid">

		@include('admin.alert')

        <p class="text-right">
		   <a class="btn btn-primary" href="{{ route('products.create') }}" role="button">
		      <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Novo Produto
		   </a>
		</p>

		<div class="panel panel-primary">
		   <div class="panel-heading">
		      Lista de Produtos
		   </div>
		   
		   <table class="table table-hover">
		      <thead>
		         <tr>
		            <td>#</td>
		            <td>Description</td>
		            <td>Bar code</td>
		            <td>Price</td>
		            <td>Amount</td>
		            <td>Category</td>
		            <td colspan="2">Ações</td>
		         </tr>
		      </thead>
		      <tbody>
		         @foreach ($products as $product)
		         <tr>
		            <td>{{ $product->id }}</td>
		            <td>{{ $product->description }} </td>
		            <td>{{ $product->bar_code }} </td>
		            <td>{{ $product->price }} </td>
		            <td>{{ $product->amount }} </td>
		            <td>{{ $product->category->description }}</td>
		            <td width="50">
		               <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}" role="button">
		                  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
		               </a>
		            </td>
		            <td>
		            	<form method="POST" action="{{ route('products.destroy',$product->id) }}">
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