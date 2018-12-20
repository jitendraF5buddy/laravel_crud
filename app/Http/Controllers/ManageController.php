<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Manage;
use Illuminate\Support\Facades\Input;

class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allrecord= Manage::all();
        return view("manage", compact('allrecord'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $allrecord= Manage::find($id);
        return view("manage_edit", compact('allrecord'));
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $data = Input::all();
        unset($data['_token']);
        unset($data['_method']);
        unset($data['submit']);
        //print_r($data);
        //DB::enableQueryLog();
        $update = Manage::whereId($id)->update($data);
        //dd(DB::getQueryLog());
        if ($update) {
            session()->flash('success','Country Created Successfully');
            return redirect()->back();
        }else{
            session()->flash('danger','Something went wrong');
            return redirect()->back();
        }

        //print_r($_POST);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Manage::whereId($id)->destroy();
        return redirect('manage');
    }
}
