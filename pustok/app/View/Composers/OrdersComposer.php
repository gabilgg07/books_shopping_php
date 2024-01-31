<?php

namespace App\View\Composers;

use App\Models\Order;
use Illuminate\View\View;

class OrdersComposer
{
    public function compose(View $view): void
    {
        $pendingOrders = Order::where('is_deleted', 0)->where('is_accepted', null)->get();
        $view->with('pendingOrders', $pendingOrders);
    }
}
