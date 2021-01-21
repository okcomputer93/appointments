@extends('layouts.app')
<script src="{{ asset('js/appointments.js') }}" defer></script>
@section('content')
<style>
</style>
<section class="container">
    <div class="menu-appointments">
        @foreach($appointments as $appointment)
            <form method="POST" action="{{ route('appointment.select', $appointment->id) }}" class="appointment
                {{ $appointment->isMine() ? 'appointment--taken' : '' }}
                {{ $appointment->motorcycles->left() === 0 ? 'appointment--full' : '' }}">
                @method('post')
                @csrf
                <div class="appointment__info">
                    <h1 class="appointment__info-title">Hour: {{  toTime($appointment->hour) }}</h1>
                    <h2 class="appointment__info-motor">Motorcycles left: {{ $appointment->motorcycles->left() }}</h2>
                    <p class="appointment__info-user">{{ $appointment->isMine() ? 'Taken' : '' }}</p>
                    <p class="appointment__info-disp">{{ $appointment->motorcycles->left() == 0 ? 'Full' : '' }}</p>
                </div>
            </form>
        @endforeach
    </div>
</section>
@endsection

