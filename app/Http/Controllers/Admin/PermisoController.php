<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Permiso;
use App\Http\Requests\ValidacionPermiso;

class PermisoController extends Controller
{
    public function index()
    {
        $permisos = Permiso::orderBy('id')->get();
        return view('admin.permiso.index',compact('permisos'));
    }

    public function crear()
    {
        return view('admin.permiso.crear');
    }

    public function guardar(ValidacionPermiso $request)
    {
        Permiso::create($request->all());
        return redirect('admin/permiso')->with('mensaje','Permiso creado con éxito');
    }

    public function mostrar($id)
    {
        //
    }

    public function editar($id)
    {
        $data = Permiso::findOrFail($id);
        return view('admin/permiso/editar',compact('data'));
    }

    public function actualizar(ValidacionPermiso $request, $id)
    {
        Permiso::findOrFail($id)->update($request->all());
        return redirect('admin/permiso')->with('mensaje','Permiso Actualizado con éxito');  
    }

    public function eliminar(Request $request,$id)
    {     
        if ($request->ajax()) {
            if (Permiso::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            }else{
                return response()->json(['mensaje' => 'ng']);
            }
        }else{
            abort(404);
        }
    }
}
