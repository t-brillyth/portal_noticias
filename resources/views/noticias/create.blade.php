@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="card shadow p-3 my-5 bg-white rounded">
        <div class="card-header">Crear noticia</div>
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <form action="{{ route('noticias.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row form-group ">
              <div class="col">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
              </div>
              <div class="col">
                <label for="categoria">Categoría</label>
                <select class="form-control" id="categoria" name="categoria" required>
                  <option value="">Seleccionar</option>
                  <?php foreach ($categorias as $categoria) { ?>
                    <option value="<?php echo $categoria->id; ?>"><?php echo $categoria->descripcion; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col">
                <label for="estatus">Estatus</label>
                <select class="form-control" id="estatus" name="estatus" required>
                  <option value="">Seleccionar</option>
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
                </select>
              </div>
            </div>
            <div class="row form-group ">
              <div class="col">
                <label for="autor">Autor</label>
                <input type="text" class="form-control" id="autor" name="autor" required>
              </div>
              <div class="col">
              <label for="fecha">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
              </div>
            </div>
            <div class="form-group">
              <label for="descripcion">Descripción</label>
              <textarea class="form-control" id="descripcion" name="descripcion" rows="4" cols="80" required></textarea>
            </div>
            <div class="form-group">
              <label for="imagen">Imagen</label>
              <input type="file" class="form-control-file" id="imagen" name="imagen">
            </div>
            <div class="row mt-5">
              <div class="col-4 offset-4 text-right">
              <button type="submit" class="btn btn-success btn-lg btn-block" >Aceptar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection