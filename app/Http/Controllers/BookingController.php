<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    //
public function book($id){
  
$user_id = auth()->user()->id;
$property_id = $id;
Booking::updateOrCreate([
'user_id'=>$user_id,
'property_id'=>$property_id,


]);
return redirect('home');

}
}
