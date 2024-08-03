<?php

use Barryvdh\DomPDF\Facade\Pdf; // Ensure correct import
use Illuminate\Support\Facades\Route;
use Modules\Purchase\Entities\Purchase;
use Modules\People\Entities\Supplier;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'], function () {

    //Generate PDF
    Route::get('/purchases/pdf/{id}', function ($id) {
        try {
            // Retrieve the purchase and supplier using their IDs
            $purchase = Purchase::findOrFail($id);
            $supplier = Supplier::findOrFail($purchase->supplier_id);

            // Load the PDF view and set paper size
            $pdf = Pdf::loadView('purchase::print', [
                'purchase' => $purchase,
                'supplier' => $supplier,
            ])->setPaper('a4');

            // Return the generated PDF as a stream
            return $pdf->stream('purchase-' . $purchase->reference . '.pdf');
        } catch (\Exception $e) {
            // Handle exceptions and return a JSON error response
            return response()->json(['error' => $e->getMessage()], 500);
        }
    })->name('purchases.pdf');

    //Sales
    Route::resource('purchases', 'PurchaseController');

    //Payments
    Route::get('/purchase-payments/{purchase_id}', 'PurchasePaymentsController@index')->name('purchase-payments.index');
    Route::get('/purchase-payments/{purchase_id}/create', 'PurchasePaymentsController@create')->name('purchase-payments.create');
    Route::post('/purchase-payments/store', 'PurchasePaymentsController@store')->name('purchase-payments.store');
    Route::get('/purchase-payments/{purchase_id}/edit/{purchasePayment}', 'PurchasePaymentsController@edit')->name('purchase-payments.edit');
    Route::patch('/purchase-payments/update/{purchasePayment}', 'PurchasePaymentsController@update')->name('purchase-payments.update');
    Route::delete('/purchase-payments/destroy/{purchasePayment}', 'PurchasePaymentsController@destroy')->name('purchase-payments.destroy');
});
