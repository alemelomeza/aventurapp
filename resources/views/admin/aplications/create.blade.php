@extends('layouts.app')
@section('content')
<section class="content-header">
  <h1>
    Solicitudes
    <small>Nueva Solicitud</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="/aplications"><i class="fa fa-map"></i> Solicitudes</a></li>
    <li class="active"><i class="fa fa-map"></i>Nueva Solicitud</li>
  </ol>
</section>
<br>
<section class="content">
  <div class="box">
    <div class="box-header">
      Formulario Nueva Solicitud
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
      <form class="form" action="/aplications" method="post">
           {{ csrf_field() }}
           <div class="col-md-2">
               <div class="form-group">
                   <label>Empresa</label>
                   <select class="company form-control"  name="company_id" required>
                     @forelse($companies as $company)
                       <option value="{{ $company->id }}">{{ $company->name }}</option>
                     @empty
                     @endforelse
                   </select>
               </div>
           </div>

           <div class="col-md-2">
               <div class="form-group">
                   <label>Actividad</label>
                   <select class="activity form-control"  name="activity_id" id="activity_list" required>
                   </select>
               </div>
           </div>

           <div class="col-md-2">
               <div class="form-group">
                   <label>Fecha</label>
                   <select class="event form-control"  name="event_id" id="event_list" required>
                   </select>
               </div>
           </div>



           <div class="col-md-2">
              <div class="form-group">
                <label>Titulo de la Actividad*</label>
                <input type="text" class="form-control" name="title"  placeholder="Ingresa el titulo de la actividad" required>
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

          <div class="col-md-2">
              <div class="form-group">
                <label>Direccion / Ubicacion </label>
                <input type="text" class="form-control" name="address" >
              </div>
          </div>

          <div class="col-md-2">
              <div class="form-group">
                  <label>Estado</label>
                  <select class="region form-control"  name="status" required>
                      <option value="active">Activo</option>
                      <option value="inactive">Inactivo</option>
                  </select>
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



@endsection
