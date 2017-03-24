@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        	<div class="col-md-4">
        		<a class="btn btn-primary btn-lg btn-block" href="{{ route('lots.index') }}" role="button">
			      Lotes
			   </a>
        	</div>

        	<div class="col-md-4">
        		<a class="btn btn-primary btn-lg btn-block" href="{{ route('categories.index') }}" role="button">
			      Categorias
			   </a>
        	</div>

        	<div class="col-md-4">
        		<a class="btn btn-primary btn-lg btn-block" href="{{ route('products.index') }}" role="button">
			      Produtos
			   </a>
        	</div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4">
                <a class="btn btn-primary btn-lg btn-block" href="{{ route('products.export') }}" role="button">
                  Exportar Produtos XML
               </a>
            </div>

            <div class="col-md-4">
                <a class="btn btn-primary btn-lg btn-block" href="{{ route('products.import') }}" role="button">
                  Importar Produtos
               </a>
            </div>

            <div class="col-md-4">
                <a class="btn btn-primary btn-lg btn-block" href="{{ route('products.relatorio') }}" role="button">
                  Relatório
               </a>
            </div>
        </div>
    </div>	
</div>
@endsection