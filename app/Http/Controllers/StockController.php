<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function stocks()
    {
        $result = Product::simplePaginate(10);
        $stockResult = Stock::all()->groupBy("pid");
        return view("dashboard.stocks", ["items" => $result, "stocks" => $stockResult]);
        // echo $stockResult;
    }

    public function addProductStockToDatabase(Request $request)
    {
        $request->validate([
            'lot' => 'bail|required|min:1|max:10',
            'quantity' => 'bail|required|min:1|max:10',
            'costprice' => 'bail|required|min:1|max:10',
            'warningquantity' => 'bail|required|min:1|max:10',
        ]);
        $totalLots = Stock::where("pid", "=", $request->productId)->get()->count();
        if ($totalLots < 2) {
            $stock = new Stock();
            $stock->pid = $request->productId;
            $stock->lot = $request->lot;
            $stock->quantity = $request->quantity;
            $stock->costprice = $request->costprice;
            $stock->warningquantity = $request->warningquantity;
            $stock->save();
            $request->session()->flash("Successfull", "Stock Added");
        } else {
            // echo "<script>console.log('not added')</script>";
            $request->session()->flash("Failed", "Only 2 Lots Allowded");
        }
        return redirect("/home/stocks");
    }

    public function editProductLot1(Request $request)
    {
        $request->validate([
            'l1lot' => 'bail|required|min:1|max:10',
            'l1quantity' => 'bail|required|min:1|max:10',
            'l1costprice' => 'bail|required|min:1|max:10',
            'l1warningquantity' => 'bail|required|min:1|max:10',
        ]);
        $stock = Stock::find($request->l1stockId);
        $stock->lot = $request->l1lot;
        $stock->quantity = $request->l1quantity;
        $stock->costprice = $request->l1costprice;
        $stock->warningquantity = $request->l1warningquantity;
        if ($stock->update()) {
            $request->session()->flash("Successfull", "Stock Updated");
        } else {
            $request->session()->flash("Failed", "Stock Update Failed");
        }
        return redirect("/home/stocks");
    }

    public function editProductLot2(Request $request)
    {
        $request->validate([
            'l2lot' => 'bail|required|min:1|max:10',
            'l2quantity' => 'bail|required|min:1|max:10',
            'l2costprice' => 'bail|required|min:1|max:10',
            'l2warningquantity' => 'bail|required|min:1|max:10',
        ]);
        $stock = Stock::find($request->l2stockId);
        $stock->lot = $request->l2lot;
        $stock->quantity = $request->l2quantity;
        $stock->costprice = $request->l2costprice;
        $stock->warningquantity = $request->l2warningquantity;
        if ($stock->update()) {
            $request->session()->flash("Successfull", "Stock Updated");
        } else {
            $request->session()->flash("Failed", "Stock Update Failed");
        }
        return redirect("/home/stocks");
    }

    public function deleteStock(Request $request)
    {
        if ($request->l1stockIdToDelete) {
            $stock = Stock::find($request->l1stockIdToDelete);
            if ($stock->delete()) {
                $request->session()->flash("Successfull", "Stock Deleted");
            } else {
                $request->session()->flash("Failed", "Stock Delete Failed");
            }
        }
        if ($request->l2stockIdToDelete) {
            $stock = Stock::find($request->l2stockIdToDelete);
            if ($stock->delete()) {
                $request->session()->flash("Successfull", "Stock Deleted");
            } else {
                $request->session()->flash("Failed", "Stock Delete Failed");
            }
        }
        return redirect("/home/stocks");
    }

    public function sellStock(Request $request)
    {
        $getStock = Stock::find($request->stockId);

        $getStock->quantity = $request->remainingQuantity;
        $soldItem = new Sale();
        $soldItem->pid = $getStock->pid;
        $soldItem->quantity = $request->stockNumberInput;
        $soldItem->sellingprice = $request->totalSalesAmount;
        $soldItem->costprice = $request->totalCostAmount;
        $soldItem->remarks = $request->remarks;
        $soldItem->salesdate = date("Ymd");
        if (
            $getStock->update() &&
            $soldItem->save()
        ) {
            $request->session()->flash("Successfull", "Stock Sold");
        } else {
            $request->session()->flash("Failed", "Stock Sales Failed");
        }

        if ($request->lowStock == "yes") {
        }
        return redirect("/home/stocks");
    }

    public function transactions(Request $request)
    {
        $result = DB::table("sales")->join("products", "products.id", "=", "sales.pid")->orderBy("salesdate", "desc")->orderBy("sales.id", "desc")->simplePaginate(50);
        return view("dashboard.transactions", ["records" => $result]);
    }
}
