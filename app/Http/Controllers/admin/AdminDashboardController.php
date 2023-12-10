<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\TaskAssignMail;
use App\Models\Empdetail;
use App\Models\Event;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AdminDashboardController extends Controller
{
    protected function index()
    {
        $orders = Order::latest()->paginate(10);
        $countOrder = Order::all();
        $pendingOrder = Order::where('status', ['1', '2', '3', '4', '5', '6', '7', '8']);
        $onhold = Order::where('fabrics_status', '3');
        $completedOrder = Order::where('status', '9');
        $tasks = Task::latest()->paginate(10);
        $tasksInProcess = Task::all()->where('status', '1')->count();
        $notification = Notification::latest()->get();
        $notificationCount = Notification::where('status', '1')->count();

        return view('frontend.index', compact('countOrder', 'pendingOrder', 'completedOrder', 'tasks', 'tasksInProcess', 'onhold', 'orders', 'notification', 'notificationCount'));
    }

    protected function order()
    {
        return view('frontend.order');
    }

    protected function addTasks()
    {
        $tasks = Task::latest()->paginate(10);
        $users = User::all();
        $orders = Order::all();
        $notification = Notification::latest()->get();
        $notificationCount = Notification::where('status', '1')->count();

        return view('frontend.sendTask', compact('tasks', 'users', 'orders', 'notification', 'notificationCount'));
    }

    protected function addTask(Request $request)
    {
        $userTask = User::findOrFail($request->cusname);


        $tasks = new Task([
            'userId' => $request->cusname,
            'email' => $userTask->email,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);
        $tasks->save();

        $notification = new Notification([
            'notification_title' => "task assigned for " . $userTask->email,
            'notification_type' => "task",
            'status' => '1',
        ]);
        $notification->save();

        $mailData = [
            'customer_name' =>  'Hello ' . $userTask->name,
            'email' => $userTask->email,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'message' => 'Your task has been assigned',
        ];

        Mail::to($userTask->email)->send(new TaskAssignMail($mailData));

        if ($tasks) {
            return back()->with('success', 'Task created successfully');
        } else {
            return back()->with('error', 'Task creation failed!');
        }
    }

    protected function addOrderTask(Request $request)
    {
        $userTask = User::findOrFail($request->cusname);
        $orderId = Order::findOrFail($request->orderName);


        $tasks = new Task([
            'userId' => $request->cusname,
            'email' => $userTask->email,
            'description' => $orderId->order_id . ', ' . $orderId->cname,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);
        $tasks->save();

        $notification = new Notification([
            'notification_title' => "task assigned for " . $userTask->email,
            'notification_type' => "task",
            'status' => '1',
        ]);
        $notification->save();

        $mailData = [
            'customer_name' =>  'Hello ' . $userTask->name,
            'email' => $userTask->email,
            'description' => 'You have assigned for the order by GoldTouch Order Id:' . $request->description . ', Custome Name: ' . $request->customer,
            'due_date' => $request->due_date,
            'message' => 'Your task has been assigned',
        ];

        Mail::to($userTask->email)->send(new TaskAssignMail($mailData));

        if ($tasks) {
            return back()->with('success', 'Task created successfully');
        } else {
            return back()->with('error', 'Task creation failed!');
        }
    }

    protected function accept($id)
    {
        $order = Order::findOrFail($id);

        if ($order) {
            $order->fabrics_status = 2;
            $order->status = 1; //? this will change the status to processing
            $order->update();

            return back()->with('success', 'Fabric status Updated Successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    protected function reject($id)
    {
        $order = Order::findOrFail($id);

        if ($order) {
            $order->fabrics_status = 1;
            $order->status = 10;
            $order->update();

            return back()->with('success', 'Fabric status Updated Successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    protected function hold($id)
    {
        $order = Order::findOrFail($id);

        if ($order) {
            $order->fabrics_status = 3;
            $order->status = 2; //? This will change the status to On Hold
            $order->update();

            return back()->with('success', 'Fabric status Updated Successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    protected function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'User deleted Successfully');
    }

    protected function calender()
    {
        $tasks = array();
        $events = Event::all();
        $notification = Notification::latest()->get();
        $notificationCount = Notification::where('status', '1')->count();

        foreach ($events as $ev) {
            $tasks[] = [
                'title' => $ev->title . ' assign to:' . $ev->assignName1 . ',' . $ev->assignName2,
                'start' => $ev->start_date,
                'end' => $ev->end_date,
            ];
        }
        return view('frontend.calender', ['tasks' => $tasks], compact('notification', 'notificationCount'));
    }

    protected function calender_event(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:198',
            'assign1' => 'required|max:198',
            'assign2' => 'required|max:198',
            'start_date' => 'required|max:100',
            'end_date' => 'required|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $today = Carbon::now()->format('Y-m-d');
            $start_date = $request->input('start_date');

            if ($start_date >= $today) {
                $events = new Event([
                    'title' => $request->input('title'),
                    'assignName1' => $request->input('assign1'),
                    'assignName2' => $request->input('assign2'),
                    'start_date' => $request->input('start_date'),
                    'end_date' => $request->input('end_date'),
                ]);
                $events->save();

                $notification = new Notification([
                    'notification_title' => "Event is created for " . $request->input('title'),
                    'notification_type' => "event",
                    'status' => '1',
                ]);
                $notification->save();

                if ($events) {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Added Successfully',
                    ]);
                } else {
                    return response()->json([
                        'status' => 400,
                        'errors' => 'Something went wrong!',
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 403,
                    'errors' => 'You can only add events above or equal to this date ' . $today,
                ]);
            }
        }
    }

    protected function finished($id)
    {
        $tasks = Task::findOrFail($id);

        if ($tasks) {
            $tasks->status = 2;
            $tasks->update();

            return back()->with('success', 'Change Status to Finished');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    protected function cancelled($id)
    {
        $tasks = Task::findOrFail($id);

        if ($tasks) {
            $tasks->status = 3;
            $tasks->update();

            return back()->with('success', 'Change Status to Cancelled!');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    protected function onhold($id)
    {
        $tasks = Task::findOrFail($id);

        if ($tasks) {
            $tasks->status = 4;
            $tasks->update();

            return back()->with('success', 'Change Status to Hold');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    protected function process($id)
    {
        $tasks = Task::findOrFail($id);

        if ($tasks) {
            $tasks->status = 1;
            $tasks->update();

            return back()->with('success', 'Change Status to On Process');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    protected function check_notifications()
    {
        $notifications = Notification::all();

        foreach ($notifications as $notification) {
            $notification->status = 2;
        }

        return back();
    }

    protected function fetch_customer(Request $request, $id)
    {
        $validator =  Validator::make($request->all(), [
            'id' => 'required|max:198',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'errors' => $validator->messages(),
            ]);
        } else {
            $order = Order::find($id);

            if ($order) {
                return response()->json([
                    'status' => 200,
                    'order' => $order,
                ]);
            } else {
                return response()->json([
                    'status' => 403,
                    'errors' => 'Not Found!',
                ]);
            }
        }
    }
}
