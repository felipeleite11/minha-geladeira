<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Notifications\ShelfLifeEnds;
use Illuminate\Support\Facades\Notification;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session('login') == null) {
            return redirect('/');
        }

        $allProducts = Product::all();
        $products = Product::sortable()->paginate(8);

        $expireds = [];

        foreach($allProducts as $product) {
            if($product->shelf_life < new \DateTime()) {
                $expireds[] = $product;
            }
        }

        Notification::send($expireds, new ShelfLifeEnds($product));

        $notifications = [];

        foreach($expireds as $exp) {
            $notifications[] = $exp->unreadNotifications;
            $exp->unreadNotifications->markAsRead();
        }

        return view('product/index', [
            'products' => $products,
            'notifications' => $notifications,
            'shelfLifeEnds' => count($expireds)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;

        $product->description = $request->description;
        $product->shelf_life = $request->shelf_life;
        $product->quantity = $request->quantity;

        $product->save();

        return redirect('/product');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::sortable()->paginate(8);
        $product = Product::find($id);

        return view('product/index', [
            'product' => $product,
            'products' => $products
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->description = $request->description;
        $product->shelf_life = $request->shelf_life;
        $product->quantity = $request->quantity;

        $product->save();

        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect('/product');
    }
}
