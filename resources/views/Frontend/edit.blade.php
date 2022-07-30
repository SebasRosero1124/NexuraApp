@extends('welcome')


@section('css')

<link rel="stylesheet" href="{{asset('css/formulario.css')}}">

@stop

@section('content')

<div class="form__picture">


    <div class="form">

        <div class="form__header">
            <h1>Editar a {{$detalle->nombre}}</h1>
        </div>
    
        <div class="form__content">
            <form action="{{route('actualizar_empleado',$detalle->id)}}" method="POST" id="actualizar_empleado">
                @csrf
                {{ Method_field('PUT') }}
    
            <div class="inputs">
                <label for="name">Nombre completo *</label>
                <input name="full_name" class="text__form" type="text" placeholder="Nombre completo del empleado" value="{{$detalle->nombre}}">
            </div>
    
            <div class="inputs">
                <label for="email">Correo Electronico *</label>
                <input name="email" class="text__form" type="email" placeholder="Correo Electronico" value="{{$detalle->email}}">
            </div>
    
            <div class="inputs">
                <div class="gen__content">
                    <div class="label">
                        <label >Genero *</label>
                    </div>
                    
                    <div class="gen">
                        <label for="genero">Maculino</label>
    
                        @if ($detalle->sexo == 'M')   
                            <div class="radio">
                                <input name="genero" value="M" type="radio" checked>
                            </div>
                            <label for="genero">Femenino</label>
                                <div class="radio">
                                    <input name="genero" value="F" type="radio">
                                </div>
                        @elseif ($detalle->sexo =='F')
                            <div class="radio">
                                <input name="genero" value="M" type="radio">
                            </div>
                            <label for="genero">Femenino</label>
                                <div class="radio">
                                    <input name="genero" value="F" type="radio" checked>
                                </div>
                        @endif
                    </div>
                </div>
    
            </div>
    
            <div class="inputs">
                <label for="area">Area *</label>
                <select name="area">
                    <option class="option" value="{{$area->id}}">{{$area->nombre}}</option>
                    <option class="option" value="">------------------------</option>
                    @foreach ($areas as $area)
                        <option class="option" value="{{$area->id}}">{{$area->nombre}}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="inputs">
                <div class="descrip__content">
                    <label for="descripcion">Descripcion *</label>
                    <textarea value="{{$detalle->descripcion}}" name="descripcion" cols="30" rows="3">{{$detalle->descripcion}}</textarea>
                </div>
            </div>

            @if ($detalle->boletin == '0')
                <div class="inputs">
                    <div class="email__confirm">
                        <label for="gen">Deseo recibir boletin informativo</label>
                        <input value="1" name="notificacion" type="checkbox" value="1">
                    </div>
                </div>
                @elseif ($detalle->boletin == '1')
                <div class="inputs">
                    <div class="email__confirm">
                        <label for="gen">Deseo recibir boletin informativo</label>
                        <input value="1" name="notificacion" type="checkbox" value="1" checked>
                    </div>
                </div>
            @endif
    
    
            <div class="inputs">
                <div class="roles__content">
    
                    <div class="label">
                        <label for="gen">Roles *</label>
                    </div>

                        <div class="role">
                            @if($roles_activos == true)
                                @foreach ($roles as $role)
                                    <div class="rol">
                                        <input name="role[]" value="{{$role->id}}" type="checkbox" 
                                        
                                                @foreach ($roles_activos as $rol_activo) 
                                                    @if($role->id == $rol_activo->rol_id)
                                                        checked
                                                    @endif
                                                @endforeach

                                            > 
                                            {{$role->nombre}}
                                    </div>
                                @endforeach
                            @endif
                        </div>

                </div>
            </div>
    
            <div class="inputs">
              <div class="wrap">
                <button class="button">Actualizar</button>
              </div>
            </div>
    
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
         </form>
        </div>
    
    
    </div>

    <div class="picture">
        <img src="{{asset('img/picture4.jpg')}}" alt="Add_new">
    </div>

</div>


@stop


@section('js')

<script>
    $('#actualizar_empleado').submit(function(e){
      e.preventDefault();

      Swal.fire({
        title: '¿Estás Seguro de actualizar el registro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Actualizar'
      }).then((result) => {
        if (result.value) {
          this.submit();
        }
      })
    });
  </script>

@if (session('actualizado') == 'ok')

<script>
    Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'El empleado se ha actualizado correctamente',
    showConfirmButton: false,
    timer: 2500
    })
</script>
    
@endif


@if (session('no_existe') == 'ok')

<script>
    Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Parece que esa área no existe! intentalo de nuevo más tarde',
    })
</script>
    
@endif

@if (session('existe_email') == 'ok')

<script>
    Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'El correo del empleado ya existe',
    })
</script>
    
@endif

@stop