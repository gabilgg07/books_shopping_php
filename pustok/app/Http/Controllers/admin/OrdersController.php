<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrdersController extends Controller
{


    public function index()
    {
        $orders = Order::where('is_deleted', 0)->get();

        return view('admin.orders.index', compact('orders'));
    }


    public function accept(Order $order)
    {
        if (!$order) {
            return abort(404);
        }

        $order->is_accepted = 1;
        $order->updated_by_user_id = auth()->user()->id;
        $order->save();

        return redirect()->back()
            ->with('type', 'success')
            ->with('message', 'Order by id:' . $order->id . ' has been updated!');
    }
    public function reject(Order $order)
    {
        if (!$order) {
            return abort(404);
        }

        $orderItems = OrderItem::where('order_id', $order->id)->get();
        if ($orderItems) {
            foreach ($orderItems as $orderItem) {
                $book = $orderItem->book;
                $book->count += $orderItem->qty;
                $book->save();
            }
        }

        $order->is_accepted = 0;
        $order->save();

        return redirect()->back()
            ->with('type', 'success')
            ->with('message', 'Order by id:' . $order->id . ' has been updated!');
    }

    public function details(Order $order)
    {
        if (!$order) {
            return abort(404);
        }

        return view('admin.orders.details', compact('order'));
    }

    public function destroy(Order $order)
    {
        if (!$order) {
            return abort(404);
        }

        $order->is_deleted = 1;
        $order->deleted_at = now();
        $order->deleted_by_user_id = auth()->user()->id;
        $order->save();

        return redirect()->back()
            ->with('type', 'success')
            ->with('message', 'Order by id:' . $order->id . ' has been deleted!');
    }

    public function deleteds()
    {
        $orders = Order::where('is_deleted', 1)->get();

        return view('admin.orders.deleteds', compact('orders'));
    }


    public function restore(Order $order)
    {
        if (!$order) {
            return abort(404);
        }

        $order->is_deleted = 0;
        $order->deleted_at = null;
        $order->deleted_by_user_id = 0;
        $order->save();

        return redirect()->back()
            ->with('type', 'success')
            ->with('message', 'Order by id:' . $order->id . ' has been deleted!');
    }


    public function permanently_delete(Order $order)
    {
        if (!$order) {
            return abort(404);
        }

        $deleted = $order->delete();

        if (!$deleted) {
            return redirect()->back()
                ->with('type', 'danger')
                ->with('message', 'Failed to permently delete Order by id:' . $order->id . ' !');
        }

        return redirect()->back()
            ->with('type', 'success')
            ->with('message', 'Order by id:' . $order->id . ' has been permently deleted!');
    }
}
