<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use App\Charts\MonthlyUsersChart;
use App\Charts\MostylySoldProduct;
use Illuminate\Support\Facades\File;
use App\Models\Sale;

class UserContorller extends Controller
{
    public function landing()
    {
        $user = User::where(['id' => 1])->first();
        if (Cookie::get("User") == $user->uhashcheck) {
            session()->put("User", $user);
            return redirect("/home");
        } else {
            return View("welcome");
        }
    }

    public function setCookieData()
    {
        $hashcheck = Hash::make(Str::random(15));
        return $hashcheck;
    }

    public function loginCheck(Request $req)
    {

        $user = User::where(['uemail' => $req->email])->first();
        if ($req->email == $user->uemail && Hash::check($req->password, $user->upassword)) {
            if ($req->remember == "on") {
                $req->session()->put("User", $user);
                $hashcheck = UserContorller::setCookieData();
                $user->uhashcheck = $hashcheck;
                $user->save();
                Cookie::queue("User", $hashcheck, 2880);
                return redirect("/home");
            } else {
                $req->session()->put("User", $user);
                return redirect("/home");
            }
        } else {
            $req->session()->flash("LoginUnsuccessfull", "Invalid username or password");
            return redirect("/");
        }
    }


    public function home(MonthlyUsersChart $chart, MostylySoldProduct $mspChart)
    {
        $result = DB::select('SELECT SUM(sellingprice) AS sp,SUM(costprice) AS cp,salesdate FROM `sales` GROUP BY salesdate ORDER BY salesdate Asc LIMIT 7');
        $totalSale = 0;
        $totalCost = 0;
        $totalProfit = 0;
        $profitPercentage = [];
        $count = 0;
        foreach ($result as $salesPerDay) {
            $totalSale += $salesPerDay->sp;
            $totalCost += $salesPerDay->cp;
            $totalProfit += ($salesPerDay->sp - $salesPerDay->cp);
            $profitPercentage[$count] = ($salesPerDay->cp / $salesPerDay->sp) * 100;
            $count++;
        }
        $salesRecord = DB::select('SELECT * FROM `sales` ORDER BY salesdate Desc, id Desc LIMIT 8');
        $todaysDate = date("Ymd");
        $todaysRecord = DB::select("SELECT  SUM(sellingprice) AS sp,SUM(costprice) AS cp FROM `sales` WHERE salesdate='$todaysDate'");
        $productList =  DB::select('SELECT * FROM `products`');

        $mostSoldItem =  DB::select("SELECT products.id,products.pname,products.image,products.soldper,SUM(sales.quantity) AS sold from sales INNER JOIN products on sales.pid=products.id GROUP BY sales.pid ORDER BY sold DESC LIMIT 1");
        $leastSoldItem = DB::select("SELECT products.id,products.pname,products.image,products.soldper,SUM(sales.quantity) AS sold from sales INNER JOIN products on sales.pid=products.id GROUP BY sales.pid ORDER BY sold ASC LIMIT 1");
        $mostProfitableItem = DB::select("SELECT pid,products.pname,products.image,SUM(sales.sellingprice) as sp, SUM(sales.costprice) as cp FROM sales INNER JOIN products on sales.pid=products.id GROUP BY sales.pid order by sellingprice desc,costprice asc LIMIT 1");
        $leastProfitableItem = DB::select("SELECT pid,products.pname,products.image,SUM(sales.sellingprice) as sp, SUM(sales.costprice) as cp FROM sales INNER JOIN products on sales.pid=products.id GROUP BY sales.pid order by sellingprice asc,costprice desc LIMIT 1");

        return view("dashboard.home", ['chart' => $chart->build(), 'mspChart' => $mspChart->build(), "saleInSevenDays" => $totalSale, "costInSevenDays" => $totalCost, "profitInSevenDays" => $totalProfit, "salesRecord" => $salesRecord, "todaysRecord" => $todaysRecord, "productList" => $productList, "mostSoldItem" => $mostSoldItem[0], "leastSoldItem" => $leastSoldItem[0], "mostProfitableItem" => $mostProfitableItem[0], "leastProfitableItem" => $leastProfitableItem[0]]);
    }


    public function settings()
    {
        return view("dashboard.setting");
    }

    public function updateUserProfile(Request $request)
    {
        $requestPasswordChange = false;
        $isPasswordChanged = false;
        $request->validate([
            'unameInput' => 'bail|required',
            'uemailInput' => 'bail|required',
            'uphoneInput' => 'bail|required',
            'uaddressInput' => 'bail|required'
        ]);
        $userObj = User::find(1);
        $userObj->uname = $request->unameInput;
        $userObj->uemail = $request->uemailInput;
        $userObj->uphone = $request->uphoneInput;
        $userObj->uaddress = $request->uaddressInput;
        if ($request->newProfilePicture) {
            $imageName = "user_" . $request->uemailInput . "." . $request->newProfilePicture->extension();
            $request->newProfilePicture->move(public_path('images/user/'), $imageName);
            $userObj->uimage = "images/user/" . $imageName;
        }
        $oldPassword = $request->uoldpasswordInput;
        $newPassword = $request->unewpasswordInput;
        $confirmPassword = $request->uconfirmpasswordInput;
        if ($oldPassword && $newPassword && $confirmPassword) {
            $requestPasswordChange = true;
            $request->validate([
                "uoldpasswordInput" => "required|string|min:8|max:10",
                "unewpasswordInput" => "required|string|min:8|max:10",
                "uconfirmpasswordInput" => "required|string|min:8|max:10"
            ]);
            if (Hash::check($oldPassword, session()->get('User')->upassword) && $newPassword == $confirmPassword && $oldPassword != $newPassword) {
                $userObj->upassword = Hash::make($newPassword);
                $isPasswordChanged = true;
            }
        }
        if ($userObj->update()) {
            if ($request->newProfilePicture) {
                File::delete(public_path(session()->get("User")->uimage));
            }
            session()->pull("User");
            $request->session()->put("User", $userObj);
            if ($requestPasswordChange && $isPasswordChanged) {
                $request->session()->flash("updateSuccessfull", "Profile and Password updated");
            } elseif ($requestPasswordChange && !$isPasswordChanged) {
                $request->session()->flash("updateUnsuccessfull", "Password Update Failed");
            } else {
                $request->session()->flash("updateSuccessfull", "Profile updated");
            }
        } else {
            $request->session()->flash("updateUnsuccessfull", "Update Failed");
        }
        return redirect("/home/settings");
    }


    public function logout()
    {
        session()->pull("User");
        // Cookie::forget("User");
        return redirect("/")->withCookie(Cookie::forget('User'));
    }
}
