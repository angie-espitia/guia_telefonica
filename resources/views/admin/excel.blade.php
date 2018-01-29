@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <br><br><br><br>
                    <a href="{{ url('crear') }}" class="btn btn-primary">Crear Campo Individual</a>
                    <br>
                    <form id="formSubirRespuestas" method="POST" action='/admin/guardarArchivo' enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <center><label for="archivo">Subir datos de un archivo Excel</label>
                          
                        <input type="file" name="file">
                        <br>
                        <button class="btn btn-success" type="submit">Crear</button></center>                    
                    </form>
                    <br><br> <br><br><br><br><br>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection