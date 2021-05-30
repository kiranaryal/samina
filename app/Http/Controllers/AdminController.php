<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use App\Models\Property;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
public function index(){
 //---
if (auth()->user()->role == NULL)
{
return redirect('home');
}
//validating admin



return view('admin.home');

}
  public function store(){

//---
if (auth()->user()->role == NULL)
{
return redirect('home');
}//---validating admin




        $data = request()->validate([
            'name' => 'required',
            'price' => 'required',

            'description' => 'required',

            'image'=>'required|image',
        ]);
        $imagePath = request('image')->store('uploads','public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        Property::create([
            'name'=>$data['name'],
            'price'=>$data['price'],
            'description'=>$data['description'],

            'image'=>$imagePath,
        ]);
        


        return redirect('/adminhome');
    }


public function edit($id){


//---
if (auth()->user()->role == NULL)
{
return redirect('home');
}
//---validating admin

$property = Property::where('id',$id)->get();

return view('admin.edit',compact('property'));
}

public function update(){

//---
if (auth()->user()->role == NULL)
{
return redirect('home');
}//---validating admin




        $data = request()->validate([
            'id'=>'required',
            'name' => 'required',
            'price' => 'required',

            'description' => 'required',

            'image'=>'required|image',
        ]);
        $imagePath = request('image')->store('uploads','public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        Property::where('id',$data['id'])->update([
            'name'=>$data['name'],
            'price'=>$data['price'],
            'description'=>$data['description'],

            'image'=>$imagePath,
        ]);
        


        return redirect('/adminhome');
    }












public function destroy($id){
//---
if (auth()->user()->role == NULL)
{
return redirect('home');
}
//---validating admin



        $land = Property::find($id);
        $land->delete();

                return redirect('/adminhome');


    }

}
