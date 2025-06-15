@extends('layout.app')
@section ('content')
<h1 style="margin-top: 70px; text-align:center;">Nuevo cliente</h1>
    <form action="{{ route('clientes.store')}}"  class="form-control" method="POST" style="display:flex; flex-direction: column; gap: 20px; width: 400px; margin: auto;">
        @csrf
        <label for="">cedula</label>
        <input required class="form-control" type="text" value="" name="cedula" id="cedula">
        <label for="">nombre</label>
        <input required class="form-control" type="text" value="" name="nombre" id="nombre">
        <label for="">apellido</label>
        <input required class="form-control" type="text" value="" name="apellido" id="apellido">
        <label for="">latitud</label>
        <input required class="form-control" readonly type="text"  value="" name="latitud" id="latitud">
        <label for="">longitud</label>
        <input required class="form-control" readonly type="text"  value="" name="longitud" id="longitud">
      <div class="" id="mapa_cliente" style="border:1px solid black; height:250px;
            width:100%"> </div>
    <br>
        <div style="display:flex; flex-direction: row; gap:50px; width: 300px; margin: auto;">
            <button class="form-control" type="submit"> Guardar registro</button>
            <a class="form-control" href="{{ route('clientes.index') }}" style="background-color: #ededed; padding:15px; border-radius: 10px; border: 1px solid black" >Cacelar todo</a>
        </div>
        
    </form>


<script type="text/javascript">

      function initMap(){
        alert("MAPA CARGADA")
        var latitud_longitud= new google.maps.LatLng(-0.9374805,-78.6161327);
        var mapa=new google.maps.Map(
          document.getElementById('mapa_cliente'),
          {
            center:latitud_longitud,
            zoom:15,
            mapTypeId:google.maps.MapTypeId.ROADMAP
          }
        );
        var marcador=new google.maps.Marker({
          position:latitud_longitud,
          map:mapa,
          title:"Seleccione la direccion",
          draggable:true
        });
        google.maps.event.addListener(
          marcador,
          'dragend',
          function(event){
            var latitud=this.getPosition().lat();
            var longitud=this.getPosition().lng();

            document.getElementById("latitud").value=latitud;
            document.getElementById("longitud").value=longitud;
          }
        );
      }
    window.onload = initMap;


    </script>
@endsection





