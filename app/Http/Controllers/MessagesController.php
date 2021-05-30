<?php

namespace App\Http\Controllers;
use App\Models\messages;
use App\Models\User;

use Illuminate\Http\Request;

class MessagesController extends Controller
{

public function chat(){
return view('messageadmin');
}


public function store(Request $request)
{
// dd($request->message);
  messages::create([
        'message' => $request->message,
        'user_id' => auth()->user()->id,
    ]);
 return redirect('/message');
}



}
