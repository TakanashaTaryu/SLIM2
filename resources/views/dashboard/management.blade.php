<!-- resources/views/dashboard/management.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard Management')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Dashboard Management</h1>

<div>
    <h2 class="text-xl mt-4">Laporan dan Analisis</h2>
    <a href="{{ route('reports.attendance') }}" class="text-blue-500">Laporan Kehadiran</a>
    <a href="{{ route('reports.payments') }}" class="ml-4 text-blue-500">Laporan Pembayaran</a>
</div>

<div>
    <h2 class="text-xl mt-4">Manajemen Pengumuman</h2>
    <a href="{{ route('announcements.create') }}" class="text-blue-500">Buat Pengumuman Baru</a>
</div>
@endsection
