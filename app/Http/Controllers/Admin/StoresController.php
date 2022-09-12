<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStore;
use App\Models\District;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores     = Store::paginate(10);
        $headers    = ['id', 'name', 'status', 'acciones'];

        return view('admin.stores.index', compact('stores', 'headers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users      = User::all();
        $districts  = District::where('status', 1)->get();

        return view('admin.stores.create', compact('users', 'districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStore $request)
    {
        $store = $request->all();
        
        $store = Store::create($store);

        return redirect()->route('tiendas.create')->with('info', $store->name .' se ha creado');
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
        $store      = Store::find($id);
        $users      = User::all();
        $districts  = District::where('status', 1)->get();

        return view('admin.stores.edit', compact('store', 'users', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStore $request, $id)
    {
        $store = Store::find($id);
        
        $store->update($request->all());

        return redirect()->route('tiendas.edit', $store->id)->with('info', $store->name .' se ha editado');
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
