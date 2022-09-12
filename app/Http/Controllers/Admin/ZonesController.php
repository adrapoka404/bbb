<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreZone;
use App\Models\User;
use App\Models\Werehouse;
use App\Models\Zone;
use Illuminate\Http\Request;

class ZonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zones = Zone::paginate(10);
        $headers = ['ID', 'Nombre', 'Estado', 'Acciones'];
        
        return view('admin.zones.index', compact('zones', 'headers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::select('id', 'name')->get();
        $werehouses = Werehouse::where('status', 1)->get();
        
        return view('admin.zones.create', compact('users', 'werehouses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreZone $request)
    {
        $zone = $request->all();

        $zone = Zone::create($zone);

        return redirect()->route('zonas.create')->with('info', $zone->name .' se ha creado');
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
        $zone = Zone::find($id);
        $users = User::select('id', 'name')->get();
        $werehouses = Werehouse::where('status', 1)->get();
        
        return view('admin.zones.edit', compact('zone','users', 'werehouses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreZone $request, $id)
    {
        $zone = Zone::find($id);

        $zone->update($request->all());

        return redirect()->route('zonas.edit', $zone->id)->with('info', $zone->name .' se ha editado');
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
