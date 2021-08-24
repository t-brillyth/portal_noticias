@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow p-1 mt-5 mb-2 bg-white rounded">
                <div class="card-header text-center">
                    <h2>Bienvenido al portal de noticias</h2></div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                     <a href="{{ url('/noticias') }}" class="btn btn-info btn-lg mt-2">Ver mis noticias</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
