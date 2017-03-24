@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edição de Categoria</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('categories.update',$category->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Descrição</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ $category->description or old('description') }}" required autofocus>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lot_id') ? ' has-error' : '' }}">
                            <label for="lot_id" class="col-md-4 control-label">Lote</label>

                            <div class="col-md-6">
                                <select name="lot_id" id="lot_id" class="form-control">
                                    <option value="">Selecione</option>
                                    @foreach($lots as $lot) 
                                        <option value="{{ $lot->id }}" {{ ($lot->id == $category->lot->id) ? 'selected' : '' }}>{{ $lot->code }}</option>
                                    @endforeach
                                </select>
                                
                                @if ($errors->has('lot_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lot_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection