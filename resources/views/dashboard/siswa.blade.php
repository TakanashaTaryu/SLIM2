<!-- resources/views/dashboard/siswa.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard Siswa')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Dashboard Siswa</h1>

<div>
    <p>Selamat datang, {{ Auth::user()->name }}!</p>
    
    <h2 class="text-xl mt-4">Jadwal Kelas</h2>
    <ul>
        @foreach($jadwal as $item)
            <li>{{ $item->day }} - {{ $item->start_time }} to {{ $item->end_time }}</li>
        @endforeach
    </ul>
    
    <h2 class="text-xl mt-4">Pengumuman</h2>
    <ul>
        @foreach($announcements as $announcement)
            <li>
                <a href="{{ route('announcement.detail', $announcement->id) }}" class="text-blue-500">{{ $announcement->title }}</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
