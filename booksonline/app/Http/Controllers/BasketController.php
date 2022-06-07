<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Product;

class BasketController extends Controller
{
    public function basket() {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId); 
        }
        return view('basket', compact('order'));
    }

    public function basketAdd($productId) {
        $orderId = session('orderId');
       
        if (is_null($orderId))
        {
            $order = Order::create(); 
            session(['orderId' => $order->id]);
        }
        else 
        {
            $order = Order::find($orderId);
        }

        if($order->products->contains($productId)) {
            $pivoRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivoRow->count++;
            $pivoRow->update();
        }
        else {
            $order->products()->attach($productId);
        }
       
        if(Auth::check()) {
            $order->user_id = Auth::id();
            $order->save();
        }

        $product = Product::find($productId);

        Order::changeFullPrice($product->price);
        Order::changeCollItem(1);  
        session()->flash('success', 'Добавленно: '. $product->name);
        return redirect()->route('basket');
      
    }

    public function basketRemove($productId) {
        $orderId = session('orderId');
        if (is_null($orderId))
        {
            return redirect()->route('basket');
        }
        
        $order = Order::find($orderId);

        if($order->products->contains($productId)) {
            $pivoRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if( $pivoRow->count <2){
                $order->products()->detach($productId);
            }
            else {
                $pivoRow->count--;
                $pivoRow->update();
            }
        }

        $product = Product::find($productId);
        Order::changeFullPrice(-$product->price);
        Order::changeCollItem(-1);   
        session()->flash('warning', 'Удаленно: '. $product->name);
        return redirect()->route('basket');
    }

    public function basketСheckout() {
        if (Auth::check()) {
            $orderId = session('orderId');
            if (is_null($orderId)) {
                return redirect()->route('index');
            }
            $orders = Order::find($orderId); 

            if(is_null($orders->user_id)) {
                $orders->user_id = Auth::id();
                $orders->save();
            }
            return view('auth.checkout', compact('orders'));
        }
        else {
            session()->flash('warning', 'Зарегистрируйтесь или авторизуйтесь, что бы оформить заказ!');
            return redirect()->route('basket');
        }
    }

    public function basketConfirm(Request $request) {
        
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        $order->full_name = $request->full_name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->status = 1;
        $order->save();

        session()->forget('orderId');
        session()->forget('full_order_price');
        session()->forget('coll_item_backet');
        
        session()->flash('success', 'Ваш заказ принят в обработку!');
        return redirect()->route('index');
    }



}
