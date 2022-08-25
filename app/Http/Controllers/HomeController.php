<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;
use Stripe;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        return view("home.index",["Products"=>Product::paginate(10)]);
    }
public function Redicret(){
    $userType=Auth::user()->userType;
    if($userType==1)
    { return view("admin.home");
      
    }else{

     
      $Products=Product::paginate(10);
        return view("home.index",compact("Products"));
    }
}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function product_detail($id){
        return view("home.product_detail",["Product"=>Product::find($id)]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function show_cart(){
       if(Auth::id()){
        $user=Auth::user();
        $id=$user->id;
        $allProduct=Cart::where("user_id","=",$id)->get();
        return view("home.show_cart",["allProduct"=>$allProduct]);
       }else{
        return Redirect("login");
       }
    }
    public function remove_cart($id){
     Cart::destroy($id);
     session()->flash("message","The Order is deleted Succesfully !");
     return redirect()->back();

    }
  
    public function cash_order(){
        $user=Auth::user();
        $userid=$user->id;
        $data=Cart::where("user_id","=",$userid)->get();
        
     foreach($data as $dt){
        $Order=new Order;
        $Order->name=$dt->name;
        $Order->Email=$dt->Email;
        $Order->user_id=$dt->user_id;
        $Order->phone=$dt->phone;
        $Order->addresse=$dt->addresse;
        $Order->product_title=$dt->product_title;
       $Order->price=$dt->price;
        $Order->image=$dt->image;
        $Order->product_id=$dt->product_id;
        $Order->quantity=$dt->quantity;
        $Order->payment_status="Cash On Delivery";
        $Order->delivery_status="processing";
        $Order->save();
        $cat_id=$dt->id;
        Cart::destroy($cat_id);
        
     }
        return redirect()->back()->with("message","We Received Your Order. We Will Connect with you Soon");
    }

    public function strip($totlalprice){
        return view("home.strip",["totlalprice"=>$totlalprice]);
    }

    public function post(Request $request,$totlalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totlalprice*100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks For payment ! " 
        ]);
    
        Session()->flash('success', 'Payment successful!');
        $user=Auth::user();
        $userid=$user->id;
        $data=Cart::where("user_id","=",$userid)->get();
        
     foreach($data as $dt){
        $Order=new Order;
        $Order->name=$dt->name;
        $Order->Email=$dt->Email;
        $Order->user_id=$dt->user_id;
        $Order->phone=$dt->phone;
        $Order->addresse=$dt->addresse;
        $Order->product_title=$dt->product_title;
       $Order->price=$dt->price;
        $Order->image=$dt->image;
        $Order->product_id=$dt->product_id;
        $Order->quantity=$dt->quantity;
        $Order->payment_status="Paid";
        $Order->delivery_status="processing";
        $Order->save();
        $cat_id=$dt->id;
        Cart::destroy($cat_id);
        
     }
        return redirect()->route("Show_Order")->with("message","We Received Your Order. We Will Connect with you Soon"); 
      
    }
    
    public function add_cart(Request $request,$id){
            if(Auth::id()){

                $user=Auth::user();
                $product=Product::find($id);
                $Cart=new Cart;
                $Cart->name=$user->name;
                $Cart->Email=$user->email;
                $Cart->user_id=$user->id;
                $Cart->phone=$user->phone;
                $Cart->addresse=$user->addresse;
                $Cart->product_title=$product->title;
                
                if($product->discount_price!=null){
                    $Cart->price=$product->discount_price*$request->quantity;
                }else{
                    $Cart->price=$product->price;
                }
                $Cart->image=$product->image;
                $Cart->product_id=$product->id;
                $Cart->quantity=$request->quantity;
                $Cart->save();
                return redirect()->back();

            
            }else{
                return Redirect("login");
            }
    }
    public function AllOrder(){
        if(Auth::id()){
            return view("home.order",["allorder"=>Order::all()]);
        }else{
            return redirect("login");
        }
    }
    public function insertComment(Request $request){
        if(Auth::id()){
           
           $Comment=new Comment();
           $Comment->user_id=Auth::user()->id;
           $Comment->name=Auth::user()->name;
           $Comment->comment=$request->comment;
           $Comment->save();
           
           return redirect()->back();
        }else{
           return redirect("login");
        }
           
       }
    public function remove_order($id){
        Order::destroy($id);
        return redirect()->back();
    }

    public function allProduct(){
    
        return view("home.allProduct",["Products"=>Product::all()]);
    }
    public function blog(){
        return view("home.bloge");
    }
    public function contact(){
        return view("home.contact");
    }
    // <input type="text" placeholder="Enter your full name" name="name" required />
    // <input type="email" placeholder="Enter your email address" name="email" required />
    // <input type="text" placeholder="Enter subject" name="subject" required />
    // <textarea placeholder="Enter your message" required name="message"></textarea>

    public function addContact(Request $request){
        $Contact= new Contact;
        $Contact->name=$request->input("name");
         $Contact->email=$request->input("email");
         $Contact->subject=$request->input("subject");
         $Contact->message=$request->input("message");
         $Contact=Contact::create($request->only(["name","email","subject","message"]));
         $Contact->save();
         return Redirect()->back();

    }
}
