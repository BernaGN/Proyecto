<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class EtiquetaController
 * @package App\Http\Controllers
 */
class EtiquetaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:etiquetas.index')->only('index');
        $this->middleware('can:etiquetas.store')->only('create', 'store');
        $this->middleware('can:etiquetas.update')->only('edit', 'update');
        $this->middleware('can:etiquetas.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('Catalogos.etiqueta.index', [
            'etiquetas' => Etiqueta::when(empty($request->buscar) == false,
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
        return view('Catalogos.etiqueta.create', [
            'etiqueta' => new Etiqueta(),
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
        $etiqueta = Etiqueta::create($request->except('_token', 'nombre', 'slug', 'descripcion'));
        $etiqueta->informacion()->create([
            'nombre' => $request->nombre,
            'slug' => Str::of($request->nombre)->slug("-")->trim("-"),
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('etiquetas.index')
            ->with('success', 'El registro fue agregado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Etiqueta $etiqueta)
    {
        return view('Catalogos.etiqueta.show', [
            'etiqueta' => $etiqueta,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Etiqueta $etiqueta)
    {
        return view('Catalogos.etiqueta.edit', [
            'etiqueta' => $etiqueta,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Etiqueta $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etiqueta $etiqueta)
    {
        $etiqueta->update($request->except('_token', '_method', 'nombre', 'slug', 'descripcion'));
        $etiqueta->informacion()->update([
            'nombre' => $request->nombre,
            'slug' => Str::of($request->nombre)->slug("-")->trim("-"),
            'descripcion' => $request->descripcion,
        ]);
        return redirect()->route('etiquetas.index')
            ->with('success', 'El registro fue modificado con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Etiqueta $etiqueta)
    {
        $etiqueta->delete();
        return back()->with('success', 'El registro fue eliminado con exito.');
    }

    public function restore($id)
    {
        Etiqueta::onlyTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'El registro fue agregado con exito.');
    }
}
