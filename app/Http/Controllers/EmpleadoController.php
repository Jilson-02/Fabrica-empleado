<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Support\Facades\DB;
use App\Models\fabrica;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{

    //Me permite mostrar 
    public function index(){
        $fabrica = fabrica::where('estado', true)->get();
        $empleado = DB::table('empleados')
        ->join('fabricas', 'fabricas.id', '=', 'empleados.fabri_id')
        ->select('empleados.*', 'fabricas.nombreFa')
        ->where('empleados.estado', true)
        ->get();
        return view('empresa.empleado', compact('fabrica','empleado'));
    }
    //Me permite guardar datos
    public function store(Request $request){
        $producto = new empleado();
        $producto->nombreEm = $request->nombreEm;
        $producto->apellidoEm = $request->apellidoEm;
        $producto->fecha_nacimiento = $request->fecha_nacimiento;
        $producto->cantidadHijos = $request->cantidadHijos;
        $producto->sueldo = $request->sueldo;
        $producto->fabri_id = $request->fabri_id;
        $producto->save();
        return back();
    }

    //Me permite eliminar
    public function eliminar($id){
        $empleado = empleado::find($id);
        if($empleado){
            $empleado->estado = false;
            $empleado->save();
            return back();
        }
    }
    //Permite dirigirme a wiew de editar empleado
    public function showempleado($id){
        $fabrica = fabrica::where('estado', true)->get();
        $empleado = empleado::find($id);
        return view('empresa.actualizar', compact('empleado', 'fabrica'));
    }
    //Esta funcion me permite realizar los cambios que voy actulizar
    public function actualizar(Request $request, $id){
        $empleado = empleado::find($id);
        if($empleado){
            $empleado->nombreEm = $request->nombreEm;
            $empleado->apellidoEm = $request->apellidoEm;
            $empleado->fecha_nacimiento = $request->fecha_nacimiento;
            $empleado->cantidadHijos = $request->cantidadHijos;
            $empleado->sueldo = $request->sueldo;
            $empleado->fabri_id = $request->fabri_id;
            $empleado->save();    
        }
        
        return redirect('/empleado');
    }

}
