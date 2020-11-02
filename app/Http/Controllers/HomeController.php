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
use App\PrinterConfig;

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


    public function index(Request $request)
    {   
        $from = $request->from ??  now()->addDays(-1);
        $to = $request->to ?? now();
        $sales = Sale::where('status' , 1)->orderby('id', 'desc')->whereBetween('created_at' ,[$from , $to])->paginate(10);
        $summary['price'] = 0;
	    $summary['quantity'] = 0;
        $summary['total'] = 0;
        foreach($sales as $sale){
            $summary['price']+= $sale->price;
            $summary['quantity']+= $sale->quantity;
            $summary['total']+= $sale->total;
        }
        $from = date('Y-m-d', strtotime($from));
        $to = date('Y-m-d', strtotime($to));
        return view('home' , compact('sales' , 'summary' , 'from' , 'to'));
    }

   

 public function additem(Request $request){
    $user = Auth::User();
    $item = Product::where('name' , $request->input('name'))->first();
    $quantity = $request->input('quantity');
    if(empty($quantity)){
        $quantity = 1 ;
    }
    else{
        $quantity = $quantity ;
    }

        if( $quantity > 0){
            Sale::create([
                'username' => $user->id ,
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $quantity ,
                'total' => $item->price * $quantity ,
                'status' => 0 ,
            ]);
        return redirect()->back()->with('mode')->with('success_msg' , 'Item added to list successfully!');    
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
        return redirect()->route('home')->with('success_msg' , 'Sale updated successfully!');
      }

    
      public function deleteitem($id){
        $mode = 0;
        $sameitem = Sale::find($id);
        $sameitem->delete();
        return redirect()->back()->with('mode');

      }
    public function addproduct(Request $request){
        $data = $request->validate([
            'name' => 'required|unique:products|string' ,
            'price' => 'required'
        ]);
        Product::create($data);
        return redirect()->route('products')->with('success_msg' , 'Product added successfully!');
    }

    public function editproduct($id)
    {   $mode = 1;
        $product = Product::where('id' , $id)->first();
        $products = Product::orderby('name' , 'asc')->get();
        return view('home' , compact('products' , 'mode' , 'product'));
    }


    public function updateproduct(Request $request , $id){
        $product = Product::find($id);
        $data = request()->validate([
            'name' => 'required' ,
            'price' => 'required' ,
        ]);
        $product->update($data);
        return redirect()->back()->with('success_msg' , 'Product updated successfully!');
    }

    public function deleteproduct($id){
        $find = Product::find($id);
        $find->delete();

        return redirect()->back()->with('success_msg' , 'Product deleted successfully!');
    }

    public function allusers(){
        $mode = 0 ;
        $users = User::get();
        return view('allusers' , compact('users' , 'mode'));
    }

     
    public function adduser(Request $request){
        $data = request()->validate([
            'username' => 'required|unique:users,username|string' ,
            'name' => 'required',
            'role' => 'required',
            'password' => 'required'
        ]);
        
        $data['password'] =  bcrypt($request->input('password'));
        $user = user::create($data);
        $me = Auth::user()->id;
        $users = User::where('id' , '!=' , $me)->get();
        return redirect()->back()->with('users')->with('success_msg' , 'Cashier added successfully!');
    }


    public function edituser($id)
    {   
        $user = user::where('id' , $id)->first();
        $me = Auth::user()->id;
        $users = User::where('id' , '!=' , $me)->get();
        return view('allusers' , compact('users' , 'user'));
    }

    public function updateuser(Request $request , $id){
        $user = user::find($id);
        $inputname =  $request->input('username');
        if ($inputname == $user->username){
            $valname = 'required' ;
        }
        else{
            $valname = 'required|unique:users,username|string' ;
        }

        request()->validate([
            'username' => $valname ,
            'role' => 'required' ,
            'name' => 'required' ,
            'password' => 'nullable' ,
        ]);

        $user->username = $inputname ;
        $user->name = $request->name ;
        $user->role = $request->input('role');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect()->route('allusers')->with('success_msg' , 'Cashier updated successfully!');
    }

    public function deleteuser($id){
        $find = user::find($id)->delete();
        return redirect()->back()->with('success_msg' , 'Cashier deleted successfully!');
    }

    public function salesummary(Request $request){
        $from = $request->from ??  now()->addDays(-1);
        $to = $request->to ?? now();
        $sales = Sale::where('status' , 1)->orderby('id', 'desc')->whereBetween('created_at' ,[$from , $to])->paginate(100);
        $summary['price'] = 0;
	    $summary['quantity'] = 0;
        $summary['total'] = 0;
        foreach($sales as $sale){
            $summary['price']+= $sale->price;
            $summary['quantity']+= $sale->quantity;
            $summary['total']+= $sale->total;
        }
        $from = date('Y-m-d', strtotime($from));
        $to = date('Y-m-d', strtotime($to));
        return view('salessummary' , compact('sales' , 'summary' , 'from' , 'to'));
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
        $printer = PrinterConfig::first();
        $sales = Sale::where('status' , 0)->get();
        $total = $sales->sum('total');
        $now = now();
        
        if($printer->status ?? '' == 1){

            $connector = new WindowsPrintConnector($printer->model);
            $printer = new Printer($connector);
            $date = date('d M Y', strtotime($now));

            /* Title of receipt */
            $printer -> setJustification(Printer::JUSTIFY_RIGHT);
            $printer -> text("\n");
            $printer -> text($date . "\n");
            $printer -> setJustification(Printer::JUSTIFY_LEFT);
            $printer -> setEmphasis(true);
            $printer -> text($printer->header."\n");
            $printer -> text("\n");

            /* Name of shop */
            $printer -> setJustification(Printer::JUSTIFY_CENTER);
            $printer -> text($printer->title."\n");
            $printer -> selectPrintMode();
            $printer -> text("\n");
            $printer -> text($printer->address."\n");
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
            $printer -> text($printer->footer."\n");
            $printer -> feed(2);
            $printer -> text("\n");
            $printer -> text("\n");

            $printer -> cut();
            $printer -> close();
        }

        foreach($sales as $sale){
            $sale->status = 1 ;
            $sale->save();
        }

        return redirect()->back()->with('success_msg' , 'Record saved successfully!');
    }

    public function changepassword(Request $request){
        $user = Auth::user();
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->route('home');
    }

   

    public function admincashier(){
        $sales = Sale::where('status' , 0)->orderby('id', 'desc')->get();
        $products = Product::orderby('name', 'asc')->get();
        $summary['price'] = 0;
	    $summary['quantity'] = 0;
        $summary['total'] = 0;
        foreach($sales as $sale){
            $summary['price']+= $sale->price;
            $summary['quantity']+= $sale->quantity;
            $summary['total']+= $sale->total;
        }

        return view('cashier' , compact('sales' , 'products' , 'summary')) ;
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
