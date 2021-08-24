<?php

namespace App\Http\Controllers;

use App\Noticia;
use App\Categoria;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;


class NoticiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $noticias = DB::table('noticias')
            ->join('categorias', 'noticias.categorias_id', '=', 'categorias.id')
            ->join('users', 'noticias.users_id', '=', 'users.id')
            ->where('noticias.users_id', $user->id)
            ->select('noticias.*', 'categorias.descripcion as categoriadescripcion', 'users.name as usuario')
            ->get();
        return view('noticias.index', ['noticias' => $noticias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::where('estatus', 1)
            ->orderBy('descripcion', 'desc')
            ->get();
        return view('noticias.create', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $noticia = new Noticia;
        $noticia->titulo = $request->titulo;
        $noticia->autor = $request->autor;
        $noticia->fecha = $request->fecha;
        $noticia->descripcion = $request->descripcion;
        $noticia->imagen = "";
        $noticia->users_id = $user->id;
        $noticia->categorias_id = $request->categoria;
        $noticia->estatus = $request->estatus;
        if ($request->file('imagen')) {
            $imagen = $request->file('imagen');
            $ruta = '/imagenes/';
            $nombre = sha1(Carbon::now()) . '.' . $imagen->guessExtension();
            $imagen->move(getcwd() . $ruta, $nombre);
            $noticia->imagen = $nombre;
        }
        $noticia->save();
        return redirect()->route('noticias.index')->with('success','Noticia creada Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $noticia = DB::table('noticias')
            ->join('categorias', 'noticias.categorias_id', '=', 'categorias.id')
            ->join('users', 'noticias.users_id', '=', 'users.id')
            ->where('noticias.users_id', $user->id)
            ->where('noticias.id', $id)
            ->select('noticias.*', 'categorias.descripcion as categoriadescripcion', 'users.name as usuario')
            ->first();
        return view('noticias.show', ['noticia' => $noticia]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();
        $noticia = DB::table('noticias')
            ->join('categorias', 'noticias.categorias_id', '=', 'categorias.id')
            ->join('users', 'noticias.users_id', '=', 'users.id')
            ->where('noticias.users_id', $user->id)
            ->where('noticias.id', $id)
            ->select('noticias.*', 'categorias.descripcion as categoriadescripcion', 'users.name as usuario')
            ->first();
        $categorias = Categoria::where('estatus', 1)
            ->orderBy('descripcion', 'desc')
            ->get();
        return view('noticias.edit', ['noticia' => $noticia, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = auth()->user();
        $noticia = Noticia::find($id);
        $noticia->titulo = $request->titulo;
        $noticia->autor = $request->autor;
        $noticia->fecha = $request->fecha;
        $noticia->descripcion = $request->descripcion;
        $noticia->users_id = $user->id;
        $noticia->categorias_id = $request->categoria;
        $noticia->estatus = $request->estatus;
        if ($request->file('imagen')) {
            $imagen = $request->file('imagen');
            $ruta = '/imagenes/';
            $nombre = sha1(Carbon::now()) . '.' . $imagen->guessExtension();
            $imagen->move(getcwd() . $ruta, $nombre);
            $noticia->imagen = $nombre;
        }
        $noticia->save();
        return redirect()->route('noticias.index', ['id' => $id])->with('success','Noticia editada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia = Noticia::find($id);
        $noticia->delete();
        return redirect()->route('noticias.index')->with('error','Noticia eliminada Correctamente');
    }
}
