@extends('layouts.app')
@section('content')
<section class="content-header">
  <h1>
    Solicitudes
    <small>Nueva Solicitud Participacion Actividad</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="/users"><i class="fa fa-map"></i> Usuarios</a></li>
    <li class="active">  <i class="fa fa-hand-pointer-o"></i>Nueva Solicitud</li>
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
           <div class="col-md-4">
               <div class="form-group">
                   <label>Empresa</label>
                   <select class="company form-control"  name="company_id" required>
                     @forelse($companies as $company)
                       <option value="{{ $company->id }}" {{ $company->id == $first_company->id ? 'selected="selected"':''}}>{{ $company->name }}</option>
                     @empty
                     @endforelse
                   </select>
               </div>
           </div>

           <div class="col-md-4">
               <div class="form-group">
                   <label>Actividad</label>
                   <select class="activity form-control"  name="activity_id" id="activity_list" required>
                     @forelse($first_company->activities as $activity)
                       <option value="{{ $activity->id }}" {{ $activity->id == $first_company->activities->first()->id ? 'selected="selected"':''}}>{{ $activity->title }}</option>
                     @empty
                     @endforelse
                   </select>
               </div>
           </div>

           <div class="col-md-4">
               <div class="form-group">
                   <label>Fecha</label>
                   <select class="event form-control"  name="event_id" id="event_list" required>
                     @forelse($first_company->activities->first()->events as $event)
                       <option value="{{ $event->id }}" {{ $event->id == $first_company->activities->first()->events->first()->id ? 'selected="selected"':''}}>{{ $event->start_date }}</option>
                     @empty
                     @endforelse
                   </select>
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


@endsection
