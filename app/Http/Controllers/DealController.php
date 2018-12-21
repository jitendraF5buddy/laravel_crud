<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DealModel;
use DB;
use App\Store;
use Illuminate\Support\Facades\Input;


class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $getdetal = DB::select("select d.id,d.title,d.description,d.code,d.deals_link,d.extra_description,sto.store_name from deals as d inner join stores as sto on sto.id = d.stores_id");
       return view('deal.deal-manage',compact('getdetal'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getallStore = Store::select('id','store_name')->pluck('store_name','id');

        return view('deal.deal-add',compact('getallStore'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'stores_id' => 'required',
            'description' => 'required',
            'extra_description' => 'required',
            'code' => 'required',
            'deals_link' => 'required',
        ]);

        $data = Input::all();
        unset($data['_token']);
        unset($data['_method']);
        unset($data['submit']);

        $data['date_add'] = now();

        $created = DealModel::create($data);
        //dd(DB::getQueryLog());
        if ($created) {
            session()->flash('success','Successfully added new coupon');
            return redirect()->back();
        }else{
            session()->flash('danger','Something went wrong');
            return redirect()->back();
        }
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
        $deleted = DealModel::whereId($id)->delete();
        if ($deleted) {
            session()->flash('success','Successfully deleted coupon');
            return redirect()->back();
        }else{
            session()->flash('danger','Something went wrong');
            return redirect()->back();
        }
    }
}
