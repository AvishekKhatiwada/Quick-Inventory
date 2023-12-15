<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserContorller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SupplierController;


Route::get('/', [UserContorller::class, "landing"]);
Route::post("loginCheck", [UserContorller::class, "loginCheck"]);


Route::group(["middleware" => "preventedPages"], function () {

    // GET routes
    Route::get('/home', [UserContorller::class, "home"])->name("home");
    Route::get('/home/logout', [UserContorller::class, "logout"])->name("logout");

    Route::get("/home/products", [ProductController::class, "products"])->name("productsList");
    Route::get("/home/products/addProduct", [ProductController::class, "addProduct"]);
    Route::get("/home/products/editProduct/{id}", [ProductController::class, "editProduct"]);


    Route::get("/home/stocks", [StockController::class, "stocks"]);

    Route::get("/home/suppliers", [SupplierController::class, "supplierIndex"]);
    Route::get("/home/supplier/editSuppliers/{id}", [SupplierController::class, "editSuppliers"]);

    Route::get("/home/transactions", [StockController::class, "transactions"]);

    Route::get("/home/alerts", [AlertController::class, "alerts"])->name("alerts");
    Route::get("/home/alerts/order", [AlertController::class, "order"])->name("order");

    Route::get("/home/settings", [UserContorller::class, "settings"])->name("settings");

    Route::get("/home/report", [ReportController::class, "index"]);
    Route::get("/home/report/todaysReport/{type}", [ReportController::class, "todaysReport"]);
    Route::get("/home/report/weeklyReport/{type}", [ReportController::class, "weeklyReport"]);
    Route::get("/home/report/totalReport/{type}", [ReportController::class, "totalReport"]);


    // POST routes
    Route::post("/home/productOverview", [ProductController::class, "productOverview"])->name("overview");

    Route::post("/addProductDetailsToDatabase", [ProductController::class, "addProductDetailsToDatabase"]);
    Route::post("/updateProductDetailsToDatabase", [ProductController::class, "updateProductDetailsToDatabase"]);
    Route::post("/deleteProductFromDatabase", [ProductController::class, "deleteProduct"]);

    Route::post("/addProductStockToDatabase", [StockController::class, "addProductStockToDatabase"]);

    Route::post("/addSuppliersToDatabase", [SupplierController::class, "addSupplierToDatabase"]);
    Route::post("/deleteSupplierFormDatabase", [SupplierController::class, "deleteSupplierFromDatabase"]);
    Route::post("/updateSuppliersToDatabase", [SupplierController::class, "updateSuppliersToDatabase"]);


    Route::post("/editProductLot1", [StockController::class, "editProductLot1"]);
    Route::post("/editProductLot2", [StockController::class, "editProductLot2"]);

    Route::post("/deleteStock", [StockController::class, "deleteStock"]);
    Route::post("/l2stockIdToDelete", [StockController::class, "l2stockIdToDelete"]);

    Route::post("/sellStock", [StockController::class, "sellStock"]);

    Route::post("/updateUserProfile", [UserContorller::class, "updateUserProfile"]);

    Route::post("/resolved", [AlertController::class, "resolved"]);
});
