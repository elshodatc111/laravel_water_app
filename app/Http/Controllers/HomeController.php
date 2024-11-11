<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farm;
use App\Models\User;
use App\Models\Balans;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class HomeController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        if (Auth::check() && Auth::user()->status != 'true') {
            Auth::logout(); 
            return redirect()->route('login')->with('error', 'Sizning profilingiz faol emas.');
        }
        if(Auth::user()->type=='drever'){
            Auth::logout(); 
            return redirect()->route('login')->with('error', 'Sizning profilingiz ruxsatlar mavjud emas. Mobile ilovadan foydalaning');
        }
        return view('home');
    }

    public function farm(){
        $Farm = Farm::get();
        return view('farm.farm',compact('Farm'));
    }

    public function farm_create(Request $request){
        $validated = $request->validate([
            'factory_name' => 'required',
            'drektor' => 'required',
            'phone' => 'required',
            'addres' => 'required',
            'paymart' => 'required',
        ]);
        $Farm = Farm::create([
            'factory_name'=>$request->factory_name,
            'drektor'=>$request->drektor,
            'phone'=>$request->phone,
            'addres'=>$request->addres,
            'paymart'=>$request->paymart,
            'status'=>'true',
            'check_messege'=>'false',
        ]);
        Balans::create([
            'factory_id' => $Farm->id,
            'messege' => 0,
            'hisoblandi' => 0,
            'tolandi' => 0,
        ]);
        return redirect()->back()->with('success', 'Yangi firma qo\'shildi.');
    }
    public function farm_show($id){
        $Farm = Farm::find($id);
        $User = User::where('factory_id',$id)->where('type','!=','admin')->get();
        $Balans = Balans::where('factory_id',$id)->first();
        return view('farm.farm_show',compact('Farm','User','Balans'));
    }
    public function farm_update(Request $request, $id){
        $validated = $request->validate([
            'factory_name' => 'required',
            'drektor' => 'required',
            'phone' => 'required',
            'addres' => 'required',
            'paymart' => 'required',
            'status' => 'required',
            'check_messege' => 'required',
        ]);
        $Farm = Farm::find($id);
        $Farm->factory_name = $request->factory_name ;
        $Farm->drektor = $request->drektor ;
        $Farm->phone = $request->phone ;
        $Farm->addres = $request->addres ;
        $Farm->paymart = $request->paymart ;
        $Farm->status = $request->status ;
        $Farm->check_messege = $request->check_messege ;
        $Farm->save();
        $User = User::where('factory_id',$id)->get();
        foreach ($User as $key => $value) {
            $User = User::find($value->id);
            $User->status = $request->status;
            $User->save();
        }
        return redirect()->back()->with('success', 'Firma ma`lumotlari yangilandi.');
    }
    public function farm_create_hodim(Request $request, $id){
        $validated = $request->validate([
            'factory_name' => 'required',
            'phone' => 'required',
            'type' => 'required',
            'email' => 'required',
        ]);
        $Farm = Farm::find($id);
        User::create([
            'factory_id'=>$id,
            'name'=>$request->factory_name,
            'phone'=>$request->phone,
            'status'=>$Farm->status,
            'type'=>$request->type,
            'email'=>$request->email,
            'password' => Hash::make('12345678'),
        ]);
        return redirect()->back()->with('success', 'Yangi hodim qo\'shildi. Parol 12345678');
    }
    public function farm_delete_hodim(Request $request, $id){
        $User = User::find($id);
        $User->delete();
        return redirect()->back()->with('success', 'Hodim o\'chirildi');
    }
}
