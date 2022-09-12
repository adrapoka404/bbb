<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWerehouse;
use App\Models\User;
use App\Models\Werehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WerehousesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $werehouses = Werehouse::paginate(10);
        $headers = ['ID', 'Nombre', 'Estado', 'Acciones'];

        return view('admin.werehouses.index', compact('headers', 'werehouses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.werehouses.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWerehouse $request)
    {
        $werehouse = $request->all();
        
        $werehouse = Werehouse::create($werehouse);

        return redirect()->route('almacenes.create')->with('info', $werehouse->name .' se ha creado');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $werehouse = Werehouse::find($id);
        $users = User::all();

        return view('admin.werehouses.edit', compact('werehouse', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreWerehouse $request, $id)
    {
        $werehouse = Werehouse::find($id);
        
        $werehouse->update($request->all());

        return redirect()->route('almacenes.edit', $werehouse->id )->with('info', $werehouse->name .' se ha editado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
