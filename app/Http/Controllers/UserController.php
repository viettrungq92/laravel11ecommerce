<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function orders(){
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->paginate(10);
        return view('user.orders',compact('orders'));
    }

    public function order_details($order_id){
        $order = Order::where('user_id',Auth::user()->id)->where('id',$order_id)->first();
        if($order){
            $orderItems = OrderItem::where('order_id',$order->id)->orderBy('id')->paginate(12);
            $transaction = Transaction::where('order_id',$order->id)->first();
            return view('user.order-details',compact('order','orderItems','transaction'));
        }
        else{
            return redirect()->route('login');
        }
    }

    public function order_cancel(Request $request){
        $order = Order::find($request->order_id);
        $order->status = 'canceled';
        $order->canceled_date = Carbon::now();
        $order->save();
        return back()->with('status',"Order has been cancelled successfully!");
    }

    public function addresses(){
        $address = Address::where('user_id',Auth::user()->id)->where('isdefault',1)->first();
        return view('user.addresses',compact('address'));
    }

    public function account_details(){
        return view('user.account-details');
    }
    public function setting_update(Request $request){
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email',
            'mobile' => 'required|numeric|digits:10',
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8',

        ]);
        $user = Auth::User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        // Check old password
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Password is wrong.']);
        }        
            $user->password = Hash::make($request->new_password);
            $user->save();
    
            return back()->with('success', 'The password has been changed successfully!');

    }
}
