<?php

namespace App\Http\Controllers;

use App\Models\Empdetail;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserDashboardController extends Controller
{
    protected function userinfo(Request $request)
    {
        $users = User::latest()->where('role', '1');
        $admins = User::latest()->where('role', '2');
        $notification = Notification::latest()->get();
        $notificationCount = Notification::where('status', '1')->count();


        if (!empty($request->get('name'))) {
            $orders = $users->where('name', 'like', '%' . $request->get('name') . '%');
        }

        $users1 = User::where('role', '1')->count();
        $users2 = User::where('role', '2')->count();
        $users =  $users->paginate(12);
        $admins =  $admins->paginate(12);
        return view('frontend.userinfo', compact('users', 'users1', 'users2', 'admins', 'notification', 'notificationCount'));
    }

    protected function empData(Request $request)
    {
        $segment = $request->segment(2);

        $empDetails = Empdetail::all();
        return view('frontend.empdatatable', compact('empDetails', 'segment'));
    }

    protected function storeEmpData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tokenNo' => 'required|max:100',
            'fullName' => 'required|max:200',
            'category' => 'required|max:100',
            'setOrder' => 'required|max:100',
            'status' => 'required|max:100',
            'cusid' => 'required|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $emp = new Empdetail;

            $emp->tokenNo = $request->input('tokenNo');
            $emp->sname = $request->input('sname');
            $emp->fullName = $request->input('fullName');
            $emp->category = $request->input('category');
            $emp->setOrder = $request->input('setOrder');
            $emp->status = $request->input('status');
            $emp->customer_id = $request->input('cusid');

            $emp->save();
            return response()->json([
                'status' => 200,
                'message' => 'Employee Added Successfully',
            ]);
        }
    }

    protected function updateProfileImg(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $emp = User::find($id);

            if (file::exists("profileImg/" . $emp->profileImg)) {

                if ($emp->profileImg == "1.png") {
                } else {
                    File::delete("profileImg/" . $emp->profileImg);
                }
            }

            // Store the new image in the database
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(\public_path("profileImg/"), $filename);


            if ($emp) {
                $emp->profileImg = $filename;
                $emp->update();

                return response()->json([
                    'status' => 200,
                    'message' => 'Profile Picture Updated Successfully',
                ]);
            } else {

                return response()->json([
                    'status' => 404,
                    'message' => "File Not Found",
                ]);
            }
        }
    }
}
