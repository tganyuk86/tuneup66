<?php

namespace App\Http\Controllers;

use App\Mail\Summary;
use App\Models\Main;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function dash()
    {
        return view('dashboard', [
            'cols' => Main::cols()
        ]);
    }
    public function save(Request $request)
    {
        $upd = [
            "measurement" => $request["measurement"]??0,
            "mileage" => $request["mileage"]??0,
            "volumeUsed" => $request["volumeUsed"]??0,
            "distance" => $request["distance"]??0,
            "monthlyFuelSpending" => $request["monthlyFuelSpending"]??0,
            "monthlyDistance" => $request["monthlyDistance"]??0,
            "fuelPrice" => $request["fuelPrice"]??0,
            "carYear" => $request["carYear"]??0,
            "carMake" => $request["carMake"]??0,
            "carModel" => $request["carModel"]??0,
            "firstName" => $request["firstName"]??0,
            "lastName" => $request["lastName"]??0,
            "email" => $request["email"]??0,
            "carID" => $request["carID"]??0,
            "targetEconomy" => $request["targetEconomy"]??0,
        ];



        $data = Main::create($upd);

        $data->addCalcs();
        $data['displayRows'] = $data->cols()['display'];
        $data->formatCols();
        Mail::to($request["email"])->send(new Summary($data));

        return response()->json(['status' => 'success', 'id' => $data->id]);

    }

    public function sendTestMail($id){
        $data = Main::find($id);
        $data->addCalcs();
        $data->formatCols();
        $data['displayRows'] = $data->cols()['display'];

        return view('mail.summary', $data);
    }

    public function export(Request $request){
        $fileName = now().".csv";
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );


        $c = Main::cols();
        $cs = array_merge($c['data'], $c['display']);
        $cols = [];
        foreach($cs as $k => $c){
            if(request($k)){
                $cols[] = $k;
            }
        }

        $tasks = Main::whereBetween('created_at', [$request['from'],$request['to']])->get();


        $callback = function() use($tasks, $cols) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $cols);

            foreach ($tasks as $task) {
                $out = [];
                foreach ($cols as $col) {
                    $out[] = $task[$col];
                }

                fputcsv($file, $out);
            }

            fclose($file);
        };
        dd($callback());
        return response()->stream($callback, 200, $headers);
    }


}
