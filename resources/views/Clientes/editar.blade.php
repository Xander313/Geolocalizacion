@extends('layout.app')

@section('content')
<h1 style="margin-top: 70px; text-align:center;">Editar cliente</h1>
<form action="{{ route('clientes.update', $cliente->id) }}" method="POST" style="display:flex; flex-direction: column; gap: 20px; width: 400px; margin: auto;">
    @csrf
    @method('PUT')

    <label for="cedula">Cédula</label>
    <input required class="form-control" type="text" value="{{ old('cedula', $cliente->cedula) }}" name="cedula" id="cedula">

    <label for="nombre">Nombre</label>
    <input required class="form-control" type="text" value="{{ old('nombre', $cliente->nombre) }}" name="nombre" id="nombre">

    <label for="apellido">Apellido</label>
    <input required class="form-control" type="text" value="{{ old('apellido', $cliente->apellido) }}" name="apellido" id="apellido">

    <label for="latitud">Latitud</label>
    <input required class="form-control" readonly type="text" value="{{ old('latitud', $cliente->latitud) }}" name="latitud" id="latitud">

    <label for="longitud">Longitud</label>
    <input required class="form-control" readonly type="text" value="{{ old('longitud', $cliente->longitud) }}" name="longitud" id="longitud">

    <div id="mapa_cliente" style="border:1px solid black; height:250px; width:100%"></div>
    <br>

    <div style="display:flex; flex-direction: row; gap:50px; width: 300px; margin: auto;">
        <button class="form-control" type="submit">Guardar registro</button>
        <a class="form-control" href="{{ route('clientes.index') }}" style="background-color: #ededed; padding:15px; border-radius: 10px; border: 1px solid black">Cancelar todo</a>
    </div>
</form>

<script type="text/javascript">
    function initMap() {
        const latitud = parseFloat(document.getElementById("latitud").value) || -0.9374805;
        const longitud = parseFloat(document.getElementById("longitud").value) || -78.6161327;

        var latlng = new google.maps.LatLng(latitud, longitud);
        var mapa = new google.maps.Map(document.getElementById('mapa_cliente'), {
            center: latlng,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var marcador = new google.maps.Marker({
            position: latlng,
            map: mapa,
            title: "Seleccione la dirección",
            draggable: true
        });

        google.maps.event.addListener(marcador, 'dragend', function(event) {
            var latitud = this.getPosition().lat();
            var longitud = this.getPosition().lng();
            document.getElementById("latitud").value = latitud;
            document.getElementById("longitud").value = longitud;
        });
    }

    window.onload = initMap;
</script>
@endsection




