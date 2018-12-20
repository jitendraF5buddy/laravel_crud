<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ManageHomeBanner as ManageBanner;
use Illuminate\Support\Facades\Input;

class ManageHomeBanner extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $result = ManageBanner::all();
        return view('homebanner',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addhomebanner');
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
            'title' => 'required|max:255',
            'description' => 'required',
            'extra_description' => 'required',
            'banner_type' => 'required',
            'status' => 'numeric',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = Input::all();
        unset($data['_token']);
        unset($data['_method']);
        unset($data['submit']);


        if(Input::hasFile('banner_image')){
           $file=Input::file('banner_image');
           $filename = url('/').'/banner_image/'.time().$file->getClientOriginalName();
           $file->move('banner_image',$filename);
        }else {
            $filename = '';
        }
        /*$file=Input::file('banner_image');
        print_r($file);
        $filename = time() . '.' . $file->getClientOriginalName();
        $file->move('public/banner_image',$filename);*/
        $data['banner_image'] = $filename;
        $update = ManageBanner::create($data);
        //dd(DB::getQueryLog());
        if ($update) {
            session()->flash('success','Successfully added new record');
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
        $getRecord = ManageBanner::find($id);
        if(!$getRecord){
            session()->flash('danger','Something went wrong this id='.$id);
            return redirect('manage-banner');
        }
        return view('edithomebanner',compact('getRecord'));
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
            'title' => 'required|max:255',
            'description' => 'required',
            'extra_description' => 'required',
            'banner_type' => 'required',
            'status' => 'numeric',
            
        ]);

        $data = Input::all();
        unset($data['_token']);
        unset($data['_method']);
        unset($data['submit']);

        if(Input::hasFile('banner_image')){
           $file=Input::file('banner_image');
           $filename = url('/').'/banner_image/'.time().$file->getClientOriginalName();
           $file->move('banner_image',$filename);
        }else {
            $filename = '';
        }
        
        if($filename!=""){
           $data['banner_image'] = $filename;     
        }

        $update = ManageBanner::whereId($id)->update($data);
        if ($update) {
            session()->flash('success','Successfully update record');
            return redirect()->back();
        }else{
            session()->flash('danger','Something went wrong');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = ManageBanner::whereId($id)->delete();
        if ($deleted) {
            session()->flash('success','Successfully deleted record');
            return redirect()->back();
        }else{
            session()->flash('danger','Something went wrong in delete');
            return redirect()->back();
        }
    }
}
