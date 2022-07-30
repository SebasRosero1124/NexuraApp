@extends('welcome')

@section('css')

<link rel="stylesheet" href="{{asset('css/show.css')}}">

<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

@stop

@section('content')

<div class="form__picture">

    <div class="table">

        <h2>Lista de empleados Nexura</h2>
        <br>

        <table class="table" id="empleados">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Sexo</th>
                <th>Area</th>
                <th>Boletín</th>
                <th>Descripcion</th>
                <th>Opciones</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $empleado) 
                    <tr>
                    <th scope="row">{{$empleado->id}}</th>
                    <td>{{$empleado->nombre}}</td>
                    <td>{{$empleado->email}}</td>
                    <td>{{$empleado->sexo}}</td>
                    <td>{{$empleado->nombre_area}}</td>
                    <td>{{$empleado->boletin}}</td>
                    <td>{{$empleado->descripcion}}</td>
                    <td><a href="{{route('empleado_editar',$empleado->id)}}"><i style="font-size: 1.5rem; color:blue" class="uil uil-edit"></i></a></td>
                    <td>
                        <form action="{{route('empleado_eliminar',$empleado->id)}}" method="post" id="eliminar">
                            @csrf
                            {{method_field('DELETE')}}
                            <button style="background:transparent; border:none; cursor:pointer;"><i style="font-size: 1.5rem; color:brown;" class="uil uil-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
                
    </div>

    <div class="picture">
        <img src="{{asset('img/picture2.jpg')}}" alt="Add_new">
    </div>

</div>


@stop

@section('js')

<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready( function () {
        $('#empleados').DataTable();
    } );
</script>

<script>
    $('#eliminar').submit(function(e){
      e.preventDefault();

      Swal.fire({
        title: '¿Estás Seguro de eliminar el registro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar'
      }).then((result) => {
        if (result.value) {
          this.submit();
        }
      })
    });
  </script>

@if (session('eliminado') == 'ok')

<script>
    Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'El empleado se ha eliminado correctamente',
    showConfirmButton: false,
    timer: 3500
    })
</script>
    
@endif



@stop