<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\PorudctRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Catch_;
use Symfony\Component\VarDumper\Caster\RedisCaster;

use PDF;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
    public function CategoryView(){
        return view("admin.viewcategory",["data"=>Category::all()]);
    }
    public function ProductView(){
        return view("admin.viewproduct",["cat"=>Category::all()]);
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
    public function store(CategoryRequest $request)
    {
        $Cat=Category::create($request->only(["name"]));
        $Cat->save();
        session()->flash("message","Category added succesfully!");
        return Redirect()->back();
    }
    public function addProduct(PorudctRequest $request){
        $Product=Product::create($request->only(["title","description","image","price","quantity","cat_id","discount_price"]));
        $Product->save();
        session()->flash("message","Product added succesfully!");
        return Redirect()->back();
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
    public function show_product(){
        return view("admin.showProduct",["product"=>Product::all()]);
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
    public function DeleteProduct($id){
        Product::destroy($id);
        session()->flash("message","The Product Deleted successfully !");
        return Redirect()->back();
    }

    public function EditProduct($id){
        $Categories=Category::all();
        $Product=Product::find($id);
        return view("admin.Updateproduct",compact("Product","Categories"));
    }
    public function UpdateProduct(Request $request,$id){
        // ["title","description","image","price","quantity","cat_id","discount_price"]
        $Product=Product::find($id);
        $Product->title=$request->input("title");
        $Product->description=$request->input("description");
        $Product->image=$request->input("image");
        $Product->price=$request->input("price");
        $Product->quantity=$request->input("quantity");
        $Product->cat_id=$request->input("cat_id");
        $Product->discount_price=$request->input("discount_price");
        $Product->save();
        session()->flash("message","The Product Updated it successfully !");
        return Redirect()->route("showProduct");

    }
    public function Show_Order(){
        $Orders=Order::all();
        return view("admin.Order",["Orders"=>$Orders]);
    }
    public function delete_order($id){
        Order::destroy($id);
        session()->flash("message","The Order Deleted successfully !");
        return Redirect()->route("Show_Order");
    }
    public function Delivered($id){
        $Order=Order::find($id);
        $Order->payment_status="Paid";
        $Order->delivery_status="Delivered";
        $Order->save();
        return Redirect()->back();

    }
    public function printpdf($id){
      

        $order=Order::find($id);
        $pdf=FacadePdf::loadView("admin.pdf",["order"=>$order]);
        return $pdf->download("order_details.pdf");

    }
    public function search(Request $request){
        $searchText=$request->input("search");
        $Orders=Order::where('name','like',"%$searchText%")->OrWhere('phone','like',"%$searchText%")->get();
        return view("admin.Order",["Orders"=>$Orders]);
        
    }

    public function Dashboard(){
        $TotalProduct=Product::count();
        $TotalOrder=Order::count();
        $TotalCustomer=User::count();
        $TotalPrice=Order::all()->sum("price");
        $TotalOrderDelivery=Order::all()->where("delivery_status","like","Delivered")->count();
        $TotalOrderprocessing=Order::all()->where("delivery_status","like","processing")->count();
        return view("admin.Dashboard",compact("TotalProduct","TotalOrder","TotalCustomer","TotalPrice","TotalOrderDelivery","TotalOrderprocessing"));
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
        Category::destroy($id);
        session()->flash("message","The Categroy Deleted successfully !");
        return Redirect()->back();

    }
}
