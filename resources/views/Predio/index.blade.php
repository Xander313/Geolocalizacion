@extends('layout.app')
@section ('content')



 <br> 
  <br>
  <br>
   
    <h1 style="margin-top: 70px; margin-botton: 70px; text-align:center;">Listado de Predios</h1>
     <br>
     <br>
     
    <a style="padding: 10px; background-color: blue; color: white; border-radius: 5px; text-decoration-line: none;" href="{{ route('predios.create') }}"><i class="fa-solid fa-plus"></i> Agregar nuevo predio</a>
    <table style="max-width: 90%; margin:auto; margin-top:10px;" class="table table-bordered table-striped table-hover">
      <thead>
        <tr class="bg-info">
          <th>ID</th>
          <th>Propietario</th>
          <th>Clave Catastral</th>
          <th>Coordenada 1</th>
          <th>Coordenada 2</th>
          <th>Coordenada 3</th>
          <th>Coordenada 4</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($predios as $predio)
        <tr>
          <td>{{$predio->id}}</td>
          <td>{{$predio->propietario}}</td>
          <td>{{$predio->claveCatastral}}</td>
          <td>{{$predio->latitud1}} {{$predio->longitud1}} </td>
          <td>{{$predio->latitud2}} {{$predio->longitud2}}</td>
          <td>{{$predio->latitud3}} {{$predio->longitud3}}</td>
          <td>{{$predio->latitud4}} {{$predio->longitud4}}</td>
          <td>
            <a href="{{ route('predios.edit', $predio->id) }}" class="btn btn-outline-warning">
              <i class="fa fa-pen"></i>
            </a>
            <button onclick="confirmDelete({{ $predio->id }})" class="btn btn-outline-danger">
              <i class="fa fa-trash"></i>
            </button>
            <form id="form-delete-{{ $predio->id }}" action="{{ route('predios.destroy', $predio->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
            </form>
          </td>
        </tr>
        @endforeach 
      </tbody>
    </table>

<br>
<br>


<script>
    function confirmDelete(id) {
        Swal.fire({
            title: "CONFIRMACIÓN",
            text: "¿Está seguro de eliminar este predio?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-delete-' + id).submit();
            }
        });
    }
</script>

@endsection