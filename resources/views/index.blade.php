@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-ls-12 col-sm-12">
            <div class="col-md-8 col-ls-8 col-sm-8" style="padding-left: 0px;">
                <!-- <label class="control-label" for="buscarNumero">Buscar por numero de radicación</label>
                <input class="form-control" type="number" id="buscarNumero" pattern="[0-9]+" oninput="mostrarRadicados();"> -->
                <label class="control-label" for="buscarNombre">Buscar por nombre de persona</label>
                <input class="form-control" type="text" id="buscarnombre" oninput="buscar();">
                <label class="control-label" for="buscarEmpresa">Buscar por empresa</label>
                <input class="form-control" type="text" id="buscarempresa" oninput="buscar();">
            </div>
        </div>

        <div class="col-md-12 col-ls-12 col-sm-12">
            <div class="col-md-12 col-ls-12 col-sm-12" id="info">  </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/user/telefonia.js') }}"></script>
<script src="{{ asset('js/user/buscar.js') }}"></script>
@endsection