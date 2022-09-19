<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Informacion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class CategoriaController
 * @package App\Http\Controllers
 */
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('Catalogos.categoria.index', [
            'categorias' => Categoria::when(empty($request->buscar) == false,
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
        return view('Catalogos.categoria.create', [
            'categoria' => new Categoria(),
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
        $categoria = Categoria::create($request->except('_token', 'nombre', 'slug', 'descripcion'));
        $categoria->informacion()->create([
            'nombre' => $request->nombre,
            'slug' => Str::of($request->nombre)->slug("-")->trim("-"),
            'descripcion' => $request->descripcion,
        ]);
        return redirect()->route('categorias.index')
            ->with('success', 'El registro fue agregado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        return view('Catalogos.categoria.show', [
            'categoria' => $categoria,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return view('Catalogos.categoria.edit', [
            'categoria' => $categoria,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $categoria->update($request->except('_token', '_method', 'nombre', 'slug', 'descripcion'));
        $categoria->informacion()->update([
            'nombre' => $request->nombre,
            'slug' => Str::of($request->nombre)->slug("-")->trim("-"),
            'descripcion' => $request->descripcion,
        ]);
        return redirect()->route('categorias.index')
            ->with('success', 'El registro fue modificado con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return back()->with('success', 'El registro fue eliminado con exito.');
    }

    public function restore($id)
    {
        Categoria::onlyTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'El registro fue agregado con exito.');
    }
}
