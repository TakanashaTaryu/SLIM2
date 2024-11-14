<!-- resources/views/dashboard/orangtua.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard Orang Tua')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Dashboard Orang Tua</h1>

<div>
    <h2 class="text-xl mt-4">Informasi Kehadiran dan Jadwal Anak</h2>
    <ul>
        @foreach($childSchedules as $schedule)
            <li>{{ $schedule->day }} - {{ $schedule->start_time }} to {{ $schedule->end_time }}</li>
        @endforeach
    </ul>

    <h2 class="text-xl mt-4">Pembayaran</h2>
    <a href="{{ route('payments.history') }}" class="text-blue-500">Lihat Riwayat Pembayaran</a>
</div>
@endsection
