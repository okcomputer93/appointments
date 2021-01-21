<?php

use App\Appointment;
use App\Motorcycles;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $MIN_HOUR = 8;
        $MAX_HOUR = 20;
        $INTERVAL = 0.5;
        $hours = range($MIN_HOUR, $MAX_HOUR, $INTERVAL);
        $appointments = array_map(function ($hour) {
            return factory(Appointment::class)->create([
                'hour' => $hour
            ]);}, $hours);


        foreach($appointments as $appointment) {
            factory(Motorcycles::class)->create([
                    'appointment_id' => $appointment->id,
                    'max' => 7,
                    'actual' => 0
            ]);
        }
    }
}
