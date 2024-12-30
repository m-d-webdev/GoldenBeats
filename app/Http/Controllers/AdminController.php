<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\foodstuffs;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.add_article');
    }
    
    public function add_article(Request $request)
    {
        $imgFile = $request->file('element_img');
        $FileOriginaleName = pathinfo($imgFile->getClientOriginalName() , PATHINFO_FILENAME);
        $FileImgName = $FileOriginaleName . "_" . uniqid() . "." . $imgFile->getClientOriginalExtension();
       if( $imgFile->move('uploads' , $FileImgName)){
            $article = new foodstuffs;
            $article->name = $request->element_name;
            $article->type = $request->element_type;
            $article->phusical_type = $request->element_physical_type;
            $article->description = $request->element_desc;
            $article->ingredients = $request->element_component;
            $article->natur_info = $request->element_info;
            $article->price = $request->element_price;
            $article->image = 'uploads/'.$FileImgName;
            $article->save();
            return back();
        }
}
}