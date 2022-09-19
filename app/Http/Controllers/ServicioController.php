<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class ServicioController
 * @package App\Http\Controllers
 */
class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('Catalogos.servicio.index', [
            'servicios' => Servicio::when(empty($request->buscar) == false,
                fn($query) => $query->whereRelation('informacion', 'nombre', 'Like', '%' . $request->buscar . '%')
            )->when($request->activo == 1, fn($query) => $query->onlyTrashed())
                ->when($request->activo == null || $request->activo == 0, fn($query) => $query->withTrashed())
                ->paginate(),
            'buscar' => $request->buscar,
            'activo' => $request->activo,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Catalogos.servicio.create', [
            'servicio' => new Servicio(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $servicio = Servicio::create($request->except('_token', 'nombre', 'slug', 'descripcion'));
        $servicio->informacion()->create([
            'nombre' => $request->nombre,
            'slug' => Str::of($request->nombre)->slug("-")->trim("-"),
            'descripcion' => $request->descripcion,
        ]);
        return redirect()->route('servicios.index')
            ->with('success', 'El registro fue agregado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        return view('Catalogos.servicio.show', [
            'servicio' => $servicio,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
        return view('Catalogos.servicio.edit', [
            'servicio' => $servicio,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Servicio $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicio $servicio)
    {
        $servicio->update($request->except('_token', '_method', 'nombre', 'slug', 'descripcion'));
        $servicio->informacion()->update([
            'nombre' => $request->nombre,
            'slug' => Str::of($request->nombre)->slug("-")->trim("-"),
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('servicios.index')
            ->with('success', 'El registro fue modificado con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Servicio $servicio)
    {
        $servicio->delete();
        return back()->with('success', 'El registro fue eliminado con exito.');
    }

    public function restore($id)
    {
        Servicio::onlyTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'El registro fue agregado con exito.');
    }
}
