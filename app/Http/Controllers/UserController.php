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
        $booleanNombre = False;
        $booleanCheckNombre = False;
        $booleanEmpresa = True;
        $buscarNombre = $_POST['buscarNombre'];    
        $buscarEmpresa = $_POST['buscarEmpresa'];

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

        if ($buscarEmpresa != "") {
            $booleanEmpresa = False;
            $empresas = Empresa::where('nombre', $buscarEmpresa)
                                    ->get();        

            foreach ($empresas as $empresa) {
                $booleanEmpresa = True;
                $empresa_id = $empresa->id;
            }

            if ($booleanEmpresa == True) {
                $personas = Persona::where('empresa_id', $empresa_id)
                                    ->get();
            } 
    
        } elseif ($buscarNombre == "") {
            $booleanCheckNombre = True;
            $personas = Persona::all();
        } elseif ($buscarNombre != "") {
            $booleanCheckNombre = True;
            $personas = Persona::where('nombre', $buscarNombre)
                                    ->get();
        }

        if ($booleanEmpresa == True || $booleanCheckNombre == True) {
                     
            foreach ($personas as $persona) {
                $booleanNombre = True;
                $id = $persona->id;
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

                $Areas = Area::where('id', $area_id)
                                                    ->get();
                foreach ($Areas as $area) {
                    $nombreArea = $area->nombre;
                }

                $Subareas = Subarea::where('id', $subarea_id)
                                                    ->get();
                foreach ($Subareas as $subarea) {
                    $nombreSubarea = $subarea->nombre;
                }

                $Empresas = Empresa::where('id', $empresa_id)
                                                    ->get();
                foreach ($Empresas as $empresa) {
                    $nombreEmpresa = $empresa->nombre;
                }

                $Ciudades = Ciudad::where('id', $ciudad_id)
                                                    ->get();
                foreach ($Ciudades as $ciudad) {
                    $nombreCiudad = $ciudad->nombre;
                }

                $Cupos = Cupo::where('id', $cupo_id)
                                                    ->get();
                foreach ($Cupos as $cupo) {
                    $nombreCupo = $cupo->nombre;
                }

                $html .= "<tr class='border-dotted'>";
                $html .= "<td class='text-center'>$nombre</td>";
                $html .= "<td class='text-center'>$nombreEmpresa</td>";
                $html .= "</tr>";           
            }
        }

        $html .= "</tbody>
                </table>";

        if ($booleanNombre == False || $booleanEmpresa == False) {
            $html = "<h1 class='text-center'>No hay telefonos que mostrar</h1>";
        }
        return Response::json(array('html' => $html));
    }
}
