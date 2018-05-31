@extends('layouts.app')

@section('content')
<section class="content-header">
  <h1>
    Actividades
    <small>Crear Nuevo</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="/activities"><i class="fa fa-map"></i> Actividades</a></li>
    <li class="active"><i class="fa fa-map"></i>Nueva Actividad</li>
  </ol>
</section>

<br>
<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="box">

    <div class="box-header">
      Formulario Nueva Actividad
    </div>
    <div class="box-body">
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

      <form class="form" action="/activities" method="post" enctype="multipart/form-data">
           {{ csrf_field() }}
           <div class="col-md-4">
              <div class="form-group">
                <label>Titulo de la Actividad*</label>
                <input type="text" class="form-control" name="title"  minlength="5" maxlength="45" placeholder="Ingresa el titulo de la actividad" required>
              </div>
          </div>

          <div class="col-md-2">
              <div class="form-group">
                <label>costo ($ pesos chilenos)</label>
                <input type="number" class="form-control" name="cost"  >
              </div>
          </div>

          <div class="col-md-2">
              <div class="form-group">
                <label>costo (us$ dolares)</label>
                <input type="number" class="form-control" name="us_cost"  >
              </div>
          </div>

          <div class="col-md-4">
              <div class="form-group">
                <label>Direccion / Ubicacion </label>
                <input type="text" class="form-control" name="address" >
              </div>
          </div>


          <div class="col-md-3">
             <div class="form-group">
               <label>Descripccion General</label>
               <textarea  class="form-control" name="description"  required></textarea>
             </div>
         </div>

         <div class="col-md-3">
            <div class="form-group">
              <label>Instrucciones</label>
              <textarea  class="form-control" name="instructions"   required></textarea>
            </div>
        </div>

        <div class="col-md-3">
           <div class="form-group">
             <label>Restricciones</label>
             <textarea  class="form-control" name="restrictions"   required></textarea>
           </div>
       </div>

       <div class="col-md-3">
          <div class="form-group">
            <label>Transporte</label>
            <textarea  class="form-control" name="transfers"   required></textarea>
          </div>
      </div>



        <div class="col-md-8">
          <input type="hidden" class="latitude" name="latitude" value="" required>
           <input type="hidden" class="longitude" name="longitude" value="" required>
           <div class="col-md-12">
               <label>Localizacion </label> (Arrastra y suelta la marca)
               <small><strong id="latitude_show">-39.81877155114882</strong> , <strong id="longitude_show">-73.24897170066835</strong></small>
               <div id="divMap" style="width:100%;height:200px;box-shadow: 5px 5px 5px #888;margin-bottom:20px;"></div>
           </div>
        </div>

          <div class="col-md-2" style="float:right;">
             <button type="submit" class="form-control btn btn-primary" >
                 <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"> </span> Crear
             </button>
          </div>
      </form>

    </div>
  </div>

  <!-- /.row (main row) -->
</section>

<script src="/js/main.js"></script>
<script type="text/javascript">
map = new L.map('divMap');

  // create the tile layer with correct attribution
  //var osmUrl='http://korona.geog.uni-heidelberg.de/tiles/roads/x={x}&y={y}&z={z}';
  var osmUrl='http://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png';
  var osmAttrib='Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';
  var osm = new L.TileLayer(osmUrl, {minZoom: 1, maxZoom: 20, attribution: osmAttrib});

  // start the map in South-East England
  map.setView(new L.LatLng(-33.44060944370357,-70.64758300781251),5);
  map.addLayer(osm);
  var marker = L.marker([-33.44060944370357,-70.64758300781251],{draggable: true}).addTo(map).bindPopup('Aqui Estas!').openPopup();
  var popup = L.popup();

  marker.on("dragend", function(ev) {
    var chagedPos = ev.target.getLatLng();
    //this.bindPopup(chagedPos.toString()).openPopup();
    this.bindPopup('Aqui Estas!').openPopup();
    $('.latitude').val(chagedPos.lat);
    $('#latitude_show').html(chagedPos.lat);
    $('.longitude').val(chagedPos.lng);
    $('#longitude_show').html(chagedPos.lng);
  });


</script>

@endsection
