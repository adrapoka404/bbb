<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSale;
use App\Models\Sale;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $date       = date('Y-m');
        $today      = date('Y-m-d');
        $sales      = Sale::where('created_at', 'like', $date .'%')->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        $sale_today = Sale::where('created_at', 'like', $today.'%')->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $headers    = ['id','tienda','cantidad','fecha','acciones'];

        foreach($sales as &$sale) {
            $sale->store = Store::find($sale->store_id);
            $sale->quantity = '$ ' . number_format($sale->quantity, 2);
        }
        
        return view('admin.sales.index', compact('sales', 'headers', 'today', 'sale_today'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $session_store  = null;
        if(session()->has('store_id'))
            $session_store = Store::find(session()->get('store_id'));

            
        $stores = Store::orderBy('name', 'desc')->get();
        $today = date('d/m/Y');
//return $today;
        return view('admin.sales.create', compact('stores','session_store', 'today'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSale $request)
    {
        
        
        $sale = $request->all();
        
        $sale['user_id'] = Auth::user()->id;
        
        $sale = Sale::create($sale);

        return redirect()->route('ventas.index')->with('info', ' EL registro fue exitoso');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        session()->put('store_id', $id);

        return redirect()->route('ventas.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
