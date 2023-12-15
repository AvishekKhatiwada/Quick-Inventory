<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Alert;

class AlertController extends Controller
{
    public function alerts()
    {
        $sql = DB::select("SELECT * FROM stocks INNER JOIN products ON stocks.pid = products.id");
        $suppliers = DB::select("SELECT sname FROM suppliers");
        $result = [];
        for ($i = 0; $i < count($sql); $i++) {
            if ($sql[$i]->quantity <= $sql[$i]->warningquantity) {
                $result[$i] = $sql[$i];
            }
        }
        return view("dashboard.alerts", ["result" => $result, "suppliers" => $suppliers]);
    }

    public function order(Request $request)
    {
        $request->session()->flash("Ordered", "The product is ordered");
        return redirect("/home/alerts");
    }
}
