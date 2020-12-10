<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\brand;
use App\Models\category;
use App\Models\product;
use App\Models\ProductTranslation;
use App\Models\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    var $route = 'product';
    var $pagename = 'PRODUCT';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = product::where('status', '!=', '2')->paginate(5);
        $data = [
            'list' => $list,
            'pagename' => $this->pagename,
            'route' => $this->route
        ];
        return view('backend.product.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = [
            'pagename' => $this->pagename,
            'route' => $this->route,
            'title' => 'ADD',
            'action' => route('product.store'),
            'method' => 'POST',
            'category' => category::where('status', 1)->get(),
            'supplier' => supplier::where('status', 1)->get(),
            'brand' => brand::where('status', 1)->get()
        ];
        return view('backend.product.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fimg' => ['required', 'min:5', 'max:255'],
            'nameProduct' => ['required', 'min:5', 'max:255'],
            'categoryID' => ['required', 'numeric'],
            'supplierID' => ['required', 'numeric'],
            'brandID' => ['required', 'numeric']
        ], [
            'fimg.required' => 'ProductIMG cannot be left blank',
            'fimg.min' => 'IMG From 5 to 255 char',
            'fimg.max' =>  'IMG From 5 to 255 char',
            'nameProduct.min' =>  'ProductName From 5 to 255 char',
            'nameProduct.max' =>  'ProductName From 5 to 255 char',
            'nameProduct.required' => 'ProductName cannot be left blank',
            'categoryID.required' => 'Please choose category',
            'categoryID.numeric' => 'Category isnt ',
            'supplierID.required' => 'Please choose supplier',
            'supplierID.numeric' => 'Supplier isnt ',
            'brandID.required' => 'Please choose brand',
            'brandID.numeric' => 'Brand isnt ',
        ]);

        // Product::insert([
        //     'typeProduct' => $request->typeProduct,
        //     'img' => $request->fimg,
        //     'categoryID' => $request->categoryID,
        //     'supplierID' => $request->supplierID,
        //     'brandID' => $request->brandID,
        //     'product_name' => $request->nameProduct,
        //     'nameUrl' => $request->nameUrl,
        //     'quantity' => $request->soluong,
        //     'sale' => $request->giagiam,
        //     'price' => $request->gia,
        //     'product_describe' => $request->mota,
        //     'detail' => $request->chitiet,
        //     'status' => $request->status,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        //dd($request->all());
        $product = Product::create();
        $product->typeProduct = $request->typeProduct;
        $product->img = $request->fimg;
        $product->categoryID = $request->categoryID;
        $product->supplierID = $request->supplierID;
        $product->brandID = $request->brandID;
        $product->nameUrl = $request->nameUrl;
        $product->quantity = $request->soluong;
        $product->sale = $request->giagiam;
        $product->price = $request->gia;
        $product->status = $request->status;
        $product->created_at = now();
        $product->updated_at = now();
        $product->save();

        ProductTranslation::insert([
            'product_id' => $product->id,
            'locale' => \App::getLocale(),
            'product_name' => $request->nameProduct,
            'product_describe' => $request->mota,
            'product_detail' => $request->chitiet,

        ]);
        return redirect()->route('product.index')->with(['msg' => 'You have added the product successfully', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = product::where('id', $id)->where('status', '!=', 2)->first();
        // dd($item);
        if (!$item)
            return redirect()->route('product.index')->with(['msg' => 'Không tìm thấy sản phẩm', 'status' => 'danger']);
        $data = [
            'pagename' => $this->pagename,
            'route' => $this->route,
            'title' => 'UPDATE',
            'action' => route('product.update', $id),
            'method' => 'PUT',
            'category' => category::where('status', 1)->get(),
            'supplier' => supplier::where('status', 1)->get(),
            'brand' => brand::where('status', 1)->get(),
            'item' => $item
        ];
        // dd($data);
        return view('backend.product.form', $data);
        // echo 'dang o edit';
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
        $item = Product::where('id', $id)->where('status', '!=', 2)->first();
        if (!$item)
            return redirect()->route('product.index')->with(['msg' => 'Không tìm thấy sản phẩm', 'status' => 'danger']);
        $request->validate([
            'fimg' => ['required', 'min:5', 'max:255'],
            'nameProduct' => ['required', 'min:5', 'max:255'],
            'categoryID' => ['required', 'numeric'],
            'supplierID' => ['required', 'numeric'],
            'brandID' => ['required', 'numeric']
        ], [
            'fimg.required' => 'ProductIMG cannot be left blank',
            'fimg.min' => 'IMG From 5 to 255 char',
            'fimg.max' =>  'IMG From 5 to 255 char',
            'nameProduct.min' =>  'ProductName From 5 to 255 char',
            'nameProduct.max' =>  'ProductName From 5 to 255 char',
            'nameProduct.required' => 'ProductName cannot be left blank',
            'categoryID.required' => 'Please choose category',
            'categoryID.numeric' => 'Category isnt ',
            'supplierID.required' => 'Please choose supplier',
            'supplierID.numeric' => 'Supplier isnt ',
            'brandID.required' => 'Please choose brand',
            'brandID.numeric' => 'Brand isnt ',
        ]);
        Product::where('id', $id)->update([
            'typeProduct' => $request->typeProduct,
            'img' => $request->fimg,
            'categoryID' => $request->categoryID,
            'supplierID' => $request->supplierID,
            'brandID' => $request->brandID,
            'nameUrl' => $request->nameUrl,
            'quantity' => $request->soluong,
            'sale' => $request->giagiam,
            'price' => $request->gia,
            'status' => $request->status,
        ]);

        ProductTranslation::where('product_id', $id)->where('locale', \App::getLocale())->update([
            'product_name' => $request->nameProduct,
            'product_describe' => $request->mota,
            'product_detail' => $request->chitiet,
        ]);


        return redirect()->back()->with(['msg' => 'You have updated the product successfully', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        product::where('id',$id)->update([
            'status'=>2
        ]);
        $data = [
            'msg' => 'Product is deleted',
            'status' => 'success',
            'result' => "Redirect",
            'url' => 'http://localhost:8000/admin/product'
        ];
        return response()->json($data, 200);
    }
}
