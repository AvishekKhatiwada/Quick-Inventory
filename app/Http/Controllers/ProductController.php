<?php

namespace App\Http\Controllers;

use App\Charts\ProductDepletionChart;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Supplier;

class ProductController extends Controller
{
    public function products()
    {
        $result = Product::simplePaginate(50);
        return view('dashboard.products', ['items' => $result]);
    }

    public function suppliers()
    {
        return view('dashboard.suppliers', ['items' => Supplier::all()]);
    }
    public function addProduct()
    {
        return view("dashboard.addProducts");
    }


    public function productOverview(ProductDepletionChart $pdChart, Request $request)
    {
        // $product = Product::find($request->productId);
        $result = DB::select("SELECT * FROM products inner join stocks on products.id = stocks.pid where products.id=$request->productId");
        $productInfo = DB::select("SELECT SUM(sales.quantity) as qty,SUM(sales.sellingprice) as sp,SUM(sales.costprice) as cp FROM sales where sales.pid=$request->productId");
        $pdChart->getProductId($request->productId);
        return view("dashboard.productOverview", ["product" => $result, "pdChart" => $pdChart->build(), "productBasicInfo" => $productInfo[0]]);
    }


    public function addProductDetailsToDatabase(Request $request)
    {
        $request->validate([
            'pname' => 'bail|required|max:255|min:3',
            'pcategory' => 'bail|required|min:3',
            'ptag' => 'bail|required|min:3',
            'soldper' => 'bail|required',
            'image' => 'bail|required',
        ]);
        date_default_timezone_set('Asia/Kathmandu');
        $myDate = date("YmdHis");
        $pname = preg_replace('/\s+/', '', $request->pname);
        $imageName = "product_" . $pname . "_" . $myDate . '.' . $request->image->extension();
        $request->image->move(public_path('images/products/'), $imageName);

        $prod = new Product();
        $prod->pname = $request->pname;
        $prod->pcategory = $request->pcategory;
        $prod->ptag = $request->ptag;
        $prod->pbrand = $request->pbrand;
        $prod->plength = $request->plength;
        $prod->pweight = $request->pweight;
        $prod->pcolor = $request->pcolor;
        $prod->psize = $request->psize;
        $prod->soldper = $request->soldper;
        $prod->image = "images/products/" . $imageName;
        $prod->save();
        // $prod->id;       -> for getting the last insert id

        // $totalLots = Stock::where("pid", "=", $request->productId)->get()->count();

        $stock = new Stock();
        $stock->pid = $prod->id;
        $stock->lot = $request->lot;
        $stock->quantity = $request->quantity;
        $stock->costprice = $request->costprice;
        $stock->warningquantity = $request->warningquantity;
        if ($stock->save()) {
            $request->session()->flash("productSuccessFlashSession", "Added Successfully");
        } else {
            $request->session()->flash("productUnsuccessFlashSession", "Error While Adding");
        }
        return redirect("/home/products");

        // return $request;
    }

    public function editProduct(Request $request)
    {
        // return $request->id;
        $result = Product::find($request->id);
        return view('dashboard.editProducts', ['item' => $result]);
    }

    public function updateProductDetailsToDatabase(Request $request)
    {
        $request->validate([
            'pname' => 'bail|required|max:255|min:3',
            'pcategory' => 'bail|required|min:3',
            'ptag' => 'bail|required|min:3',
            'soldper' => 'bail|required',
        ]);
        $prod = Product::find($request->id);

        date_default_timezone_set('Asia/Kathmandu');
        if ($request->image) {
            $myDate = date("YmdHis");
            $pname = preg_replace('/\s+/', '', $request->pname);
            $imageName = "product_" . $pname . "_" . $myDate . '.' . $request->image->extension();
            $request->image->move(public_path('images/products/'), $imageName);
            $prod->image = "images/products/" . $imageName;
        }

        $prod->pname = $request->pname;
        $prod->pcategory = $request->pcategory;
        $prod->ptag = $request->ptag;
        $prod->pbrand = $request->pbrand;
        $prod->plength = $request->plength;
        $prod->pweight = $request->pweight;
        $prod->pcolor = $request->pcolor;
        $prod->psize = $request->psize;
        $prod->soldper = $request->soldper;
        if ($prod->update()) {
            $request->session()->flash("productSuccessFlashSession", "Updated Successfully");
        } else {
            $request->session()->flash("productUnsuccessFlashSession", "Error While Updating");
        }
        return redirect("/home/products");
    }

    public function deleteProduct(Request $request)
    {
        $prod = Product::find($request->id);
        $stocRes = Stock::where("pid", "=", $request->id)->get();
        $salesRes = Sale::where("pid", "=", $request->id)->get();
        foreach ($stocRes as $deleteItems) {
            $deleteItems->delete();
        }
        foreach ($salesRes as $deleteItems) {
            $deleteItems->delete();
        }

        if ($prod->delete()) {
            $request->session()->flash("productSuccessFlashSession", "Deleted Successfully");
        } else {
            $request->session()->flash("productUnsuccessFlashSession", "Error While Deleting");
        }
        return redirect("/home/products");
        // return $stocRes;
    }
}
