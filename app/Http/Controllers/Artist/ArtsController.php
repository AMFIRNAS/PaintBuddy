<?php

namespace App\Http\Controllers\Artist;

use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
class ArtsController extends Controller
{
    //
    public function ViewAOrders()
    {
        $order = Orders::all();
        return view('pages/Artist/artOrders')->with('order',$order);
        //return 'hello';
    }

    public function ViewCOrders()
    {
        $order = Orders::where('status','=','Completed')->get();
        return view('pages/Artist/artOrders')->with('order',$order);
    }

    public function ViewOOrders()
    {
        $order = Orders::where('status','=','Ongoing')->get();
        return view('pages/Artist/artOrders')->with('order',$order);
    }

    public function ViewCal()
    {
        $order = Orders::all();
        return view('pages/Artist/ordCalendar')->with('order',json_encode($order));
    }

    public function UpdOrderStat($ordID)
    {
        Orders::where('ordID',$ordID)
            ->update(['status' => 'Completed']);
        return Redirect::to('/ArtMainOrders');
    }
}
