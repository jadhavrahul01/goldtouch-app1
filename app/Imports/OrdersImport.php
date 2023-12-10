<?php

namespace App\Imports;

use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class OrdersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Order([
            'order_id'     => $row[0],
            'cname'    => $row[1],
            'cadd' => $row[2],
            'cgstin' => $row[3],
            'cstyle_ref' => $row[4],
            'email1' => $row[5],
            'phone1' => $row[6],
        ]);
    }
}
