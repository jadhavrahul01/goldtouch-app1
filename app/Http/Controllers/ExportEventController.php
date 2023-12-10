<?php

namespace App\Http\Controllers;

use App\Exports\EventExport;
use App\Models\Event;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportEventController extends Controller
{
    // public function export()
    // {
    //     return Excel::download(new EventExport, 'events.csv');
    // }


    public function export(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d',
        ]);

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        if ($start_date <= $end_date) {
            $events = Event::whereBetween('created_at', [$start_date, $end_date])->get();

            $fileName = 'events_' . $start_date . '_' . $end_date . '.csv';
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );
            $columns = array('Sr. No', 'Event', 'Assign 1', 'Assign 2', 'Start Date', 'End Date');

            $callback = function () use ($events, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                foreach ($events as $event) {
                    $row['Sr. No']  = $event->id;
                    $row['Event']    = $event->title;
                    $row['Assign 1']    = $event->assignName1;
                    $row['Assign 2']  = $event->assignName2;
                    $row['Start Date']  = $event->start_date;
                    $row['End Date']  = $event->end_date;
                    fputcsv($file, array($row['Sr. No'], $row['Event'], $row['Assign 1'], $row['Assign 2'], $row['Start Date'], $row['End Date']));
                }
                fclose($file);
            };
            return response()->stream($callback, 200, $headers);
        } else {
            return back()->with('error', 'Start date must be lower than end date');
        }
    }
}
