<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Cottage;
use app\Models\Reservation;
use App\Models\Detail;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $month=DB::select('SELECT count(MONTH(`ingress`)) as cantidad,MonthName(`ingress`) as mes from reservations group by `mes`');
        $countcity=DB::Select('SELECT count(`city`) as `cantidad`,`city` from reservations group by `city`');
        $countHouse=DB::select('SELECT count(`detail`.`cottage_id`) 
        as `cantidad`,`cottage`.name FROM `detail` 
        inner join `cottage` on `detail`.`cottage_id`=`cottage`.`id` 
        GROUP BY `cottage`.`name`');
        return view('reports.grafic',compact('countHouse','month','countcity'));
    }
    public function clients()
    {
        $reservations=Reservation::paginate();
        dd($reservations);
        return view('reservation.indexClient', compact('reservations'))
        ->with('i', (request()->input('page', 1) - 1) * $reservations->perPage());
    }
    public function cancelar($id)
    {
        $reservation = Reservation::find($id);
        dd($reservation);
               $reservation->status="Cancelada";
        $reservation->update();
        return redirect()->route('admin.index')
            ->with('success', 'Reserva Cancelada Correctamente');
    }

}
