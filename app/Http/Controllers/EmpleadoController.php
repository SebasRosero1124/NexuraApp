<?php

namespace App\Http\Controllers;

use App\Models\areas;
use App\Models\Empleado;
use App\Models\Empleado_Rol;
use App\Models\Roles;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function guardar(Request $request)
    {

        //Validar que el Área exista

        $existe = areas::where('id',$request->area)->exists();

        if ($existe == false) {
            return redirect()->route('main')->with('no_existe','ok');
        }

        // =======================

        // ============Existe correo=================

        $email_exists = Empleado::where('email', $request->email)->exists();

        if ($email_exists == true) {
            return redirect()->route('main')->with('existe_email','ok');
        }

        // ===========================================
        
        //  Validar los datos del formulario
        $request->validate([
            'full_name' => 'required|max:255|min:2',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'genero' => 'required|max:1',
            'area' => 'required',
            'descripcion' => 'required|min:1',
            'role' => 'required'
        ]);

        // =====================================

        $roles = $request->role;

        $values_roles = [];

        foreach ($roles as $object) {
            array_push(
                $values_roles,(object)[
                    "id_rol" => $object
                ]
            );
        }


        // ================ Insertar datos en la BD ========================
       
        if ($request->notificacion == null) {
            Empleado::create([
                'nombre' => $request->full_name,
                'email' => $request->email,
                'sexo' => $request->genero,
                'area_id' => $request->area,
                'boletin' => '0',
                'descripcion' => $request->descripcion,
            ]);

            $id_empleado = Empleado::where('email',$request->email)->first()->id;

            foreach ($values_roles as $value_role) {
                Empleado_Rol::create([
                    'empleado_id' => $id_empleado,
                    'rol_id' => $value_role->id_rol,
                ]);   
            }

            return redirect()->route('main')->with('guardado','ok');
        }else{
            Empleado::create([
                'nombre' => $request->full_name,
                'email' => $request->email,
                'sexo' => $request->genero,
                'area_id' => $request->area,
                'boletin' => '1',
                'descripcion' => $request->descripcion,
            ]);

            $id_empleado = Empleado::where('email',$request->email)->first()->id;

            foreach ($values_roles as $value_role) {
                Empleado_Rol::create([
                    'empleado_id' => $id_empleado,
                    'rol_id' => $value_role->id_rol,
                ]);   
            }

            return redirect()->route('main')->with('guardado','ok');
        }


        // ============================================================================
  
        
    }

    public function show()
    {
        $empleados = Empleado::Select('a.nombre as nombre_area','empleado.id','empleado.nombre','email','sexo','area_id','boletin','descripcion')->Join('areas as a','a.id','empleado.area_id')->get();
        // dd($empleados);
        return view('Frontend.show', compact('empleados'));
    }

    public function edit($id)
    {
        $detalle = Empleado::FindOrFail($id);

        $area = Empleado::Join('areas as a','a.id','empleado.area_id')->select('a.nombre','a.id')->first();


        $areas = areas::all();

        $roles = Roles::all();

        $roles_activos = Empleado::JOIN('empleado_rol','empleado_rol.empleado_id','empleado.id')->where('empleado_id',$id)->get();

        // dd($roles_activos);

        return view('Frontend.edit', compact('detalle','area','areas','roles','roles_activos'));

    }

    public function update($id, Request $request)
    {

        //Validar que el Área exista

        $existe = areas::where('id',$request->area)->exists();

        if ($existe == false) {
            return redirect()->route('main')->with('no_existe','ok');
        }

        // =======================

        $roles = $request->role;

        $values_roles = [];

        foreach ($roles as $object) {
            array_push(
                $values_roles,(object)[
                    "id_rol" => $object
                ]
            );
        }

        Empleado_Rol::where('empleado_id',$id)->delete();

        foreach ($values_roles as $value_role) {
            
            Empleado_Rol::create([
                'empleado_id' => $id,
                'rol_id' => $value_role->id_rol,
            ]);   
        }

        $actualizar = Empleado::FindOrFail($id);


        if ($request->notificacion == null) {
            $actualizar->nombre = $request->full_name;
            $actualizar->email = $request->email;
            $actualizar->sexo = $request->genero;
            $actualizar->area_id = $request->area;
            $actualizar->boletin = '0';
            $actualizar->descripcion = $request->descripcion;
            $actualizar->save();
        }else{
            $actualizar->nombre = $request->full_name;
            $actualizar->email = $request->email;
            $actualizar->sexo = $request->genero;
            $actualizar->area_id = $request->area;
            $actualizar->boletin = '1';
            $actualizar->descripcion = $request->descripcion;
            $actualizar->save();
        }

        return redirect()->route('empleado_editar',$id)->with('actualizado','ok');

    }

    public function destroy($id)
    {
        $eliminar = Empleado::FindOrFail($id);
        $eliminar->delete();

        return redirect()->route('lista_empleados')->with('eliminado','ok');

    }
}
