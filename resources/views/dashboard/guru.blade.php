<!-- resources/views/dashboard/guru.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard Guru')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Dashboard Guru</h1>

<div>
    <h2 class="text-xl mt-4">Jadwal Mengajar</h2>
    <ul>
        @foreach($jadwal_guru as $item)
            <li>{{ $item->class_name }} - {{ $item->day }} - {{ $item->start_time }} to {{ $item->end_time }}</li>
        @endforeach
    </ul>

    <h2 class="text-xl mt-4">Buat Presensi</h2>
    <form action="{{ route('presensi.store') }}" method="POST">
        @csrf
        <!-- Form untuk membuat presensi -->
    </form>
</div>
@endsection
