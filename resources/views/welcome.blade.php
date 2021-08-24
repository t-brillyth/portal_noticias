@extends('layouts.app')
@section('content')
<div class="row p-4 m-0" id="headerPortal">
    <div class="text-light p-0 col-10 text-left offset-1">
        <h1 class="mt-5 font-weight-bold">Portal Noticias</h1>
        <p class="lead font-weight-normal">Lorem ipsum dolor sit amet consectetur ,
            <br>curae nullam nisl vivamus urna.
        </p>
    </div>
</div>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="card-deck">
                    <?php foreach ($noticias as $noticia) { ?>
                        <div class="col-md-4 my-2">
                            <div class="card">
                                <img class="card-img-top" src="{{url('/imagenes/'.$noticia->imagen)}}" alt="Image Notice">
                                <div class="card-body">
                                    <a href="show/<?php echo $noticia->id; ?>">
                                        <h5 class="card-title"><?php echo $noticia->titulo; ?></h5>
                                    </a>
                                    <p class="card-text"><?php echo substr($noticia->descripcion, 0, 150); ?>...</p>
                                </div>
                                <div class="card-footer text-muted">
                                    <strong>Categoria:</strong> <?php echo $noticia->categoriadescripcion; ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection