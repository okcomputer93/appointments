<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AppointmentController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index() : View
    {
        // Solving N + 1 problem
        $appointments = Appointment::with('motorcycles')->get();
        return view('appointments.index', compact('appointments'));
    }

    /**
     * @param Appointment $appointment
     * @return RedirectResponse
     */
    public function select(Appointment $appointment) : RedirectResponse
    {
        $appointment->toggleUser(request()->user());
        return back();
    }
}
