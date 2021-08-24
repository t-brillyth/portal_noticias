@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mt-2">
            <div class="card shadow p-1 my-5 bg-white rounded">
                <div class="card-header">
                    <h2 class="text-center">Editar noticia</h2>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{ route('noticias.update',['id' => $noticia->id])}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <label class="mb-0" for="titulo">Título</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $noticia->titulo }}" required>
                            </div>
                            <div class="col">
                                <label class="mb-0" for="categoria">Categoría</label>
                                <select class="form-control" id="categoria" name="categoria" required>
                                    <option value="">Seleccionar</option>
                                    <?php foreach ($categorias as $categoria) { ?>
                                        <option value="<?php echo $categoria->id; ?>" <?php if ($categoria->id == $noticia->categorias_id) {
                                                                                            echo "selected";
                                                                                        } ?>><?php echo $categoria->descripcion; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label class="mb-0" for="autor">Autor</label>
                                <input type="text" class="form-control" id="autor" name="autor" value="{{ $noticia->autor }}" required>
                            </div>
                            <div class="col">
                                <label class="mb-0" for="fecha">Fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $noticia->fecha }}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="mb-0" for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" cols="80" required>{{ $noticia->descripcion }}</textarea>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label class="mb-0" for="imagen">Imagen</label>
                                <input type="file" class="form-control-file" id="imagen" name="imagen">
                            </div>
                            <div class="col">
                                <label class="mb-0" for="estatus"><b>Imagen</b></label>
                                <br>
                                <img src="{{url('/imagenes/'.$noticia->imagen)}}" style="width:100px; heigth:100px;">
                            </div>
                            <div class="col">
                                <label class="mb-0" for="estatus">Estatus</label>
                                <select class="form-control" id="estatus" name="estatus" required>
                                    <option value="">Seleccionar</option>
                                    <option value="1" <?php if ($noticia->estatus == 1) {
                                                            echo "selected";
                                                        } ?>>Activo</option>
                                    <option value="0" <?php if ($noticia->estatus == 0) {
                                                            echo "selected";
                                                        } ?>>Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mt-5">
                            <div class="col"></div>
                            <div class="col mb-2">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Aceptar</button>
                    </form>
                </div>
                <div class="col mb-2">
                    <form action="{{ route('noticias.destroy',['id' => $noticia->id]) }}" method="post">
                        <input name="_method" type="hidden" value="DELETE">
                        @csrf
                        <input type="submit" class="btn btn-danger btn-lg btn-block" name="Eliminar" value="Eliminar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection