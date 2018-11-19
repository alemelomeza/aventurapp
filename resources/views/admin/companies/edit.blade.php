@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1>
        Empresas
        <small>Editar {{ $company->name }}</small>
    </h1>
  <ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="/companies"><i class="fa fa-building"></i> Empresas</a></li>
    <li class="active"><i class="fa fa-building"></i>Editar {{ $company->name }}</li>
  </ol>
</section>

<br>
<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="box">

    <div class="box-header">
      Formulario Nueva Empresa
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

      <form class="form" action="/companies/{{ $company->id }}" method="post" enctype="multipart/form-data">
             {{ csrf_field() }}
          <input type="hidden" name="_method" value="put">
           <div class="col-md-2">
              <div class="form-group">
                <label>Nombre Empresa*</label>
                <input type="text" class="form-control" name="name"  value="{{ $company->name }}" minlength="5" maxlength="45" placeholder="Ingresa el Nombre" required>
              </div>
          </div>

          <div class="col-md-2">
             <div class="form-group">
               <label>Email *</label>
               <input type="email" class="form-control" name="email" value="{{ $company->email }}"  maxlength="50" required>
             </div>
         </div>

          <div class="col-md-2">
              <div class="form-group">
                <label>RUT/DNI </label>
                <input type="text" class="form-control" value="{{ $company->dni }}"  name="dni"  >
              </div>
          </div>

          <div class="col-md-2">
              <div class="form-group">
                <label>Direccion</label>
                <input type="text" class="form-control" value="{{ $company->address }}" name="address" >
              </div>
          </div>

          <div class="col-md-2">
              <div class="form-group">
                <label>Nombre de Contacto</label>
                <input type="text" class="form-control" value="{{ $company->contact_name }}" name="contact_name" >
              </div>
          </div>

          <div class="col-md-2">
              <div class="form-group">
                <label>URL Video Youtube <i class="fa fa-youtube-play"></i></label>
                <input type="text" class="form-control" value="{{ $company->video_path }}" name="video_path" >
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                <label>Usuario Asociado <i class="fa fa-user"></i></label>
                  <select class="form-control"  name="user_id" required>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $company->user_id ? 'selected="selected"':'' }}>{{ $user->name }}</option>
                    @endforeach
                  </select>
              </div>
          </div>

          <div class="col-md-4">
            <label><strong>Subir & Editar Logo </strong></label><br>
            <small>Agragar solo si se desea cambiar.</small>

            <div class="img-container">
                <img src="" alt="Editor de Imagen">
            </div>

            <textarea style="display:none;" id="imagen" name="photo" rows="8" cols="80"></textarea>

            <div class="row" id="actions">
              <div class=" docs-buttons">
                <div class="btn-group btn-group-sm" role="group">
                  <button type="button" class="btn-group" role="group" data-method="setDragMode" data-option="move" data-content="Activar Mover Imagen" title="Move">
                    <span class="docs-tooltip" data-toggle="tooltip" title="cropper.setDragMode(&quot;move&quot;)">
                      <span class="fa fa-arrows"></span>
                    </span>
                  </button>
                  <button type="button" class="btn-group" role="group" data-method="setDragMode" data-option="crop" data-content="Cortar" title="Crop">
                    <span class="docs-tooltip" data-toggle="tooltip" title="cropper.setDragMode(&quot;crop&quot;)">
                      <span class="fa fa-crop"></span>
                    </span>
                  </button>
                </div>

                <div class="btn-group btn-group-sm" role="group">
                  <button type="button" class="btn-group" role="group" data-method="zoom" data-option="0.1" data-content="Acercar" title="Zoom In">
                    <span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoom(0.1)">
                      <span class="fa fa-search-plus"></span>
                    </span>
                  </button>
                  <button type="button" class="btn-group" role="group" data-method="zoom" data-option="-0.1" data-content="Alejar" title="Zoom Out">
                    <span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoom(-0.1)">
                      <span class="fa fa-search-minus"></span>
                    </span>
                  </button>
                </div>

                <div class="btn-group btn-group-sm" role="group">
                  <button type="button" class="btn-group" role="group" data-method="rotate" data-option="-45" data-content="Rotar Izquerda" title="Rotate Left">
                    <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(-45)">
                      <span class="fa fa-rotate-left"></span>
                    </span>
                  </button>
                  <button type="button" class="btn-group" role="group" data-method="rotate" data-option="45" data-content="Rotar Derecha" title="Rotate Right">
                    <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(45)">
                      <span class="fa fa-rotate-right"></span>
                    </span>
                  </button>
                </div>


                <div class="btn-group btn-group-sm" role="group">
                  <button type="button"class="btn-group" role="group" data-method="reset" title="Reset" data-content="Reestablecer Imagen">
                    <span class="docs-tooltip" data-toggle="tooltip" title="cropper.reset()">
                      <span class="fa fa-refresh"></span>
                    </span>
                  </button>
                  <label class="btn-group" role="group" for="inputImage" title="Upload image file" data-content="Cargar Imagen">
                    <input type="file" class="sr-only" id="inputImage" name="file" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff" style="display:none;">
                    <span class="docs-tooltip" data-toggle="tooltip" title="Import image with Blob URLs">
                     <i class="fa fa-upload" aria-hidden="true"></i>  Subir Imagen
                    </span>
                  </label>
                </div>

                <div class="btn-group btn-group-crop">
                  <button style="display:none;" type="button" class="btn btn-primary" id="btn_cortar" data-method="getCroppedCanvas">
                    <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getCroppedCanvas()">
                      Generar Imagen
                    </span>
                  </button>
                </div>

                <div class="modal fade docs-cropped" id="getCroppedCanvasModal" role="dialog" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" tabindex="-1" style="display:none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="getCroppedCanvasTitle">Cropped</h4>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">Download</a>
                    </div>
                  </div>
                </div>
              </div><!-- /.modal -->

            </div><!-- /.docs-buttons --><br><br>
              <img src="" id="imagen_prev" height="100" alt="Preview Final Imagen">
            </div>
        </div>
        <div class="col-md-6">
          <input type="hidden" class="latitude" name="latitude" value="{{ $company->latitude }}" required>
           <input type="hidden" class="longitude" name="longitude" value="{{ $company->longitude }}" required>
           <div class="col-md-12">
               <label>Localizacion </label> (Arrastra y suelta la marca)
               <small><strong id="latitude_show">{{ $company->latitude }}</strong> , <strong id="longitude_show">{{ $company->longitude }}</strong></small>
               <div id="divMap" style="width:100%;height:200px;box-shadow: 5px 5px 5px #888;margin-bottom:20px;"></div>
           </div>
        </div>

          <div class="col-md-2" style="float:right;">
             <button type="submit" class="form-control btn btn-primary" >
                 <span class="glyphicon glyphicon-refresh" aria-hidden="true"> </span> Actualizar
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
  map.setView(new L.LatLng({{ $company->latitude }},{{ $company->longitude }}),5);
  map.addLayer(osm);
  var marker = L.marker([{{ $company->latitude }},{{ $company->longitude }}],{draggable: true}).addTo(map).bindPopup('Aqui Estas!').openPopup();
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