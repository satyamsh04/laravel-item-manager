<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * Home page - list all items
 */
Route::get('/', function(){
    $sql = "select * from item";
    $items = DB::select($sql);
    return view('items.item_list')->with('items', $items);
});

/**
 * Item details page for an item
 */
Route::get('item_detail/{id}', function($id){
    $item = get_item($id);
    return view('items.item_detail')->with('item', $item);
    // dd($item);
});

/**
 * The page for adding (create) an item
 */
Route::get('add_item', function(){
    return view("items.add_item");
});


/**
 * The page for update item.
 */
Route::get('item_update/{id}', function($id){
    $item = get_item($id);
    return view('items.update_item')->with('item', $item);
});

/**
 * Handles create item requests
 */
Route::post('add_item_action', function(){
    $summary = request('summary');
    $details = request('details');
    $id = add_item($summary, $details);
    if ($id){
        return redirect(url("item_detail/$id"));
    } else {
        die("Error while adding item.");
    }
});

/**
 * Handles update item requests
 */
Route::post('update_item_action', function(){
    $id = request('id');
    $summary = request('summary');
    $details = request('details');
    update_item($id, $summary, $details);
    return redirect(url("item_detail/$id"));
});


/**
 * Handles delete item requsts
 */
Route::get('item_delete/{id}', function($id){
    delete_item($id);
    return redirect(url("/"));
});

//---------- Helper functions ----------------
/**
 * Helper function that adds an item
 * $summary : string
 * $details : string
 * Returns the id of the newly created item
 */
function add_item($summary, $details){
    $sql = "insert into item (summary, details) values (?, ?)";
    DB::insert($sql, array($summary, $details));
    $id = DB::getPdo()->lastInsertId();
    return($id);
}

/**
 * Helper function for updating an item
 * $id : int
 * $summary : string
 * $details : string
 */
function update_item($id, $summary, $details){
    $sql = "update item set summary = ?, details = ? where id = ?";
    DB::update($sql , array($summary, $details, $id));
}

/**
 * Retrives an item given the item id
 * $id : int
 * Returns the item
 */
function get_item($id){
    $sql = "select * from item where id=?";
    $items = DB::select($sql, array($id));
    if (count($items)!= 1){
        die("Something has gone wrong, invalid query or result: $sql");
    }
    $item = $items[0];
    return $item;
}

/**
 * Deletes the item with the given id
 * $id : int
 */
function delete_item ($id) {
    $sql = "delete from item where id = ?";
    DB::delete($sql , array($id));
}