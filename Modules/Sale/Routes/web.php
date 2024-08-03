<?php

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use Modules\Sale\Entities\Sale;
use Modules\People\Entities\Customer;

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

    //POS
    Route::get('/app/pos', 'PosController@index')->name('app.pos.index');
    Route::post('/app/pos', 'PosController@store')->name('app.pos.store');

    //Generate PDF
    // Route::get('/sales/pdf/{id}', function ($id) {
    //     $sale = \Modules\Sale\Entities\Sale::findOrFail($id);
    //     $customer = \Modules\People\Entities\Customer::findOrFail($sale->customer_id);

    //     $pdf = Pdf::loadView('sale::print', [
    //         'sale' => $sale,
    //         'customer' => $customer,
    //     ])->setPaper('a4');

    //     return $pdf->stream('sale-'. $sale->reference .'.pdf');
    // })->name('sales.pdf');

    // Route::get('/sales/pos/pdf/{id}', function ($id) {
    //     $sale = \Modules\Sale\Entities\Sale::findOrFail($id);

    //     $pdf = Pdf::loadView('sale::print-pos', [
    //         'sale' => $sale,
    //     ])->setPaper('a7')
    //         ->setOption('margin-top', 8)
    //         ->setOption('margin-bottom', 8)
    //         ->setOption('margin-left', 5)
    //         ->setOption('margin-right', 5);

    //     return $pdf->stream('sale-'. $sale->reference .'.pdf');
    // })->name('sales.pos.pdf');

    Route::get('/sales/pdf/{id}', function ($id) {
        try {
            $sale = Sale::findOrFail($id);
            $customer = Customer::findOrFail($sale->customer_id);

            $pdf = Pdf::loadView('sale::print', [
                'sale' => $sale,
                'customer' => $customer,
            ])->setPaper('a4');

            return $pdf->stream('sale-' . $sale->reference . '.pdf');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    })->name('sales.pdf');

    Route::get('/sales/pos/pdf/{id}', function ($id) {
        try {
            $sale = Sale::findOrFail($id);

            $pdf = Pdf::loadView('sale::print-pos', [
                'sale' => $sale,
            ])->setPaper('a6')
                ->setOption('margin-top', 8)
                ->setOption('margin-bottom', 8)
                ->setOption('margin-left', 5)
                ->setOption('margin-right', 5);

            return $pdf->stream('sale-' . $sale->reference . '.pdf');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    })->name('sales.pos.pdf');

    //Sales
    Route::resource('sales', 'SaleController');

    //Payments
    Route::get('/sale-payments/{sale_id}', 'SalePaymentsController@index')->name('sale-payments.index');
    Route::get('/sale-payments/{sale_id}/create', 'SalePaymentsController@create')->name('sale-payments.create');
    Route::post('/sale-payments/store', 'SalePaymentsController@store')->name('sale-payments.store');
    Route::get('/sale-payments/{sale_id}/edit/{salePayment}', 'SalePaymentsController@edit')->name('sale-payments.edit');
    Route::patch('/sale-payments/update/{salePayment}', 'SalePaymentsController@update')->name('sale-payments.update');
    Route::delete('/sale-payments/destroy/{salePayment}', 'SalePaymentsController@destroy')->name('sale-payments.destroy');
});
