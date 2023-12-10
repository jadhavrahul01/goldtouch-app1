 <?php

    use App\Models\Empdetail;
    use App\Models\Order;

    function progressbar($orderid, $ordersId)
    {
        $emp = Empdetail::where('customer_id', "$orderid")->count();
        if ($emp) {
            $empStatus = Empdetail::where('customer_id', "$orderid")->where('status', "RD")->count();
            $total = ($empStatus / $emp) * 100;
            $totals = number_format($total);
            if ($totals == 100) {
                $order = Order::findOrFail($ordersId);
                $order->status = 9;
                $order->update();
            }
            return $totals;
        } else {
            return 0;
        }
    }

    ?>
