@extends('layouts.principal')
@section('title','Cadastrar aluno')
@section('path','Início')

@section('navbar')
<a href="{{route('aluno.listar')}}">Início</a> > Novo Aluno
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Novo Aluno</div>

        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="{{ route("aluno.criar") }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <font size="4" class="row">
              Instituição:
            </font>

            @if(count($instituicoes) != 0)

              <div class="form-group{{ $errors->has('instituicoes') ? ' has-error' : '' }}">
                <label for="instituicoes" class="col-md-4 control-label">Instituição(ões) <font color="red">*</font> </label>
                <div class="col-md-6">

                  <select class="form-control js-example-basic-multiple" name="instituicoes[]" multiple="multiple" autofocus>
                    @foreach ($instituicoes as $instituicao)
                      @php($selected = false)
                      @if(old("instituicoes.0") != null )

                        @for ($i=0; $i < count($instituicoes) ; $i++) {
                          @if(old("instituicoes.".$i) == $instituicao->id)
                            @php($selected = true)
                            @break
                          @endif
                        @endfor

                        @if($selected)
                          <option value="{{$instituicao->id}}" selected> {{$instituicao->nome}}, {{ $instituicao->endereco->logradouro }}, {{ $instituicao->endereco->cidade }} - {{ $instituicao->endereco->estado }} </option>
                        @else
                          <option value="{{$instituicao->id}}">{{$instituicao->nome}}, {{ $instituicao->endereco->logradouro }}, {{ $instituicao->endereco->cidade }} - {{ $instituicao->endereco->estado }} </option>
                        @endif

                      @else
                        <option value="{{$instituicao->id}}">{{$instituicao->nome}}, {{ $instituicao->endereco->logradouro }}, {{ $instituicao->endereco->cidade }} - {{ $instituicao->endereco->estado }} </option>
                      @endif
                    @endforeach
                  </select>

                  @if ($errors->has("instituicoes"))
                    <span class="help-block">
                      <strong>{{ $errors->first("instituicoes") }}</strong>
                    </span>
                  @endif

                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  Instituição não encontrada? &nbsp;
                  <a class="btn btn-info" href="{{ route("instituicao.cadastrar") }}">Cadastre</a>
                </div>
              </div>

            @else

              <center>
                <h3>Nenhuma instituicão cadastrada.</h3>
                <a class="btn btn-info" href="{{ route("instituicao.cadastrar") }}">Cadastrar Instituição</a>
              </center>

            @endif

            <font size="4" class="row">
              Identificação:
            </font>

            <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
              <label for="nome" class="col-md-4 control-label"> Nome <font color="red">*</font>
              </label>

              <div class="col-md-6">
                <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}">

                @if ($errors->has('nome'))
                  <span class="help-block">
                    <strong>{{ $errors->first('nome') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('imagem') ? ' has-error' : '' }}">
              <label for="imagem" class="col-md-4 control-label" >Foto de perfil</label>

              <div class="col-md-6">
                <input id="imagem" type="file" class="filestyle" name="imagem" data-placeholder="Nenhum arquivo" data-text="Selecionar" data-btnClass="btn btn-primary">

                @if ($errors->has('imagem'))
                  <span class="help-block">
                    <strong>{{ $errors->first('imagem') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">

              <label for="sexo" class="col-md-4 control-label">Sexo <font color="red">*</font> </label>

              <div class="col-md-6">

                @if(old('sexo') == "M")
                  <input type="radio" id="sexo1" name="sexo" value="M" checked="checked">
                @else
                  <input type="radio" id="sexo1" name="sexo" value="M">
                @endif

                <label class="custom-control-label" for="sexo1">Masculino</label>

                @if(old('sexo') == "F")
                  <input type="radio" id="sexo2" name="sexo" value="F" checked="checked">
                @else
                  <input type="radio" id="sexo2" name="sexo" value="F">
                @endif

                <label class="custom-control-label" for="sexo2">Feminino</label>

                @if ($errors->has('sexo'))
                  <span class="help-block">
                    <strong>{{ $errors->first('sexo') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('data_nascimento') ? ' has-error' : '' }}">
              <label for="data_nascimento" class="col-md-4 control-label">Data de Nascimento <font color="red">*</font> </label>
              <div class="col-md-6">

                <input id="data_nascimento" type="date" class="form-control" name="data_nascimento" value="{{ old('data_nascimento') }}">

                @if ($errors->has('data_nascimento'))
                  <span class="help-block">
                    <strong>{{ $errors->first('data_nascimento') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <font size="4" class="row">
              Endereço:
            </font>

            <div class="form-group{{ $errors->has('logradouro') ? ' has-error' : '' }}">
              <label for="logradouro" class="col-md-4 control-label">Logradouro <font color="red">*</font></label>

              <div class="col-md-6">

                <input id="logradouro" type="text" class="form-control" name="logradouro" value="{{ old('logradouro') }}">

                @if ($errors->has('logradouro'))
                  <span class="help-block">
                    <strong>{{ $errors->first('logradouro') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('numero') ? ' has-error' : '' }}">
              <label for="numero" class="col-md-4 control-label">Número <font color="red">*</font> </label>

              <div class="col-md-6">

                <input id="numero" type="text" class="form-control" name="numero" value="{{ old('numero') }}">

                @if ($errors->has('numero'))
                  <span class="help-block">
                    <strong>{{ $errors->first('numero') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('bairro') ? ' has-error' : '' }}">
              <label for="bairro" class="col-md-4 control-label">Bairro <font color="red">*</font></label>

              <div class="col-md-6">

                <input id="bairro" type="text" class="form-control" name="bairro" value="{{ old('bairro') }}">

                @if ($errors->has('bairro'))
                  <span class="help-block">
                    <strong>{{ $errors->first('bairro') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
              <label for="estado" class="col-md-4 control-label">Estado <font color="red">*</font> </label>

              <div class="col-md-6">
                <select id="estado" class="form-control" name="estado" data-target="#cidade">
                  <option value="">Estado</option>
                </select>

                @if ($errors->has('estado'))
                  <span class="help-block">
                    <strong>{{ $errors->first('estado') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('cidade') ? ' has-error' : '' }}">
              <label for="cidade" class="col-md-4 control-label">Cidade <font color="red">*</font> </label>

              <div class="col-md-6">

                <select id="cidade" class="form-control" name="cidade">
                  <option value=""> Cidade </option>
                </select>

                @if ($errors->has('cidade'))
                  <span class="help-block">
                    <strong>{{ $errors->first('cidade') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <font size="4" class="row">
              Dados Médicos:
            </font>

            <div class="form-group{{ $errors->has('cid') ? ' has-error' : '' }}">
              <label for="cid" class="col-md-4 control-label">CID</label>

              <div class="col-md-6">

                <input id="cid" type="text" class="form-control" placeholder="X000" name="cid" value="{{ old('cid') }}">

                @if ($errors->has('cid'))
                  <span class="help-block">
                    <strong>{{ $errors->first('cid') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('descricaoCid') ? ' has-error' : '' }}">
              <label for="descricaoCid" class="col-md-4 control-label">Descrição do CID</label>

              <div class="col-md-6">

                <input id="descricaoCid" type="text" class="form-control" name="descricaoCid" value="{{ old('descricaoCid') }}">

                @if ($errors->has('descricaoCid'))
                  <span class="help-block">
                    <strong>{{ $errors->first('descricaoCid') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <font size="4" class="row">
              Outras Observacões:
            </font>

            <div class="form-group{{ $errors->has('observacao') ? ' has-error' : '' }}">
              <label for="observacao" class="col-md-4 control-label">Observações</label>

              <div class="col-md-6">
                <textarea id="observacao" rows = "5" cols = "50" class="form-control" name="observacao" >{{old('observacao')}}</textarea>

                @if ($errors->has('observacao'))
                  <span class="help-block">
                    <strong>{{ $errors->first('observacao') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <font size="4" class="row">
              Perfil do Cadastrante:
            </font>

            <div class="form-group{{ $errors->has('perfil') ? ' has-error' : '' }}">
              <label for="perfil" class="col-md-4 control-label">Perfil</label>

              <div class="col-md-6">
                <select id="perfil" class="form-control" name="perfil" onchange="showResponsavel(this)">
                  @if (old('perfil') == null)
                    <option id="perfil" selected disabled hidden>Escolha seu perfil</option>
                  @endif

                  @foreach($perfis as $perfil)
                    @if(old('perfil') == $perfil[0])
                      <option value={{$perfil[0]}} selected>{{$perfil[1]}}</option>
                    @else
                      <option value={{$perfil[0]}}>{{$perfil[1]}}</option>
                    @endif
                  @endforeach
                </select>

                @if ($errors->has('perfil'))
                  <span class="help-block">
                    <strong>{{ $errors->first('perfil') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            @if(old('perfil') == "2")
              <div id="div-responsavel" style="display: block">
            @else
              <div id="div-responsavel" style="display: none">
            @endif

            <font size="4" class="row">
              Cadastro de Responsável:
            </font>

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
              <label for="username" class="col-md-4 control-label">Nome de Usuário</label>

              <div class="col-md-6">
                @if (old('username') == null)
                  <input name="username" type="text" class="form-control" value="{{old('username')}}">
                @else
                  <input name="username" type="text" class="form-control">
                @endif

                @if ($errors->has('username'))
                  <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-success">
                  Cadastrar
                </button>
              </div>
            </div>

          </form>
        </div>

        <div class="panel-footer">
          <a class="btn btn-danger" href="{{URL::previous()}}">
            <i class="material-icons">keyboard_backspace</i>
            <br>
            Voltar
          </a>
        </div>

      </div>
    </div>
  </div>
</div>

<script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('.js-example-basic-multiple').select2();
});
</script>
<script>
var estados = [];

function loadEstados(element) {
  if (estados.length > 0) {
    putEstados(element);
    $(element).removeAttr('disabled');
  } else {
    $.ajax({
      url: 'https://api.myjson.com/bins/enzld',
      method: 'get',
      dataType: 'json',
      beforeSend: function() {
        $(element).html('<option>Carregando...</option>');
      }
    }).done(function(response) {
      estados = response.estados;
      putEstados(element);
      $(element).removeAttr('disabled');
    });
  }
}

function putEstados(element) {
  var oldEstado = "{{old('estado')}}";

  var label = $(element).data('label');
  label = label ? label : 'Estado';

  var options = '<option value="">' + label + '</option>';
  for (var i in estados) {
    var estado = estados[i];

    if(estado.sigla == oldEstado){
      options += '<option selected value="' + estado.sigla + '">' + estado.nome + '</option>';
    }else{
      options += '<option value="' + estado.sigla + '">' + estado.nome + '</option>';
    }
  }

  if(oldEstado != ""){
    var target = $(element).data('target');

    if (target) {
      loadCidades(target, oldEstado);
    }
  }

  $(element).html(options);
}

function loadCidades(element, estado_sigla) {

  if (estados.length > 0) {
    putCidades(element, estado_sigla);
    $(element).removeAttr('disabled');
  } else {
    $.ajax({
      url: theme_url + '/assets/json/estados.json',
      method: 'get',
      dataType: 'json',
    }).done(function(response) {
      estados = response.estados;
      putCidades(element, estado_sigla);
      $(element).removeAttr('disabled');
    });
    document.write(estados.length);
  }
}

function putCidades(element, estado_sigla) {
  var label = $(element).data('label');
  label = label ? label : 'Cidade';

  var oldCidade = "{{old('cidade')}}";

  var options = '<option value="">' + label + '</option>';
  for (var i in estados) {
    var estado = estados[i];
    if (estado.sigla != estado_sigla)
    continue;
    for (var j in estado.cidades) {
      var cidade = estado.cidades[j];

      if (cidade == oldCidade) {
        options += '<option selected value="' + cidade + '">' + cidade + '</option>';
      }else {
        options += '<option value="' + cidade + '">' + cidade + '</option>';
      }
    }
  }
  $(element).html(options);
}

document.addEventListener('DOMContentLoaded', function() {
  loadEstados('#estado');

  $(document).on('change', '#estado', function(e) {
    var target = $(this).data('target');
    if (target) {
      loadCidades(target, $(this).val());
    }
  });

}, false);

</script>

@endsection