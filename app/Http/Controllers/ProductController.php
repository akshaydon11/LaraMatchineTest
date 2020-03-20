<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\Category;
use App\SubCategory;
use App\ChildCategory;
use DB;

class ProductController extends Controller
{
    public function index(){

    	$data = DB::table('products')
            ->join('categories', 'products.prod_category', '=', 'categories.cat_id')
            ->select('products.*', 'categories.cat_name')
            ->get();
        //	dd($data);
    	return view('products',compact('data'));
    }
    public function create(){
    	$data = Category::all();
    	return view('add_product',compact('data'));
    }
    public function store_prod(Request $request){
    	//dd($request->all());
    	$validate = request()->validate([
            'prod_name' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
            'prod_cat' => 'required',
            'prod_desc' => 'required',
            'prod_price' => 'required',
            'prod_img' => 'required|mimes:jpeg,jpg,png',
        ]);
       
        $image = $request->file('prod_img');
        $extension = $image->getClientOriginalExtension();
        $originalname = $image->getClientOriginalName();
        $path = $image->move('upload', $originalname);
        $imgsizes = $path->getSize();
        $mimetype = $image->getClientMimeType();
    	$prod = new  Product;

    	$prod->prod_name = $request->prod_name;
    	$prod->prod_category = $request->prod_cat;
    	$prod->prod_desc = $request->prod_desc;
    	$prod->prod_color = $request->prod_color;
    	$prod->prod_price = $request->prod_price;
    	$prod->prod_image_main = $originalname;

    	$prod->save();
    	
    	return redirect('/products')->with('status','success');
    }
    public function editPro ($id){
    	$cat = Category::all();
    	$data = Product::find($id);
    	return view('editProduct',compact('data','cat'));
    }
    public function updatePro($id,Request $request){
    	//dd($request->all());
    	$validate = request()->validate([
            'prod_name' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
            'prod_cat' => 'required',
            'prod_desc' => 'required',
            'prod_price' => 'required',
            'prod_img' => 'required|mimes:jpeg,jpg,png',
        ]);
       
        $image = $request->file('prod_img');
        $extension = $image->getClientOriginalExtension();
        $originalname = $image->getClientOriginalName();
        $path = $image->move('upload', $originalname);
        $imgsizes = $path->getSize();
        $mimetype = $image->getClientMimeType();
    	$prod = Product::find($id);

    	$prod->prod_name = $request->prod_name;
    	$prod->prod_category = $request->prod_cat;
    	$prod->prod_desc = $request->prod_desc;
    	$prod->prod_color = $request->prod_color;
    	$prod->prod_price = $request->prod_price;
    	$prod->prod_image_main = $originalname;

    	$prod->update();
    	
    	return redirect('/products')->with('status','success');
    }
    public function destroyProd ($id){
    	$prod = Product::find($id);
    	$prod->delete();
    	return redirect('/products')->with('status','success');
    }
    public function add_category (){
    	return view('add_category');
    }
    public function allCategories (){
    	$data = Category::all();
    	return view('categories',compact('data'));
    }
    public function editCat ($id){
    	$data = Category::find($id);
    	return view('editCategory',compact('data'));
    }
    public function destroyCat ($id){
    	$data = Category::find($id);
    	$data->delete();
    	return redirect('/categories');
    }
    public function updateCat ($id,Request $request){
    	$cat = Category::find($id);

    	$cat->cat_name = $request->cat_name;
    	$cat->update();
    	return redirect('/categories');
    }
    public function store_cat(Request $request)
    {
    	$str = 'CAT';
    	$rand_id = rand ( 1000 , 9999 );
    	$cat_id = $str.$rand_id;
    	//dd($cat_id);
    	$cat = new Category;

    	$cat->cat_name = $request->cat_name;
    	$cat->cat_id = $cat_id;
    	$cat->save();

    	return redirect('/categories')->with('status','success');

    }

    public function add_subcategory(){
        $data = Category::all();
        return view('addSubcat',compact('data'));
    }
    public function add_child_cat(){
        $data = SubCategory::all();
    
        return view('addChildCat',compact('data'));
    }
    public function store_subcat(Request $request){
        $str = 'SUBCAT';
        $rand_id = rand ( 1000 , 9999 );
        $cat_id = $str.$rand_id;
        //dd($cat_id);
        $cat = new SubCategory;

        $cat->sub_cat_name = $request->sub_cat_name;
        $cat->main_cat_id = $request->main_cat;
        $cat->sub_cat_id = $cat_id;
        $cat->save();

        return redirect('/categories')->with('status','success');
    }
    public function store_child_cat(Request $request){
        $str = 'CHCAT';
        $rand_id = rand ( 1000 , 9999 );
        $cat_id = $str.$rand_id;
        //dd($cat_id);
        $cat = new ChildCategory;

        $cat->child_cat_name = $request->child_cat_name;
        $cat->sub_cat_id = $request->sub_cat;
        $cat->child_cat_id = $cat_id;
        $cat->save();

        return redirect('/categories')->with('status','success');
    }
}
