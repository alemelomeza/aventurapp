@extends('layouts.app')

@section('content')
<section class="content-header">
  <h1>
    Usuarios
    <small>Gestion & Lista de Usuarios</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Usuarios</li>
  </ol>
</section>

<br>
<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="box">

    <div class="box-header">
    </div>
    <div class="box-body">
    <a href="/users/create" class="btn btn-success pull-right" name="button"><i class="fa fa-plus"></i> Crear Nuevo</a>
    <br>
    <br>
    <table class="datatable table table-striped table-bordered nowrap" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>R.U.N</th>
          <th>Email</th>
          <th>Perfil</th>
          <th> Acciones </th>
        </tr>
      </thead>
      <tbody>
        @forelse($users as $user)
        <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->dni }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->role  }}
            @if($user->role == 'company')
              @if($user->company)
              - ( <strong>{{$user->company->name}}</strong>  )
              @else
              <a class="btn btn-warning btn-xs" href="/users/{{$user->id}}/assing_company"  title="Asignar Empresa" style="">
                <i class="fa fa-building"></i>
              </a>
              @endif
            @endif
          </td>
          <td>
              @if($user->role == 'normal')
              <a class="btn btn-warning btn-xs" href="/users/{{$user->id}}/assing_event"  title="Solicitar Participacion en Actividad" style="float:left;margin-right:5px;">
                <i class="fa fa-hand-pointer-o"></i>
              </a>
              @endif
            <a class="btn btn-default btn-xs" href="/users/{{$user->id}}"  title="Ver Detalles" style="float:left;margin-right:5px;">
              <span class="glyphicon glyphicon-eye-open"></span>
            </a>
            <a class="btn btn-primary btn-xs" href="/users/{{$user->id}}/edit"  title="Editar" style="float:left;margin-right:5px;">
              <span class="glyphicon glyphicon-edit"></span>
            </a>
            <form  action="/users/{{ $user->id }}" method="post" onSubmit="if(!confirm('Estas seguro de eliminar al usuario')){return false;}" >
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
