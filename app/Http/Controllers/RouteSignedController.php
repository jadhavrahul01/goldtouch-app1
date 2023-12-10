<?php

namespace App\Http\Controllers;

use App\Mail\SendRoute;
use App\Models\Customer;
use App\Models\Empdetail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class RouteSignedController extends Controller
{
    protected function sendMailRoute($id)
    {
        $order = Order::findOrFail($id);

        if ($order) {
            $url = URL::temporarySignedRoute('share-entry', now()->addHours(24), [
                'cid' => $order->u_id,
            ]);

            $mailData = [
                'cname' => $order->cname,
                'title' => 'Employee Details Fillup Form',
                'body' => "Make sure this link is only valid for 24 hours",
                'link' => $url,
            ];

            Mail::to($order->email)->send(new SendRoute($mailData));

            return back()->with('success', 'Email Sended Successfully');
        } else {
            return back()->with('error', 'Email not sended try again later');
        }
    }

    protected function edit($id)
    {
        $employee = Empdetail::find($id);

        if ($employee) {

            return response()->json([
                'status' => 200,
                'employee' => $employee,
            ]);
        } else {

            return response()->json([
                'status' => 404,
                'message' => "Employee doesn't exist",
            ]);
        }
    }

    protected function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tokenNo' => 'required|max:100',
            'fullName' => 'required|max:200',
            'category' => 'required|max:100',
            'setOrder' => 'required|max:100',
            'status' => 'required|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $emp = Empdetail::find($id);
            if ($emp) {

                $emp->tokenNo = $request->input('tokenNo');
                $emp->sname = $request->input('sname');
                $emp->fullName = $request->input('fullName');
                $emp->category = $request->input('category');
                $emp->setOrder = $request->input('setOrder');
                $emp->status = $request->input('status');
                $emp->update();

                return response()->json([
                    'status' => 200,
                    'message' => 'Employee Updated Successfully',
                ]);
            } else {

                return response()->json([
                    'status' => 404,
                    'message' => "Employee doesn't exist",
                ]);
            }
        }
    }

    protected function delete($id)
    {
        $emp = Empdetail::findOrFail($id);
        $emp->delete();

        return back()->with('success', 'Employee deleted successfully');
    }

    // ? Excel data insert function
    protected function exports(Request $request)
    {
    }
}
