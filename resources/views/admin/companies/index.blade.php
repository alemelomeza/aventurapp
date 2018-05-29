@extends('layouts.app')

@section('content')
<section class="content-header">
  <h1>
    Empresas
    <small>Gestion & Lista de Empresas</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
    <li class="active"><i class="fa fa-building"></i>Empresas</li>
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
      <a href="/companies/create" class="btn btn-success pull-right" name="button"><i class="fa fa-plus"></i> Crear Nuevo</a>
      <br>
      <br>

    <table class="datatable table table-striped table-bordered nowrap" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Nombre Empresa</th>
          <th>R.U.T</th>
          <th>Email</th>
          <th>Contacto</th>
          <th>Direccion</th>
          <th>Usuario</th>
          <th> Acciones </th>
        </tr>
      </thead>
      <tbody>
        @forelse($companies as $company)
        <tr>
          <td>{{ $company->name }}</td>
          <td>{{ $company->dni !=null ? $company->dni: ' - '  }}</td>
          <td>{{ $company->email }}</td>
          <td>{{ $company->contact_name !=null ? $company->contact_name: ' - '  }}</td>
          <td>{{ $company->address !=null ? $company->address: ' - ' }}</td>
          <td>{{ $company->user_id !=null ? $company->user->name: ' - ' }}</td>
          <td>
            <a class="btn btn-default btn-xs" href="/companies/{{$company->id}}"  title="Ver Detalles" style="float:left;margin-right:5px;">
              <span class="glyphicon glyphicon-eye-open"></span>
            </a>
            <a class="btn btn-primary btn-xs" href="/companies/{{$company->id}}/edit"  title="Editar" style="float:left;margin-right:5px;">
              <span class="glyphicon glyphicon-edit"></span>
            </a>
            <form  action="/companies/{{ $company->id }}" method="post" onSubmit="if(!confirm('Estas seguro de eliminar la empresa')){return false;}" >
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
