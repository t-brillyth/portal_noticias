@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="card shadow p-3 my-3 bg-white rounded">
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <form>
            @csrf
            <div class="form-group">
              <img class="img-fluid" src="{{url('/imagenes/'.$noticia->imagen)}}">
              <h3 class="pt-2"><?php echo $noticia->titulo; ?></h3>
              <p class="font-normal" id="formatDate"><?php
                                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                                    $date = $date = str_replace("/","-",$noticia->fecha);
                                    echo strftime('%A %d %B, %Y',strtotime($date));
                                    ?></p>
              <br/>
              <p class="font-weight-normal"><?php echo $noticia->descripcion; ?></p>
              <br/>
              <p class="font-italic mb-0 pb-0"><strong>Categoria:</strong> <?php echo $noticia->categoriadescripcion; ?></p>
              <p class="font-italic font-weight-bold"><?php echo $noticia->autor; ?></p>
              

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection