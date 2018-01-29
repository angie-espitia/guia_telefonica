@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

    	<form method="post">
		  <div class="form-group">
		    <label>Nombre:</label>
		    <input type="text" class="form-control" id="nombre">
		  </div>
		  <div class="form-group">
		    <label >Empresa: </label>
		    <input type="text" class="form-control" id="empresa">
		  </div>
		  <div class="form-group">
		    <label >Area: </label>
		    <select class="form-control" id="area">
			    <option>1</option>
			</select>
		  </div>
		  <div class="form-group">
		    <label >Sub Area: </label>
		    <select class="form-control" id="subarea">
			    <option>1</option>
			</select>
		  </div>
		  <div class="form-group">
		    <label >Ciudad: </label>
		    <input type="text" class="form-control" id="ciuad">
		  </div>
		  <div class="form-group">
		    <label >Telefono: </label>
		    <input type="text" class="form-control" id="telefono">
		  </div>
		  <div class="form-group">
		    <label >Celular: </label>
		    <input type="text" class="form-control" id="celular">
		  </div>
		  <div class="form-group">
		    <label >Email: </label>
		    <input type="email" class="form-control" id="email">
		  </div>
		  <div class="form-group">
		    <label >Dirección: </label>
		    <input type="text" class="form-control" id="direccion">
		  </div>
		  <div class="form-group">
		    <label >Especializado: </label>
		    <input type="text" class="form-control" id="esecializado">
		  </div>
		  <div class="form-group">
		    <label >Cupo: </label>
		    <input type="text" class="form-control" id="cupo">
		  </div>
		  
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>

     </div>
</div>
@endsection