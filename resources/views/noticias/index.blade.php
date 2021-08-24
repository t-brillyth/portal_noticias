@extends('layouts.app')
@section('content')
@include('alerts.success')
@include('alerts.error')
@include('alerts.errors')

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <div class="card shadow p-0 mt-2 mb-5 bg-white rounded border-light">
                <div class="card-header">
                    <div class="row">
                    <div class="col-6">
                        <h2>Mis noticias</h2>
                    </div>
                    <div class="col-6 text-right pr-2">
                        @if (Auth::check())
                            <a class="nav-link {{{ (Request::is('noticias/create') ? 'active' : '') }}}" href="{{ route('noticias.create') }}">Crear <b class="pr-2">+</b></a>
                        @endif
                    </div>
                </div>
                </div>
                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                      <thead>
                        <tr class="table-active">
                          <th>Título</th>
                          <th>Categoría</th>
                          <th>Descripción</th>
                          <th>Fecha</th>
                          <th>Autor</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($noticias as $noticia) { ?>
                            <tr>
                                <td><p class="pr-2"><?php echo $noticia->titulo; ?></p></td>
                                <td><p class="pr-2"><?php echo $noticia->categoriadescripcion; ?></p></td>
                                <td><p class="pr-2"><?php echo substr($noticia->descripcion, 0, 150); ?>...</p></td>
                                <td><p class="pr-2" id="formatDate"> <?php
                                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                                    $date = $date = str_replace("/","-",$noticia->fecha);
                                    echo strftime('%A %d %B, %Y',strtotime($date));
                                    ?></p></td>
                                <td><p class="pr-2"><?php echo $noticia->autor; ?></p></td>
                                <td><a href="{{ route('noticias.edit', $noticia->id) }}">Editar</td>
                            </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
