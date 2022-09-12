<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDistrict;
use App\Models\District;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Http\Request;

class DistrictsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::paginate(10);
        $headers = ['id', 'name', 'status', 'acciones'];

        return view('admin.districts.index', compact('headers', 'districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $zones = Zone::where('status', 1)->get();

        return view('admin.districts.create', compact('users', 'zones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDistrict $request)
    {
        $district = $request->all();

        $district = District::create($district);

        return redirect()->route('distritos.create')->with('info', $district->name .' se ha creado');
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
        $district   = District::find($id);
        $users      = User::all();
        $zones      = Zone::where('status', 1)->get();

        return view('admin.districts.edit', compact('district','users', 'zones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDistrict $request, $id)
    {
        $district = District::find($id);

        $district->update($request->all());

        return redirect()->route('distritos.edit', $district->id)->with('info', $district->name .' se ha edito');
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
