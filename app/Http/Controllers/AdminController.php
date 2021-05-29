<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use App\Models\Land;

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
            'description' => 'required',
            'image'=>'required|image',
        ]);
        $imagePath = request('image')->store('uploads','public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        land::create([
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



        $land = land::find($id);
        $land->delete();

                return redirect('/adminhome');


    }

}
