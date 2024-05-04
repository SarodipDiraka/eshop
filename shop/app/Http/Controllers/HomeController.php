<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype=Auth::user()->usertype;

        if($usertype=="1")
        {
            // return view('admin.home');
            return redirect('adminpanel');
        }
        else
        {
            return redirect('home');
        }
    }

    public function index()
    {
        if(Auth::id())
        {
            $data = product::paginate(3);

            $user = auth()->user();

            $count = cart::where('user_id', $user->id)->count();
            return view('user.home', compact('data', 'count'));
        }
        else 
        {
            $data = product::paginate(3);
            return view('user.home', compact('data'));
        }
    }

    public function search(Request $request)
    {
        $search = $request->search;

        if($search == '')
        {
            $data = product::paginate(3);
            return view('user.home', compact('data'));
        }

        $data = product::where('title', 'Like', '%'.$search.'%')->get();
        return view('user.home', compact('data'));
    }

    public function addcart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user = auth()->user();

            $product = product::find($id);

            $cart = new Cart;

            $cart->user_id = $user->id;

            $cart->product_id = $product->id;

            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect()->back()->with('message', 'Product Added Successfully');
        }
        else return redirect('login');
    }

    public function showcart()
    {
        $user = auth()->user();

        $count = cart::where('user_id', $user->id)->count();

        $cart = cart::where('user_id', $user->id)->get();


        foreach($cart as $carts)
        {
            $product = product::find($carts->product_id);
            $carts->product_title = $product->title;
            $carts->price = $product->price;
        }

        return view('user.showcart', compact('count', 'cart'));
    }

    public function deletecart($id)
    {
        $data = cart::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'Product Removed Successfully');
    }

    public function confirmorder(Request $request)
    {
        $user = auth()->user();

        $userid = $user->id;

        foreach($request->id as $key=>$cartid)
        {
            $order = new order;

            $order->product_id = $request->product_id[$key];

            $order->user_id = $userid;
            $order->status = "not delivered";
            $order->quantity = $request->quantity[$key];
            $order->save();
        }
        DB::table('carts')->where('user_id', $userid)->delete();
        return redirect()->back()->with('message', 'Product Ordered Successfully');
    }

}
