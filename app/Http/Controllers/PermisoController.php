<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionController
 * @package App\Http\Controllers
 */
class PermisoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:permisos.index')->only('index');
        $this->middleware('can:permisos.store')->only('create', 'store');
        $this->middleware('can:permisos.update')->only('edit', 'update');
        $this->middleware('can:permisos.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('Catalogos.permission.index', [
            'permissions' => Permission::select('id', 'name', 'description')
                ->when(empty($request->buscar) == false, function ($query) use ($request) {
                    return $query->where('name', 'LIKE', '%' . $request->buscar . '%')
                        ->orWhere('description', 'LIKE', '%' . $request->buscar . '%');
                })
                ->orderBy('id')
                ->paginate(),
            'buscar' => $request->buscar,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Catalogos.permission.create', [
            'permission' => new Permission(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        $permission = Permission::create($request->all());
        return redirect()->route('permisos.index')
            ->with('success', 'El registro se agrego con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Catalogos.permission.show', [
            'permission' => Permission::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Catalogos.permission.edit', [
            'permission' => Permission::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->update($request->all());
        return redirect()->route('permisos.index')
            ->with('success', 'El registro se modifico con exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $permission = Permission::find($id)->delete();
        return back()->with('success', 'El registro se elimino con exito');
    }
}
