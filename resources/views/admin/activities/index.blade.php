@extends('layouts.app')
@section('content')
<section class="content-header">
  <h1>
    Actividades / Aventuras
    <small>Gestion & Lista de Actividades</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Actividades</li>
  </ol>
</section>

<br>
<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="box">

    <div class="box-header">
      Lista de Actividades
    </div>
    <div class="box-body">
    <a href="/activities/create" class="btn btn-success pull-right" name="button"><i class="fa fa-plus"></i> Crear Nuevo</a>
    <br>
    <br>
    <table class="datatable table table-striped table-bordered nowrap" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Empresa</th>
          <th>Titulo</th>
          <th>Descripcion</th>
          <th>Estado</th>
          <th>Costo CL</th>
          <th>Costo US</th>
          <th>Eventos</th>
          <th> Acciones </th>
        </tr>
      </thead>
      <tbody>
        @forelse($activities as $activity)
        <tr>
          <td>{{ $activity->company->name }}</td>
          <td>{{ $activity->title }}</td>
          <td>{{ $activity->description }}</td>
          <td>{{ $activity->status  }}
              <a class="btn btn-warning btn-xs" href="/activities/{{$activity->id}}/change_status"  title="Cambiar Estado" style="">
                <i class="fa fa-refresh"></i> Cambiar Estado
              </a>
          </td>
          <td>${{ $activity->cost }}</td>
          <td>${{ $activity->us_cost }}</td>
          <td></td>
          <td>
            <a class="btn btn-warning btn-xs" href="/activities/{{$activity->id}}/events"  title="Gestionar Eventos" style="float:left;margin-right:5px;">
                <i class="fa fa-calendar"></i>
            </a>
            <a class="btn btn-default btn-xs" href="/activities/{{$activity->id}}"  title="Ver Detalles" style="float:left;margin-right:5px;">
              <span class="glyphicon glyphicon-eye-open"></span>
            </a>
            <a class="btn btn-primary btn-xs" href="/activities/{{$activity->id}}/edit"  title="Editar" style="float:left;margin-right:5px;">
              <span class="glyphicon glyphicon-edit"></span>
            </a>
            <form  action="/activities/{{ $activity->id }}" method="post" onSubmit="if(!confirm('Estas seguro de eliminar la actividad, puede tener eventos relacionados...')){return false;}" >
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
