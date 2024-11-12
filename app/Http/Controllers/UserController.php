<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farm;
use App\Models\User;
use App\Models\Balans;
use App\Models\Paymart;
use App\Models\Hudud;
use App\Models\Order;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller{
    public function balans(){
        $Paymart = Paymart::where('factory_id',auth()->user()->factory_id)->get();
        return view('user.balans',compact('Paymart'));
    }
    public function hodim(){
        $User = User::where('factory_id',auth()->user()->factory_id)->where('type','!=','admin')->get();
        return view('user.hodim',compact('User'));
    }
    public function hodim_create(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'type' => 'required',
            'email' => 'required',
        ]);
        $Farm = Farm::find(auth()->user()->factory_id);
        User::create([
            'factory_id'=>auth()->user()->factory_id,
            'name'=>$request->name,
            'phone'=>$request->phone,
            'status'=>$Farm->status,
            'type'=>$request->type,
            'email'=>$request->email,
            'password' => Hash::make('12345678'),
        ]);
        return redirect()->back()->with('success', 'Yangi hodim qo\'shildi. Parol 12345678');
    }
    public function hodim_create_look($id){
        $User = User::find($id);
        if($User->status=='true'){
            $User->status = 'false';
            $User->save();
            return redirect()->back()->with('success', 'Hodim bloklandi');
        }else{
            $User->status = 'true';
            $User->save();
            return redirect()->back()->with('success', 'Hodim aktivlashtirildi');
        }
    }
    public function hodim_update_password($id){
        $User = User::find($id);
        $User->password = Hash::make('12345678');
        $User->save();
        return redirect()->back()->with('success', 'Parol yangilandi. Yangi parol: 12345678');
    }
    public function hudud(){
        $Hudud = Hudud::where('factory_id',auth()->user()->factory_id)->get();
        return view('user.hudud',compact('Hudud'));
    }
    public function hudud_create(Request $request){
        $validated = $request->validate([
            'hudud_name' => 'required',
            'muljal' => 'required',
        ]);
        Hudud::create([
            'factory_id'=>auth()->user()->factory_id,
            'hudud_name'=>$request->hudud_name,
            'muljal'=>$request->muljal,
            'status'=>'true',
        ]);
        return redirect()->back()->with('success', 'Yangi hudud qo\'shildi');
    }
    public function hudud_look($id){
        $Hudud = Hudud::find($id);
        if($Hudud->status=='true'){
            $Hudud->status = 'false';
            $Hudud->save();
            return redirect()->back()->with('success', 'Hudud bloklandi');
        }else{
            $Hudud->status = 'true';
            $Hudud->save();
            return redirect()->back()->with('success', 'Hudud aktivlashtirildi');
        }
    }

    public function orders(){
        $Order = Order::where('factory_id',auth()->user()->factory_id)->where('status','new')->get();
        $Hudud = Hudud::where('factory_id',auth()->user()->factory_id)->get();
        return view('user.orders',compact('Order','Hudud'));
    }
    public function orders_create(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'count' => 'required',
            'phone' => 'required',
            'addres' => 'required',
            'hudud_id' => 'required',
        ]);
        Order::create([
            'name' => $request->name,
            'count' => $request->count,
            'phone' => $request->phone,
            'addres' => $request->addres,
            'hudud_id' => $request->hudud_id,
            'factory_id' => auth()->user()->factory_id,
            'user_email' => auth()->user()->email,
            'status' => 'new'
        ]);
        // SEND MESSEGE
        return redirect()->back()->with('success', 'Buyurtma qabul qilindi');
    }
    public function order_delete($id){
        $Order = Order::find($id);
        $Order->status = 'delete';
        $Order->save();
        return redirect()->back()->with('success', 'Buyurtma o\'chirildi');
    }
    public function report(){
        return view('user.report');
    }
    public function report_show(Request $request){
        if($request->type == 'all'){
            $Order = Order::where('factory_id',auth()->user()->factory_id)->get();
            $type="Barcha buyurtmalar";
        }elseif($request->type == 'pedding'){
            $Order = Order::where('factory_id',auth()->user()->factory_id)->where('status','pedding')->get();
            $type="Yetqazib berilmoqda";
        }elseif($request->type == 'end'){
            $Order = Order::where('factory_id',auth()->user()->factory_id)->where('status','end')->get();
            $type="Yakunlangan buyurtmalar";
        }elseif($request->type == 'new'){
            $Order = Order::where('factory_id',auth()->user()->factory_id)->where('status','new')->get();
            $type="Yangi buyurtmalar";
        }elseif($request->type == 'cancel'){
            $Order = Order::where('factory_id',auth()->user()->factory_id)->where('status','cancel')->get();
            $type="Bekor qilingan buyurtmalar";
        }else{
            $Order = Order::where('factory_id',auth()->user()->factory_id)->where('status','delete')->get();
            $type="O'chirilgan buyurtmalar";
        }
        return view('user.report_show',compact('Order','type'));
    }
    public function charts(){
        
        return view('user.charts');
    }
}
