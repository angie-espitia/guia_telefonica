<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use \Response;
use App\Area;
use App\Ciudad;
use App\Cupo;
use App\Empresa;
use App\Persona;
use App\Subarea;

class UserController extends Controller
{

	public function index()
    {
        return view('index');
    }

    public function mostrar(Request $request)
    {
        $html = "";
        $html .= "<table class='table table-bordered'>
                <thead class='thead-s'>
                <tr>";
        $html .= "<th class='text-center'>Nombre</th>";
        $html .= "<th class='text-center'>Area</th>";
        $html .= "<th class='text-center'>SubArea</th>";
        $html .= "<th class='text-center'>Empresa</th>";
        $html .= "<th class='text-center'>Cargo</th>";
        $html .= "<th class='text-center'>Ciudad</th>";
        $html .= "<th class='text-center'>Teléfono</th>";
        $html .= "<th class='text-center'>Celular</th>";
        $html .= "<th class='text-center'>Email</th>";
        $html .= "<th class='text-center'>Dirección</th>";
        $html .= "<th class='text-center'>Especializado</th>";
        $html .= "<th class='text-center'>Cupo</th>";
        $html .= "</tr>
                </thead>
                <tbody>";
        $personas = Persona::orderBy('nombre', 'asc')
                                            ->get();
        foreach ($personas as $persona) {
            $area_id = $persona->area_id;        
            $subarea_id = $persona->subarea_id;        
            $empresa_id = $persona->empresa_id;        
            $ciudad_id = $persona->ciudad_id;        
            $cupo_id = $persona->cupo_id; 

            $nombre = $persona->nombre;        
            $cargo = $persona->cargo;        
            $telefono = $persona->telefono;        
            $celular = $persona->celular;        
            $email = $persona->email;        
            $direccion = $persona->direccion;        
            $especializado = $persona->especializado;  

            $areas = Area::where('id', $area_id)
                                        ->get();
            foreach ($areas as $area) {
               $nombreArea = $area->nombre;
            }   

            $subareas = Subarea::where('id', $subarea_id)
                                        ->get();
            foreach ($subareas as $subarea) {
               $nombreSubarea = $subarea->nombre;
            }

            $empresas = Empresa::where('id', $empresa_id)
                                        ->get();
            foreach ($empresas as $empresa) {
               $nombreEmpresa = $empresa->nombre;
            }

            $ciudads = Ciudad::where('id', $ciudad_id)
                                        ->get();
            foreach ($ciudads as $ciudad) {
               $nombreCiudad = $ciudad->nombre;
            }

            $cupos = Cupo::where('id', $cupo_id)
                                        ->get();
            foreach ($cupos as $cupo) {
               $nombreCupo = $cupo->cupo;
            }

            $html .= "<tr class='border-dotted'>";
            $html .= "<td class='text-center'>$nombre</td>";
            $html .= "<td class='text-center'>$nombreArea</td>";
            $html .= "<td class='text-center'>$nombreSubarea</td>";
            $html .= "<td class='text-center'>$nombreEmpresa</td>";
            $html .= "<td class='text-center'>$cargo</td>";
            $html .= "<td class='text-center'>$nombreCiudad</td>";
            $html .= "<td class='text-center'>$telefono</td>";
            $html .= "<td class='text-center'>$celular</td>";
            $html .= "<td class='text-center'>$email</td>";
            $html .= "<td class='text-center'>$direccion</td>";
            $html .= "<td class='text-center'>$especializado</td>";
            $html .= "<td class='text-center'>$nombreCupo</td>";
            $html .= "<td class='text-center'>";
            $html .= "</td>";
            $html .= "</tr>";     
        }
        $html .= "</tbody>
                </table>";
                
        return Response::json(array('html' => $html));
    }

    public function buscar(Request $request)
    {
        $html = "";
        // $idRadicado = null;

        // if($request->session()->get("idRadicado")){
        //     $idRadicado = $request->session()->get("idRadicado");
        // }

        $html .= "<table class='table table-bordered'>
                <thead class='thead-s'>
                <tr>";
        $html .= "<th class='text-center'>Nombre</th>";
        $html .= "<th class='text-center'>Area</th>";
        $html .= "<th class='text-center'>SubArea</th>";
        $html .= "<th class='text-center'>Empresa</th>";
        $html .= "<th class='text-center'>Cargo</th>";
        $html .= "<th class='text-center'>Ciudad</th>";
        $html .= "<th class='text-center'>Teléfono</th>";
        $html .= "<th class='text-center'>Celular</th>";
        $html .= "<th class='text-center'>Email</th>";
        $html .= "<th class='text-center'>Dirección</th>";
        $html .= "<th class='text-center'>Especializado</th>";
        $html .= "<th class='text-center'>Cupo</th>";
        $html .= "</tr>
                </thead>
                <tbody>";

        $empresas = Empresa::where('id', $idEmpresa)
                                            ->get();
        foreach ($empresas as $empresa) {
            $empresa_id = $empresa->id;        

            $personas = Persona::where('id', $empresa_id)
                                        ->get();
            foreach ($personas as $persona) {
                $area_id = $persona->area_id;        
		        $subarea_id = $persona->subarea_id;        
		        $ciudad_id = $persona->ciudad_id;        
		        $cupo_id = $persona->cupo_id; 

		        $nombre = $persona->nombre;        
		        $cargo = $persona->cargo;        
		        $telefono = $persona->telefono;        
		        $celular = $persona->celular;        
		        $email = $persona->email;        
		        $direccion = $persona->direccion;        
		        $especializado = $persona->especializado;

                $html .= "<tr class='border-dotted'>";
	            $html .= "<td class='text-center'>$nombre</td>";
	            $html .= "<td class='text-center'>$nombreArea</td>";
	            $html .= "<td class='text-center'>$nombreSubarea</td>";
	            $html .= "<td class='text-center'>$nombreEmpresa</td>";
	            $html .= "<td class='text-center'>$cargo</td>";
	            $html .= "<td class='text-center'>$nombreCiudad</td>";
	            $html .= "<td class='text-center'>$telefono</td>";
	            $html .= "<td class='text-center'>$celular</td>";
	            $html .= "<td class='text-center'>$email</td>";
	            $html .= "<td class='text-center'>$direccion</td>";
	            $html .= "<td class='text-center'>$especializado</td>";
	            $html .= "<td class='text-center'>$nombreCupo</td>";
	            $html .= "<td class='text-center'>";
	            $html .= "</td>";
	            $html .= "</tr>";  
            }      
        }

        $html .= "</tbody>
                </table>";

        return Response::json(array('html' => $html));
    }
}
