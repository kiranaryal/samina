<?php

namespace App\Http\Controllers;
use App\Models\messages;
use App\Models\User;

use Illuminate\Http\Request;

class MessagesController extends Controller
{

public function chat(){
$profile = user::where('role',1)->limit(1)->pluck('id');
return view('messageadmin',compact('profile'));
}


public function store(Request $request)
{
if ($request->profile_no == NULL)
$profile = user::where('role',1)->limit(1)->pluck('id');
foreach($profile as $profile){
  messages::create([
        'message' => $request->message,
        'user_id' => auth()->user()->id,
        'profile_id' => $profile,
    ]);
}

 return redirect('/message');

}
}
