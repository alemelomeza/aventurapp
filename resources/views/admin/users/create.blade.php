@extends('layouts.app')

@section('content')
<section class="content-header">
  <h1>
    Usuarios
    <small>Crear Nuevo</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="/users"><i class="fa fa-users"></i> Usuarios</a></li>
    <li class="active"><i class="fa fa-user"></i>Nuevo Usuario</li>
  </ol>
</section>

<br>
<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="box">

    <div class="box-header">
      Formulario Nuevo Usuario
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

<form class="form" action="/users" method="post" enctype="multipart/form-data">
     {{ csrf_field() }}
     <div class="col-md-2">
        <div class="form-group">
          <label>Nombre *</label>
          <input type="text" class="form-control" name="name"  minlength="5" maxlength="45" placeholder="Ingresa el Nombre" required>
        </div>
    </div>



    <div class="col-md-2">
        <div class="form-group">
          <label>RUT/DNI </label>
          <input type="text" class="form-control" name="dni"  >
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
          <label>Direccion</label>
          <input type="text" class="form-control" name="address" >
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label>Rol *</label>
            <select class="region form-control"  name="role" required>
                <option value="administrator">Usuario Administrador</option>
                <option value="company">Usuario Empresa</option>
                <option value="normal">Usuario Normal</option>
            </select>
        </div>
    </div>

    <div class="col-md-2">
       <div class="form-group">
         <label>Email *</label>
         <input type="email" class="form-control" name="email"   maxlength="50" required>
       </div>
   </div>

   <div class="col-md-2">
       <div class="form-group">
         <label>Contraseña *</label>
         <input type="password" class="form-control" name="password" maxlength="20" required>
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
