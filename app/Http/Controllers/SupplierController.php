<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function supplierIndex()
    {
        $result = Supplier::simplePaginate(50);
        return view('dashboard.suppliers', ['items' => $result]);
    }

    public function addSupplierToDatabase(Request $req)
    {
        $req->validate([
            'name' => 'bail|required|max:255|min:3',
            'email' => 'bail|required|email',
            'phonenumber' => 'bail|required|min:10',
            'address' => 'bail|required',
        ]);
        date_default_timezone_set('Asia/Kathmandu');
        $myDate = date("YmdHis");
        $sname = preg_replace('/\s+/', '', $req->sname);
        $imageName = "supplier_" . $sname . "_" . $myDate . '.' . $req->image->extension();
        $req->image->move(public_path('images/suppliers/'), $imageName);

        $sup = new Supplier();
        $sup->sname = $req->name;
        $sup->semail = $req->email;
        $sup->sphone = $req->phonenumber;
        $sup->saddress = $req->address;
        $sup->simage = "images/suppliers/" . $imageName;
        if ($sup->save()) {
            $req->session()->flash("supplierSuccessFlashSession", "Added Successfully");
        } else {
            $req->session()->flash("supplierUnsuccessFlashSession", "Error While Adding");
        }

        return redirect("/home/suppliers");
    }

    public function deleteSupplierFromDatabase(Request $request)
    {
        $sup = Supplier::find($request->id);

        if ($sup->delete()) {
            $request->session()->flash("supplierSuccessFlashSession", "Deleted Successfully");
        } else {
            $request->session()->flash("supplierUnsuccessFlashSession", "Error While Deleting");
        }
        return redirect("/home/suppliers");
    }

    public function editSuppliers(Request $request)
    {
        $result = Supplier::find($request->id);
        return view('dashboard.editSuppliers', ['item' => $result]);
    }

    public function updateSuppliersToDatabase(Request $request)
    {

        $sup = Supplier::find($request->id);
        $sup->sname = $request->sname;
        $sup->semail = $request->semail;
        $sup->sphone = $request->sphone;
        $sup->saddress = $request->saddress;

        if ($request->simage) {
            date_default_timezone_set('Asia/Kathmandu');
            $myDate = date("YmdHis");
            $sname = preg_replace('/\s+/', '', $request->sname);
            $imageName = "supplier_" . $sname . "_" . $myDate . '.' . $request->simage->extension();
            $request->simage->move(public_path('images/suppliers/'), $imageName);
            $sup->simage = 'images/suppliers/' . $imageName;
        }
        if ($sup->update()) {
            $request->session()->flash("supplierSuccessFlashSession", "Updated Successfully");
        } else {
            $request->session()->flash("supplierUnsuccessFlashSession", "Error While Updating");
        }
        return redirect("/home/suppliers");
    }
}
