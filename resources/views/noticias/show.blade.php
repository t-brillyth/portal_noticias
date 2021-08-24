@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow p-3 my-5 bg-white rounded">
                <div class="card-header">
                    <h2 class="text-center ">Detalle noticia</h2></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form>
                      @csrf
                      <div class="form-group">
                        <label for="estatus"><b>Imagen</b></label>
                        <br>
                        <img class="img-fluid" src="{{url('/imagenes/'.$noticia->imagen)}}">
                      </div>
                      <div class="form-group">
                        <label for="titulo"><b>Título</b></label>
                        <input type="text" readonly class="form-control-plaintext"  id="titulo" name="titulo" value="{{ $noticia->titulo }}">
                      </div>
                      <div class="form-group">
                        <label for="descripcion"><b>Descripción</b></label>
                        <textarea  readonly class="form-control-plaintext"  id="descripcion" name="descripcion" rows="4" cols="80" required>{{ $noticia->descripcion }}</textarea>
                      </div>
                        <div class="form-group">
                        <label for="categoria"><b>Categoría</b></label>
                        <input type="text" readonly class="form-control-plaintext"  id="categoria" name="categoria" value="{{ $noticia->categoriadescripcion }}">
                      </div>

                        <div class="form-group">
                        <a href="{{ route('noticias.edit', $noticia->id) }}" class="btn btn-primary">Editar</a>
                      </div>
</form>
</div>
            </div>
        </div>
    </div>
</div>
@endsection
