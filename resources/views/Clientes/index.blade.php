@extends('layout.app')
@section ('content')



 <br> 
  <br>
  <br>
   
    <h1 style="margin-top: 70px; margin-botton: 70px; text-align:center;">Listado de clientes</h1>
     <br>
     <br>
     
    <a style="padding: 10px; background-color: blue; color: white; border-radius: 5px; text-decoration-line: none;" href="{{ route('clientes.create') }}"><i class="fa-solid fa-plus"></i> Agregar nuevo cliente</a>
    <a href="{{ url('clientes/mapa') }}" style="padding: 5px; color: white; border-radius: 5px; text-decoration-line: none;"  class="btn btn-success"> <i class="fa-solid fa-map-location-dot"></i> Ver reporte de mapas</a>
    <table style="max-width: 90%; margin:auto; margin-top:10px;" class="table table-bordered table-striped table-hover">
      <thead>
        <tr class="bg-info">
          <th>ID</th>
          <th>Cedula</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Latitud</th>
          <th>Longitud</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($clientes as $cliente)
        <tr>
          <td>{{$cliente->id}}</td>
          <td>{{$cliente->cedula}}</td>
          <td>{{$cliente->nombre}}</td>
          <td>{{$cliente->apellido}}</td>
          <td>{{$cliente->latitud}}</td>
          <td>{{$cliente->longitud}}</td>
          <td>
            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-outline-warning">
              <i class="fa fa-pen"></i>
            </a>
            <button onclick="confirmDelete({{ $cliente->id }})" class="btn btn-outline-danger">
              <i class="fa fa-trash"></i>
            </button>
            <form id="form-delete-{{ $cliente->id }}" action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline-block;">
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
            text: "¿Está seguro de eliminar este cliente?",
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