<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\fabrica;
use Illuminate\Http\Request;

class FabricaController extends Controller
{
    public function index(){
        $fabrica = fabrica::where('estado', true)->get();
        $empleado= DB::table('empleados')
        ->join('fabricas', 'fabri_id', '=','fabricas.id')
        ->where('empleados.estado', true)
        ->select('empleados.*', 'empleados.nombreEm', 'fabricas.nombreFa')
        ->get();
        return view('empresa.fabrica',compact('fabrica', 'empleado'));
    }

    public function store(Request $request){
        $fabrica = new fabrica();
        $fabrica -> nombreFa = $request -> nombreFa;
        $fabrica -> ubicacion = $request -> ubicacion;
        $fabrica -> save();
        return back();
    }

    public function eliminar($id) {
        // Obtener la fábrica por su ID
        $fabrica = fabrica::find($id);
    
        if ($fabrica) {
            // Desactivar la fábrica y guardar los cambios
            $fabrica->estado = false;
            $fabrica->save();
    
            // Desactivar los empleados relacionados
            $fabrica->empleados()->update(['estado' => false]);
    
            return back();
        }
    }
}
