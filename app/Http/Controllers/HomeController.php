<?php

namespace App\Http\Controllers;
require base_path('/vendor/mike42/escpos-php/autoload.php');

use Illuminate\Http\Request;
use App\Product;
use App\Sale;
use App\User;
use Auth;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Carbon\Carbon;

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
     * @return \Illuminate\Http\Response
     */


    public function index()
    {   
        $user = Auth::user();
        if($user->role == 'admin'){
        $mode = 0;
        $products = Product::orderby('name' , 'asc')->get();
        return view('home' , compact('products' , 'mode'));
        }
        elseif($user->role == 'cashier'){

            $mode = 0;
            $sales = Sale::where('status' , 0)->orderby('id', 'desc')->get();
            $products = Product::orderby('name', 'asc')->get();

            return view('cashier' , compact('sales' , 'products', 'mode')) ;
        }

    }

   

 public function additem(Request $request){
    $mode = 0;
    $user = Auth::User();
    $item = Product::where('name' , $request->input('name'))->first();
    $count = Sale::where('name' , $item->name)->where('status' , 0)->count();
    $quantity = $request->input('quantity');
    if(empty($quantity)){
        $quantity = 1 ;
    }
    else{
    $quantity = $quantity ;
    }

        if( $quantity > 0){
            $newsale = Sale::create([
                'username' => $user->email ,
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $quantity ,
                'total' => $item->price * $quantity ,
                'status' => 0 ,
            ]);


        return redirect()->back()->with('mode');    
        }
    }

    public function edititem($id){
        $mode = 1;
        $item = Sale::find($id);
        $sales = Sale::where('status' , 0)->orderby('id', 'desc')->get();
        return view('cashier' , compact('mode' , 'item' , 'sales'));
    }


    public function updateitem(Request $request , $id){
        $mode = 0;
        $quantity = $request->input('quantity');
        $sameitem = Sale::find($id);
        $item = Product::where('name' , $sameitem->name)->first();

        if($quantity > 0){
        $sameitem->quantity = $quantity;
        $sameitem->total = $sameitem->quantity * $item->price ;
        $sameitem->save(); 
        }
        elseif($quantity == 0) {
            $sameitem->delete();
        }
        return redirect()->route('home');
      }

    
      public function deleteitem($id){
        $mode = 0;
        $sameitem = Sale::find($id);
        $sameitem->delete();
        return redirect()->back()->with('mode');

      }
    public function addproduct(Request $request){
        request()->validate([
            'name' => 'required|unique:products|string' ,
            'price' => 'required'
        ]);
        $product = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ]);
        $mode = 0 ;
        $products = Product::orderby('name' , 'asc')->get();
        return redirect()->back()->with('products', 'mode');
    }

    public function editproduct($id)
    {   $mode = 1;
        $product = Product::where('id' , $id)->first();
        $products = Product::orderby('name' , 'asc')->get();
        return view('home' , compact('products' , 'mode' , 'product'));
    }


    public function updateproduct(Request $request , $id){
        $product = Product::find($id);
        request()->validate([
            'price' => 'required' ,
        ]);

        $product->price = $request->input('price');
        $product->save();

        $mode = 0;
        $products = Product::orderby('name' , 'asc')->get();
        return redirect()->route('home');
    }

    public function deleteproduct($id){
        $find = Product::find($id);
        $find->delete();

        return redirect()->back();
    }

    public function allusers(){
        $mode = 0 ;
        $me = Auth::user()->id;
        $users = User::where('id' , '!=' , $me)->get();
        return view('allusers' , compact('users' , 'mode'));
    }

     
    public function adduser(Request $request){
        request()->validate([
            'email' => 'required|unique:users|string' ,
            'role' => 'required',
            'password' => 'required'
        ]);
        $user = user::create([
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'password' => bcrypt($request->input('password')),
        ]);
        $mode = 0 ;
        $me = Auth::user()->id;
        $users = User::where('id' , '!=' , $me)->get();
        return redirect()->back()->with('users', 'mode');
    }


    public function edituser($id)
    {   $mode = 1;
        $user = user::where('id' , $id)->first();
        $me = Auth::user()->id;
        $users = User::where('id' , '!=' , $me)->get();
        return view('allusers' , compact('users' , 'mode' , 'user'));
    }

    public function updateuser(Request $request , $id){
        $user = user::find($id);
        $inputname =  $request->input('email');
        if ($inputname == $user->email){
            $valname = 'required' ;
        }
        else{
            $valname = 'required|unique:users|string' ;
        }

        request()->validate([
            'email' => $valname ,
            'role' => 'required' ,
            'password' => 'required' ,
        ]);

        $user->email = $inputname ;
        $user->role = $request->input('role');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        $mode = 0;
        $me = Auth::user()->id;
        $users = User::where('id' , '!=' , $me)->get();
        return redirect()->route('allusers');
    }

    public function deleteuser($id){
        $find = user::find($id);
        $find->delete();

        return redirect()->back();
    }

    public function salesummary(){
        $mode = 0;
        $sales = Sale::where('status' , 1)->orderby('id', 'desc')->get();
	    $total = Sale::where('status' , 1)->sum('total');

        return view('salessummary' , compact('sales' , 'total' , 'mode'));
    }

    
    public function filtersalesummary(Request $request){
        $mode = 1;
        $from = $request->input('start');
        $to = $request->input('to');
        $new = Carbon::parse($to);
        $end = $new->addDay(1);
        $sales = Sale::where('status' , 1)->orderby('id', 'desc')->where('created_at' , '>=' , $from)->where('created_at' , '<=' , $end)->get();
	    $total = Sale::where('status' , 1)->where('created_at' , '>=' , $from)->where('created_at' , '<=' , $end)->sum('total');
        return view('salessummary' , compact('sales' , 'total' , 'mode'));
    }

    public function deletesalesummaryitem($id){
        $sale = Sale::find($id);
        $delete = $sale->delete();

        return redirect()->back();
    }


    public function deleteallsalesummary(){
    
        $sales = Sale::where('status' , 1)->orderby('id', 'desc')->get();
        
        foreach($sales as $sale){
            $sale->delete();
        }

        return redirect()->back();
    }

    public function products(){
        $products = Product::orderby('name' , 'asc')->get();
        return view('products' , compact('products'));
    }

    public function savesaledetails(){
        $sales = Sale::where('status' , 0)->get();
	$total = Sale::where('status' , 0)->sum('total');
	$now = new Carbon;
       
	
    $connector = new WindowsPrintConnector("XP-58S");
    $printer = new Printer($connector);
	$date = date('d M Y', strtotime($now));

	 /* Title of receipt */
	 $printer -> setJustification(Printer::JUSTIFY_RIGHT);
	 $printer -> text("\n");
	 $printer -> text($date . "\n");
	 $printer -> setJustification(Printer::JUSTIFY_LEFT);
	 $printer -> setEmphasis(true);
	 $printer -> text("SALES RECEIPT\n");
	 $printer -> text("\n");

	 /* Name of shop */
	 $printer -> setJustification(Printer::JUSTIFY_CENTER);
	 $printer -> text("GPOWER FROZEN FOODS.\n");
	 $printer -> selectPrintMode();
	 $printer -> text("\n");
	 $printer -> text("Akinyemi Cresent, Awoyaya Lekki Lagos.\n");
	 $printer -> setEmphasis(false);
	 $printer -> text("\n");
	 $printer -> text("\n");
	 $printer -> setJustification(Printer::JUSTIFY_LEFT);
	 $printer -> setEmphasis(true);
	 $printer -> text("PRODUCT NAME  |  PRICE \n");

	 foreach($sales as $sale){
            $printer -> text("--------------------------------\n");
            $printer -> text($sale->name.' '.$sale->total. "\n") ;
	   

         }
	 $printer -> setEmphasis(false);
	 $printer -> setJustification(Printer::JUSTIFY_RIGHT);
	 $printer -> text("\n");
	 $printer -> setEmphasis(true);
         $printer -> text("--------------------------------\n");
	 $printer -> text("Total = NGN ".$total);
	 $printer -> setEmphasis(false);	
	 $printer -> feed();


	 /* Footer */
	 $printer -> feed(2);
	 $printer -> setJustification(Printer::JUSTIFY_CENTER);
	 $printer -> text("Thank you for shopping at GPOWER FROZEN FOODS\n");
	 //$printer -> text("For trading hours, please visit example.com\n");
	 $printer -> feed(2);
	 $printer -> text("\n");
	 $printer -> text("\n");

          $printer -> cut();
          $printer -> close();

	foreach($sales as $sale){
            $sale->status = 1 ;
            $sale->save();
        }

        return redirect()->back();
    }

    public function changepassword(Request $request){
        $user = Auth::user();
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->route('home');
    }

   

    public function admincashier(){
        $mode = 0;
        $sales = Sale::where('status' , 0)->orderby('id', 'desc')->get();
        $products = Product::orderby('name', 'asc')->get();

        return view('cashier' , compact('sales' , 'products', 'mode')) ;
    }

    
    public function cashiersales(){
        $now =Carbon::today();
        $d = date("d", strtotime($now));
        $m = date("m", strtotime($now));
        $y = date("Y", strtotime($now));
        $data = Sale::where('status' , 1)->whereDay('created_at', $d)->whereMonth('created_at', $m)->whereYear('created_at', $y);
        $sales = $data->orderby('id', 'desc')->get();
        $total = $data->sum('total');
        return view('cashiersales' , compact('sales' , 'total'));
    }
}
