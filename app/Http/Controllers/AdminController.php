<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Storage;
use File;
use \Response;
use App\Area;
use App\Ciudad;
use App\Cupo;
use App\Empresa;
use App\Persona;
use App\Subarea;

class AdminController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function excel()
    {
        return view('admin.excel');
    }

    public function subido()
    {
        return view('admin.subido');
    }

    public function guardarArchivo(Request $request)
    {
        $file = $request->file('file');
        $name = $file->getClientOriginalName();
        Storage::disk('public')->put($name,  File::get($file));

        $request->session()->put('nameArchivo', $name);

	    return redirect('/admin/subido');
    }

    public function subirRespuestas(Request $request)
    {    	
    	try
    	{	
	    	$nameArchivo = null;
	        if ($request->session()->get("nameArchivo")) {
	            $nameArchivo = $request->session()->get("nameArchivo");
	        }   

	        Excel::load('Storage/app/public/'.$nameArchivo, function($reader)
	        {
	        	
	        	$booleanInformation = False;
	        	$data = array();

	        	$results = $reader->get();

	        	foreach ($results as $result)
	        	{
		        	Area::firstOrCreate(
		        		['nombre' => $result->area]
		        	);
		        }

		        foreach ($results as $result)
	        	{
		        	Subarea::firstOrCreate(
		        		['nombre' => $result->subarea]
		        	);
		        }

		        foreach ($results as $result)
	        	{
		        	Empresa::firstOrCreate(
		        		['nombre' => $result->empresa]
		        	);
		        }

		        foreach ($results as $result)
	        	{
		        	Cupo::firstOrCreate(
		        		['cupo' => $result->cupo]
		        	);
		        }

		        foreach ($results as $result)
	        	{
		        	Ciudad::firstOrCreate(
		        		['nombre' => $result->ciudad]
		        	);
		        }

		        foreach ($results as $result)
	        	{ 

	        		$areas = Area::where('nombre', $result->area)
						    			->get();
			    	foreach ($areas as $area)
			    	{
			    		$idarea = $area->id;
			    		$namearea = $area->nombre;
			    	}

			    	$subareas = Subarea::where('nombre', $result->subarea)
						    			->get();
			    	foreach ($subareas as $subarea)
			    	{
			    		$idsubarea = $subarea->id;
			    		$namesubarea = $subarea->nombre;
			    	}

			    	$empresas = empresa::where('nombre', $result->empresa)
						    			->get();
			    	foreach ($empresas as $empresa)
			    	{
			    		$idempresa = $empresa->id;
			    		$nameempresa = $empresa->nombre;
			    	}

			    	$cupos = Cupo::where('cupo', $result->cupo)
						    			->get();
			    	foreach ($cupos as $cupo)
			    	{
			    		$idcupo = $cupo->id;
			    		$namecupo = $cupo->cupo;
			    	}

			    	$ciudads = Ciudad::where('nombre', $result->ciudad)
						    			->get();
			    	foreach ($ciudads as $ciudad)
			    	{
			    		$idciudad = $ciudad->id;
			    		$nameciudad = $ciudad->nombre;
			    	}

			    	$nombre = $result->nombre;
			    	$cargo = $result->cargo;
			    	$telefono = $result->telefono;
			    	$celular = $result->celular;
			    	$email = $result->email;
			    	$direccion = $result->direccion;
			    	$especializado = $result->especializado;


    				$data[] = array('area_id' => $idarea, 'subarea_id' => $idsubarea, 'empresa_id' => $idempresa, 'ciudad_id' => $idciudad, 'cupo_id' => $idcupo, 'nombre' => $nombre, 'cargo' => $cargo, 'telefono' => $telefono, 'celular' => $celular, 'email' => $email, 'direccion' => $direccion, 'especializado' => $especializado, );
	    			
		        }
		        Persona::insert($data);
	        });
	        $html = "Se ha subido los datos con éxito";

	        return Response::json(array('html' => $html));  
        }catch (Exception $e)
        {
        	$html = "Ocurrio un error".$e;

    		return Response::json(array('html' => $html));   
    	}
    }

    public function crear()
    {
        return view('admin.crear');
    }
}
