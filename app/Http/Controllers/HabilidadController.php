<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabilidadRequest;
use App\Models\Habilidad;
use Illuminate\Http\Request;

/**
 * Class HabilidadeController
 * @package App\Http\Controllers
 */
class HabilidadController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:habilidades.index')->only('index');
        $this->middleware('can:habilidades.store')->only('create', 'store');
        $this->middleware('can:habilidades.update')->only('edit', 'update');
        $this->middleware('can:habilidades.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('Catalogos.habilidad.index', [
            'habilidades' => Habilidad::paginate(),
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
        return view('Catalogos.habilidad.create', [
            'habilidad' => new Habilidad(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(HabilidadRequest $request)
    {
        Habilidad::create($request->all());
        return redirect()->route('habilidades.index')
            ->with('success', 'El registro fue agregado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Habilidad $habilidade)
    {
        return view('Catalogos.habilidad.show', [
            'habilidad' => $habilidade,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Habilidad $habilidade)
    {
        return view('Catalogos.habilidad.edit', [
            'habilidad' => $habilidade,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Habilidad $habilidade
     * @return \Illuminate\Http\Response
     */
    public function update(HabilidadRequest $request, Habilidad $habilidade)
    {
        $habilidade->update($request->all());
        return redirect()->route('habilidades.index')
            ->with('success', 'El registro fue modificado con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Habilidad $habilidade)
    {
        $habilidade->delete();
        return back()->with('success', 'El registro fue eliminado con exito.');
    }
}
