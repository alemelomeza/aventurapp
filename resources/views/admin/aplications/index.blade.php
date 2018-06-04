@extends('layouts.app')
@section('content')
<section class="content-header">
  <h1>
    Solicitudes
    <small>Gestion de Solicitudes de Participacion</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Solicitudes</li>
  </ol>
</section>

<br>
<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="box">

    <div class="box-header">
      Lista
    </div>
    <div class="box-body">
    <a href="/aplications/create" class="btn btn-success pull-right" name="button"><i class="fa fa-plus"></i> Crear Nuevo</a>
    <br>
    <br>
    <table class="datatable table table-striped table-bordered nowrap" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Solicitado el:</th>
          <th>Actividad</th>
          <th>Fechas Actividad</th>
          <th>Usuario</th>
          <th>Respuesta</th>
          <th>Mensaje</th>
          <th> Acciones </th>
        </tr>
      </thead>
      <tbody>
        @forelse($aplications as $aplication)
        <tr>
          <td>{{ $aplication->created_at }}</td>
          <td>{{ $aplication->event->activity->name }}</td>
          <td>{{ $aplication->event->start_date }}</td>
          <td>{{ $aplication->user->name  }}</td>
          <td>${{ $aplication->reply }}</td>
          <td>${{ $aplication->reply_message }}</td>

          <td>

            <a class="btn btn-default btn-xs" href="/aplications/{{$aplication->id}}"  title="Ver Detalles" style="float:left;margin-right:5px;">
              <span class="glyphicon glyphicon-eye-open"></span>
            </a>
            <a class="btn btn-primary btn-xs" href="/aplications/{{$aplication->id}}/edit"  title="Editar" style="float:left;margin-right:5px;">
              <span class="glyphicon glyphicon-edit"></span>
            </a>
            <form  action="/aplications/{{ $aplication->id }}" method="post" onSubmit="if(!confirm('Estas seguro de eliminar la solicitud?')){return false;}" >
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

  <!-- /.row (main row) -->
</section>
@endsection
