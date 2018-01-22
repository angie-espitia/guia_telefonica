@if(auth()->user()->hasRole('Admin'))

    @extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-ls-12 col-sm-12 text-center" id="loader" style="margin: 0px;"></div>
            <div class="col-md-12 col-ls-12 col-sm-12" id="subiendo"></div>
        </div>
    </div>
    @endsection

    @section('js')
        <script src="{{ asset('js/admin/excel.js') }}"></script>
    @endsection 

@else
    <div class="col-md-12 col-ls-12 col-sm-12 text-center">
        <h1>No tiene permisos para ver esta página</h1>
    </div>
@endif