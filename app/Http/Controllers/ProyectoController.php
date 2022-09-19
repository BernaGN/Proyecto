<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class ProyectoController
 * @package App\Http\Controllers
 */
class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('Catalogos.proyecto.index', [
            'proyectos' => Proyecto::with('cliente:id,nombre')
                ->when(empty($request->buscar) == false,
                    fn($query) => $query->whereRelation('informacion', 'nombre', 'Like', '%' . $request->buscar . '%')
                        ->orWhereRelation('cliente', 'nombre', 'Like', '%' . $request->buscar . '%')
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
        return view('Catalogos.proyecto.create', [
            'proyecto' => new Proyecto(),
            'cliente' => Cliente::pluck('nombre', 'id'),
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
        $proyecto = Proyecto::create($request->all());
        $proyecto->informacion()->create([
            'nombre' => $request->nombre,
            'slug' => Str::of($request->nombre)->slug("-")->trim("-"),
            'descripcion' => $request->descripcion,
        ]);
        if (isset($request->imagen)) {
            $proyecto->addMediaFromRequest('imagen')->toMediaCollection('proyectos');
        }
        return redirect()->route('proyectos.index')
            ->with('success', 'El registro fue agregado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        return view('Catalogos.proyecto.show', [
            'proyecto' => $proyecto,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        return view('Catalogos.proyecto.edit', [
            'proyecto' => $proyecto,
            'cliente' => Cliente::pluck('nombre', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proyecto $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $proyecto->update($request->all());
        $proyecto->informacion()->update([
            'nombre' => $request->nombre,
            'slug' => Str::of($request->nombre)->slug("-")->trim("-"),
            'descripcion' => $request->descripcion,
        ]);
        return redirect()->route('proyectos.index')
            ->with('success', 'El registro fue modificado con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
        return back()->with('success', 'El registro fue elimino con exito.');
    }

    public function restore($id)
    {
        Proyecto::onlyTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'El registro fue agregado con exito.');
    }
}
