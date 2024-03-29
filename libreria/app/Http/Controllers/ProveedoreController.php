<?php

namespace App\Http\Controllers;

use App\Models\Proveedore;
use App\Http\Requests\ProveedoreRequest;

/**
 * Class ProveedoreController
 * @package App\Http\Controllers
 */
class ProveedoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedore::paginate();

        return view('proveedore.index', compact('proveedores'))
            ->with('i', (request()->input('page', 1) - 1) * $proveedores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proveedore = new Proveedore();
        return view('proveedore.create', compact('proveedore'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProveedoreRequest $request)
    {
        Proveedore::create($request->validated());

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedore created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $proveedore = Proveedore::find($id);

        return view('proveedore.show', compact('proveedore'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $proveedore = Proveedore::find($id);

        return view('proveedore.edit', compact('proveedore'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProveedoreRequest $request, Proveedore $proveedore)
    {
        $proveedore->update($request->validated());

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedore updated successfully');
    }

    public function destroy($id)
    {
        Proveedore::find($id)->delete();

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedore deleted successfully');
    }
}
