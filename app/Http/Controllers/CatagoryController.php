<?php

namespace App\Http\Controllers;
use App\Models\Catagory;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    public function addcatagory(Request $request){

        $imagePath=null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploadedimages/catagory'), $imageName);
            $imagePath = $imageName;
        }

        $catagory=new Catagory;
        $catagory->name=$request->name;
        $catagory->description=$request->description;
        $catagory->image=$imagePath;
        $catagory->save();
        return redirect('/admin/index')->with('message', 'Catagory Added Successfuly');
    }

    public function viewallcatagaries()
    {

        $catagory = Catagory::get();
        return view('admin.allcatagories', compact('catagory'));
    }

    public function catagorydelete($id){
        $catagory = Catagory::find($id);
        $catagory->delete();
        return redirect('/admin/viewallcatagaries')->with('message', 'Catagory has been deleted Successfuly');

    }
    public function viewCatagoryDetail($id){
        $catagory = Catagory::find($id);
        $products=Product::where('catagory_id',$id)->get();

        return view('userfront.catagoydetail', compact('catagory','products'));

    }
}
