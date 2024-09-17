<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function addproduct(Request $request){
        $imagePath=null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploadedimages/product'), $imageName);
            $imagePath = $imageName;
        }

        $sellerid=Session('uid');
        $product=new Product;
        $product->name=$request->name;
        $product->price=$request->price;
        $product->description=$request->description;
        $product->seller_id=$sellerid;
        $product->catagory_id=$request->catagory;
        $product->image=$imagePath;
        $product->save();
        return redirect('/seller/index')->with('message', 'Product Added Successfuly');
    }
    public function editProduct(Request $request){

        $imagePath=null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploadedimages/product'), $imageName);
            $imagePath = $imageName;
        }
        $sellerid=Session('uid');
        $product=Product::find($request->id);
        $product->name=$request->name;
        $product->price=$request->price;
        $product->description=$request->description;
        $product->seller_id=$sellerid;
        $product->catagory_id=$request->catagory;
        $product->image=$imagePath;
        $product->save();
        return redirect()->back()->with('message', 'Product Edit Successfuly');
    }

    public function deleteproduct($id){
        $Product = Product::find($id);
        $Product->delete();
        return redirect('/seller/viewallproduct')->with('message', 'Product has been deleted Successfuly');

    }
}
