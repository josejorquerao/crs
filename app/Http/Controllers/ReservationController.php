<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Cottage;
use App\Models\Detail;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Auth\Recaller;
use Illuminate\Support\Facades\Auth;
/**
 * Class ReservationController
 * @package App\Http\Controllers
 */
class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations=Reservation::paginate('8');
        return view('reservation.index', compact('reservations'))
        ->with('i', (request()->input('page', 1) - 1) * $reservations->perPage());
    }
    public function clients()
    {
        $reservations=Reservation::where('users_id',Auth::id())->paginate('5');
        return view('admin.indexClient', compact('reservations'))
        ->with('i', (request()->input('page', 1) - 1) * $reservations->perPage());
    }
    public function showSummary(){
        $countBooking=Reservation::Select(DB::raw('count(month(ingress)) as month'));
        $countcity=Reservation::Select(DB::raw('count(city) as city'))->groupby('city');
        $countHouse=Detail::select(DB::raw('count(detail.cottage_id) 
        as `cantidad`,`cottage`.name FROM `detail` 
        inner join `cottage` on `detail`.`cottage_id`=`cottage`.`id` 
        GROUP BY `detail`.`cottage_id`,`cottage`.`name`'));
        return view('reports.grafic',compact('countBooking','countHouse'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reservation = new Reservation();
        $status =['Pendiente','Aceptado','Cancelado'];
        return view('reservation.create', compact('reservation','status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Reservation::$rules);

        $reservation = Reservation::create($request->all());

        return redirect()->route('reservations.index')
            ->with('success', 'Reservation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::find($id);

        return view('reservation.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = Reservation::find($id);
        $status =['Pendiente','Aceptado','Cancelado'];
        return view('reservation.edit', compact('reservation','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        request()->validate(Reservation::$rules);
        $reservation->update($request->all());

        return redirect()->route('reservations.index')
            ->with('success', 'Reservation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id)->delete();

        return redirect()->route('reservations.index')
            ->with('success', 'Reservation deleted successfully');
    }
    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function cancelar(Request $request)
    {
        $reservation = Reservation::find($request->id);
        $reservation->status="2";
        $reservation->update();
        return redirect()->route('admin.index')

            ->with('success', 'Reserva Cancelada Correctamente');

    }
}
