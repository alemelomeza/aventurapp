@extends('layouts.app')

@section('content')
<section class="content-header">
  <h1>
    Usuarios
    <small>Editar</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="/users"><i class="fa fa-users"></i> Usuarios</a></li>
    <li class="active"><i class="fa fa-user"></i>Editar Usuario</li>
  </ol>
</section>

<br>
<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="box">

    <div class="box-header">
      Formulario Editar Usuario
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

<form class="form" action="/users/{{ $user->id }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
<input type="hidden" name="_method" value="put">
     <div class="col-md-2">
        <div class="form-group">
          <label>Nombre *</label>
          <input type="text" class="form-control" name="name"  value="{{ $user->name }}"  maxlength="45" placeholder="Ingresa el Nombre" required>
        </div>
    </div>



    <div class="col-md-2">
        <div class="form-group">
          <label>RUT/DNI </label>
          <input type="text" class="form-control" name="dni" value="{{ $user->dni }}" >
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
          <label>Direccion</label>
          <input type="text" class="form-control" name="address" value="{{ $user->address }}" >
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label>Rol *</label>
            <select class="region form-control"  name="role" required>
                <option value="administrator" {{ $user->role == 'administrator' ? 'selected="selected"':''}}>Usuario Administrador</option>
                <option value="company" {{ $user->role == 'company' ? 'selected="selected"':''}}>Usuario Empresa</option>
                <option value="normal" {{ $user->role == 'normal' ? 'selected="selected"':''}}>Usuario Normal</option>
            </select>
        </div>
    </div>

    <div class="col-md-2">
       <div class="form-group">
         <label>Email *</label>
         <input type="email" class="form-control" name="email" value="{{ $user->email }}"  maxlength="50" required>
       </div>
   </div>

   <div class="col-md-2">
       <div class="form-group">
         <label>Contraseña *</label>

         <input type="password" class="form-control" name="password"  maxlength="20" >
         <small>Ingresar solo si se desea cambiar.</small>
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
@endsection
