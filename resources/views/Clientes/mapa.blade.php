@extends('layout.app')
@section ('content')
<div style="margin-top: 100px; height:20px; width: 100%" >
  <h1 style="text-align:center;">Reporte de Clientes en mapa</h1>
</div>
<div style="display:flex; justify-content: center; width: 100%; height: 500px">
<div id="mapa_clientes" style="border:1px solid black; height:auto; width:95%; margin-top: 70px;">
</div>
</div>
<br>
<br>



<script type="text/javascript">
    function initMap(){
        alert("mapa ok");
        var latitud_longitud= new google.maps.LatLng(-0.9374805,-78.6161327);
        var mapa=new google.maps.Map(
            document.getElementById('mapa_clientes'),
            {
                center:latitud_longitud,
                zoom:15,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            }
        );
        @foreach($clientes as $clienteTemporal)
            var cordenadaCliente= new google.maps.LatLng({{$clienteTemporal->latitud}}, {{$clienteTemporal->longitud}});
            var marcador=new google.maps.Marker({
                position:cordenadaCliente,
                map:mapa,
                icon: {
                    url: "https://cdn-icons-png.flaticon.com/512/5216/5216405.png",
                    scaledSize: new google.maps.Size(70,70)

                },
                title:" {{$clienteTemporal->nombre}} {{$clienteTemporal->apellido}}",
                draggable:false
            });
        @endforeach
    }
    window.onload=initMap;
</script>



<!--  

<script type="text/javascript">

      function initMap(){
        var latitud_longitud= new google.maps.LatLng(-0.9374805,-78.6161327);
        var mapa=new google.maps.Map(
          document.getElementById('mapa_cliente'),
          {
            center:latitud_longitud,
            zoom:15,
            mapTypeId:google.maps.MapTypeId.ROADMAP
          }
        );
        @foreach($clientes as $clientetemporal)
            var coordenada_cliente= new google.maps.LatLng({{$clientetemporal->latutud}},{{$clientetemporal->longitud}});

            var marcador = new google.maps.Marker({
                position: coordenada_cliente
                map: mapa,
                title: "Ubicaciones",
                dragable: false,

            })
        @endforeach

      }
    window.onload = initMap;


</script>

-->


@endsection