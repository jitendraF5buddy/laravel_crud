<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use Illuminate\Support\Facades\Input;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $getAllStore = Store::all(); 
       return view('store.store-manage',compact('getAllStore'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('store.store-manage-add');
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
            'store_name' => 'required|max:255',
            'description' => 'required',
            'more_about_cms' => 'required',
            'description_sidebar' => 'required',
            'status' => 'numeric',
            'store_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'side_bar_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = Input::all();
        unset($data['_token']);
        unset($data['_method']);
        unset($data['submit']);


        if(Input::hasFile('store_image')){
           $file=Input::file('store_image');
           $store_image = url('/').'/storeimage_f/'.time().$file->getClientOriginalName();
           $file->move('storeimage_f',$store_image);
        }else {
            $store_image = '';
        }

        if(Input::hasFile('side_bar_image')){
           $file=Input::file('side_bar_image');
           $side_bar_image = url('/').'/storeimage_f/'.time().$file->getClientOriginalName();
           $file->move('storeimage_f',$side_bar_image);
        }else {
            $side_bar_image = '';
        }
    
        $data['store_image'] = $store_image;
        $data['side_bar_image'] = $side_bar_image;

        $addedd = Store::create($data);
        //dd(DB::getQueryLog());
        if ($addedd) {
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
        $getRecord = Store::find($id);
        if(!$getRecord){
            session()->flash('danger','Something went wrong this id='.$id);
            return redirect('manage-banner');
        }
        return view('store.store-manage-edit',compact('getRecord'));
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
            'store_name' => 'required|max:255',
            'description' => 'required',
            'more_about_cms' => 'required',
            'description_sidebar' => 'required',
            'status' => 'numeric',
        ]);

        $data = Input::all();
        unset($data['_token']);
        unset($data['_method']);
        unset($data['submit']);


        if(Input::hasFile('store_image')){
           $file=Input::file('store_image');
           $store_image = url('/').'/storeimage_f/'.time().$file->getClientOriginalName();
           $file->move('storeimage_f',$store_image);
        }else {
            $store_image = '';
        }

        if(Input::hasFile('side_bar_image')){
           $file=Input::file('side_bar_image');
           $side_bar_image = url('/').'/storeimage_f/'.time().$file->getClientOriginalName();
           $file->move('storeimage_f',$side_bar_image);
        }else {
            $side_bar_image = '';
        }
    
        if($store_image!=""){
            $data['store_image'] = $store_image;
        }
        if($side_bar_image!=""){
           $data['side_bar_image'] = $side_bar_image;
        }

        $updated = Store::whereId($id)->update($data);
        //dd(DB::getQueryLog());
        if ($updated) {
            session()->flash('success','Successfully updated data');
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
        $deleted = Store::whereId($id)->delete();
        if ($deleted) {
            session()->flash('success','Successfully deleted record');
            return redirect()->back();
        }else{
            session()->flash('danger','Something went wrong in delete');
            return redirect()->back();
        }
    }
}
