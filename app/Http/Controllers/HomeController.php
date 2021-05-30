<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
$property = Property::latest()->paginate(10);

        return view('home',compact('property'));
    }
public function brokers(){
$brokers = User::where('role',3)->get();
return view('brokers',compact('brokers'));


}
}
