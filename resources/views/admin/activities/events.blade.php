@extends('layouts.app')
@section('content')
<section class="content-header">
  <h1>Eventos  <small>Gestion de Eventos Actividad: <strong>{{ $activity->title }}</strong></small></h1>
  <ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="/activities"><i class="fa fa-map"></i>Actividades</a></li>
    <li class="active"><i class="fa fa-calendar"></i>Eventos de <a href="/activities/{{ $activity->id }}">Actividad {{ $activity->id }}</a></li>
  </ol>
</section>
<br>
<section class="content">
  <div class="box">

    <div class="box-body">
      <h4><strong>Nuevo Evento</strong></h4>
        @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
<div class="col-md-12">

      <form class="form" action="/events" method="post">
           {{ csrf_field() }}
           <input type="hidden" name="activity_id" value="{{ $activity->id}}">
           <div class="col-md-3">
              <div class="form-group">
                <label>Nombre del Evento*</label>
                <input type="text" class="form-control" name="name" required>
              </div>
          </div>

          <div class="col-md-4">
              <div class="form-group">
                <label>Inicio y Termino (Fecha- Hora):</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input type="text" name="range_date" class="form-control pull-right" id="reservationtime">
                </div>
              </div>
          </div>



          <div class="col-md-2">
              <div class="form-group">
                <label>Total Cupos</label>
                <input type="number" class="form-control" name="total_reservation_quota"  >
              </div>
          </div>

          <div class="col-md-3">
              <div class="form-group">
                <label>Nombre Lider Encargado</label>
                <input type="text" class="form-control" name="leader_name" >
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
          <div class="col-md-2" style="float:right;">
             <button type="submit" class="form-control btn btn-primary" >
                 <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"> </span> Crear
             </button>
          </div>
      </form>

      </div>
      <br>


    <br>
    <br>
    <h4><strong>Lista de Eventos</strong></h4>
    <table class="datatable table table-striped table-bordered nowrap" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Fecha Inicio</th>
          <th>Fecha Termino</th>
          <th>Total Cupos</th>
          <th>Cupos Confirmados</th>
          <th>Lider Encargado</th>
          <th>Estado</th>
          <th> Acciones </th>
        </tr>
      </thead>
      <tbody>
        @forelse($activity->events as $event)
        <tr>
          <td>{{ $event->name }}</td>
          <td>
            @if($event->start_date!=null)
            {{ Carbon\Carbon::parse($event->start_date)->format('d/m/Y H:i:s') }}
            @endif
          </td>
          <td>
            @if($event->start_date!=null)
            {{ Carbon\Carbon::parse($event->end_date)->format('d/m/Y H:i:s') }}
            @endif
          </td>
          <td>{{ $event->total_reservation_quota }}</td>
          <td>{{ $event->confirmed_reservation }}</td>
          <td>{{ $event->leader_name }}</td>
          <td>{{ $event->status  }}
              <a class="btn btn-warning btn-xs" href="/events/{{$event->id}}/change_status"  title="Cambiar Estado" style="">
                <i class="fa fa-refresh"></i> Cambiar Estado
              </a>
          </td>
          <td>
            <a class="btn btn-primary btn-xs" href="/events/{{$event->id}}/edit"  title="Editar" style="float:left;margin-right:5px;">
              <span class="glyphicon glyphicon-edit"></span>
            </a>
            <form  action="/events/{{ $event->id }}" method="post" onSubmit="if(!confirm('Estas seguro de eliminar el evento')){return false;}" >
              <input type="hidden" name="_method" value="delete">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button class="btn btn-danger btn-xs" type="submit" title="Eliminar" style="float:left;">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
              </button>
            </form>
          </td>
        </tr>
        @empty
        <span>sin registros aun</span>
        @endforelse
      </tbody>
    </table>
    </div>
  </div>
</section>

<script>
  $(function () {

       moment.locale('es');
      $('#reservationtime').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(24, 'hour'),
        momentLocale: 'es',
        locale: {
          format: 'DD/MM/YYYY HH:mm:ss'
        }
      });
  })
</script>
@endsection
