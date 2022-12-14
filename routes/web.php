<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('/HalamanUtama/index');
});


// produk 
Route::get('/produk', 'ProdukController@index');
Route::get('/produk/tambah', 'ProdukController@create');
Route::post('/produk', 'ProdukController@store');
Route::delete('/produk/{produk}', 'ProdukController@destroy');
Route::get('/produk/{produk}/edit', 'ProdukController@edit');
Route::patch('/produk/{produk}', 'ProdukController@update');


// sales
Route::get('/sales', 'SalesController@index');
Route::get('/sales/tambah', 'SalesController@create');
Route::post('/sales', 'SalesController@store');
Route::delete('/sales/{sales}', 'SalesController@destroy');
Route::get('/sales/{sales}/edit', 'SalesController@edit');
Route::patch('/sales/{sales}', 'SalesController@update');

// bahan
Route::get('/bahan', 'BahanController@index');
Route::get('/bahan/tambah', 'BahanController@create');
Route::post('/bahan', 'BahanController@store');
Route::delete('/bahan/{bahan}', 'BahanController@destroy');
Route::get('/bahan/{bahan}/edit', 'BahanController@edit');
Route::patch('/bahan/{bahan}', 'BahanController@update');

// inventory
Route::get('/inventory', 'InventoryController@index');
Route::get('/inventory/tambah', 'InventoryController@create');
Route::post('/inventory', 'InventoryController@store');
Route::delete('/inventory/{inventory}', 'InventoryController@destroy');
Route::get('/inventory/{inventory}/edit', 'InventoryController@edit');
Route::patch('/inventory/{inventory}', 'InventoryController@update');

// produksi
Route::get('/produksi', 'produksiController@index');
Route::get('/produksi/tambah', 'produksiController@create');
Route::post('/produksi', 'produksiController@store');
Route::delete('/produksi/{produksi}', 'produksiController@destroy');
Route::get('/produksi/{produksi}/edit', 'produksiController@edit');
Route::patch('/produksi/{produksi}', 'produksiController@update');

// BoM
Route::get('/bom', 'BoMController@index');
Route::get('/bom/tambah', 'BoMController@create');
Route::post('/bom', 'BoMController@store');
Route::delete('/bom/{bom}', 'BoMController@destroy');
Route::get('/bom/{bom}/edit', 'BoMController@edit');
Route::patch('/bom/{bom}', 'BoMController@update');

// cek bahan
Route::get('/cekBahan/{cekBahan}', 'cekBahanController@cek');

// ubah status ke mark as todo
Route::get('/markastodo/{markastodo}', 'UbahStatusController@cek');

// tambah bahan ke inventory
Route::get('/Pesan/{id_material}', 'BoMController@ubahStatusPesan');
Route::get('/tambahBahanInventory/{id_material}', 'BoMController@tambahkeInventory');

// Proses Pesanan
Route::get('/prosespesanan/{id_produksi}', 'prosesPesananController@proses');
Route::get('/tambahBahanInventory/{id_produksi}', 'prosesPesananController@tambahkeInventory');

// selesaikan pesanan
Route::get('/selesai/{id_produksi}', 'prosesPesananController@selesai');


// Halaman vendor
Route::get('/vendor', 'vendorController@index');
Route::get('/vendor/tambah', 'vendorController@create');
Route::post('/vendor', 'vendorController@store');
Route::delete('/vendor/{vendor}', 'vendorController@destroy');
Route::get('/vendor/{vendor}/edit', 'vendorController@edit');
Route::patch('/vendor/{vendor}', 'vendorController@update');


// Halaman RFQ
Route::get('/rfq', 'RFQController@index');
Route::get('/rfq/tambah', 'RFQController@create');
Route::post('/rfq', 'RFQController@store');
Route::delete('/rfq/{rfq}', 'RFQController@destroy');
Route::get('/rfq/{rfq}/edit', 'RFQController@edit');
Route::patch('/rfq/{rfq}', 'RFQController@update');

// Halaman PO
Route::get('/po', 'POController@index');
Route::get('/po/tambah', 'POController@create');
Route::post('/po', 'POController@store');
Route::delete('/po/{po}', 'POController@destroy');
Route::get('/po/{po}/edit', 'POController@edit');
Route::patch('/po/{po}', 'POController@update');
Route::get('po/filter/', 'POController@filter');
Route::get('po/proses/', 'POController@proses');


// confirm rfq
Route::get('rfq/confirm/{rfq}', 'RFQController@confirm');
Route::get('rfq/filter/', 'RFQController@filter');

// Manufakturing Order
Route::get('/manufakturingorder', 'ManufakturingOrderController@index');
Route::get('/manufakturingorder/tambah', 'ManufakturingOrderController@create');
Route::post('/manufakturingorder', 'ManufakturingOrderController@store');
Route::delete('/manufakturingorder/{manufakturingorder}', 'ManufakturingOrderController@destroy');
Route::get('/manufakturingorder/{manufakturingorder}/edit', 'ManufakturingOrderController@edit');
Route::patch('/manufakturingorder/{manufakturingorder}', 'ManufakturingOrderController@update');


// costumer
Route::get('/customer', 'CustomerController@index');
Route::get('/customer/tambah', 'CustomerController@create');
Route::post('/customer', 'CustomerController@store');
Route::delete('/customer/{customer}', 'CustomerController@destroy');
Route::get('/customer/{customer}/edit', 'CustomerController@edit');
Route::patch('/customer/{customer}', 'CustomerController@update');

// quotation
Route::get('/quotation', 'quotationController@index');
Route::get('/quotation/tambah', 'quotationController@create');
Route::post('/quotation', 'quotationController@store');
Route::delete('/quotation/{quotation}', 'quotationController@destroy');
Route::get('/quotation/{quotation}/edit', 'quotationController@edit');
Route::get('/quotation/{quotation}/confirm', 'quotationController@confirm');
Route::patch('/quotation/{quotation}', 'quotationController@update');

// invoicing
Route::get('/invoicing', 'invoicingController@index');
Route::get('/invoicing/tambah', 'invoicingController@create');
Route::post('/invoicing', 'invoicingController@store');
Route::delete('/invoicing/{invoicing}', 'invoicingController@destroy');
Route::get('/invoicing/{invoicing}/edit', 'invoicingController@edit');
Route::patch('/invoicing/{invoicing}', 'invoicingController@update');

// sales order
Route::get('/sales_order', 'SalesOrderController@index');
Route::get('/sales_order/tambah', 'SalesOrderController@create');
Route::post('/sales_order', 'SalesOrderController@store');
Route::delete('/sales_order/{sales_order}', 'SalesOrderController@destroy');
Route::get('/sales_order/{sales_order}/edit', 'SalesOrderController@edit');
Route::patch('/sales_order/{sales_order}', 'SalesOrderController@update');

// Route::get('/produksi', 'produksiController@index');
// Route::get('/produksi/tambah', 'produksiController@create');
// Route::post('/produksi', 'produksiController@store');
// Route::delete('/produksi/{produksi}', 'produksiController@destroy');
// Route::patch('/produksi/{produksi}', 'produksiController@update');