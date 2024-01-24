<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Image;

class productController extends Controller
{
    public function product(){
        $product = Product::orderBy('created_at','desc')->Paginate();
        return view('backend.product.index',compact('product'));
    }

    public function create(){
        return view ('backend.product.create');
    }

    public function insert(Request $request)
    {
        //ป้องกันการกรอกข้อมูลผ่านฟอร์ม
        $validated = $request->validate([
            'name'=>'required|max:255',
            'price'=>'required|max:255',
            'description'=>'required',
            'image'=>'mimes:jpg,jpeg,png',
        ],
        [
            'name.required'=>'กรุณากรอกข้อมูลสินค้า',
            'name.max'=>'กรอกข้อมูลได้255ตัวอักษร',
            'price.required'=>'กรุณากรอกข้อมูลราคาสินค้า',
            'price.max'=>'กรอกข้อมูลได้255ตัวอักษร',
            'dexcription.required'=>'กรุณากรอกข้อมูลประเภทสินค้า',
            'image.mimes'=>'อัพโหลดภาพที่มีนามสกุล .jpg .jpeg .png ได้เท่านั้น',
        ]);
        $pro = new Product();
        $pro->name = $request->name;
        $pro->price = $request->price;
        $pro->description = $request->description;
        $pro->category_id = $request->category_id;

        if($request->hasFile('image')){
         $filename = Str::random(10).'.'.$request->file('image')->getClientOriginalExtension();
         $request->file('image')->move(public_path().'/backend/product/',$filename);
         Image::make (public_path().'/backend/product/'.$filename)->resize(200,200)->save(public_path().'/backend/product/resize/'.$filename);
         $pro->image = $filename;

        }else{
          $pro->image = "no_image.jpg";
        }
        $pro->save();
        alert()->success('บันทึกข้อมูลสำเร็จ','ข้อมูลนี้ถูกบันทึกแล้ว');
        return redirect('admin/product/index');
        }
}
