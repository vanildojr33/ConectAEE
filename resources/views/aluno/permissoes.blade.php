@extends('layouts.principal')
@section('title','Início')
@section('path','Início')
@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">Permissões de {{$aluno->nome}}</div>
      @if (\Session::has('success'))
        <br>
        <div class="alert alert-success">
            <strong>Sucesso!</strong>
            {!! \Session::get('success') !!}
        </div>
      @endif
      <div class="panel-body">
        <div id="tabela" class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                  <th>Nome</th>
                  <th>Cargo</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($gerenciars as $gerenciar)
                <tr>
                  <td data-title="Nome">{{ $gerenciar->gerenciador->name }} </td>
                  
                  <td data-title="Cargo">{{ ($gerenciar->isAdministrador) ? 'true' : 'false' }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="panel-footer">
        <a class="btn btn-danger" href="{{URL::previous()}}">Voltar</a>
        <a class="btn btn-success" href="{{ route("aluno.cadastrar")}}">Novo</a>
      </div>
    </div>
@endsection
