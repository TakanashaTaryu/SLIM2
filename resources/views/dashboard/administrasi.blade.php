<!-- resources/views/dashboard/administrasi.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard Administrasi')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Dashboard Administrasi</h1>

<div>
    <h2 class="text-xl mt-4">Manajemen Data Siswa dan Guru</h2>
    <a href="{{ route('students.index') }}" class="text-blue-500">Lihat Semua Siswa</a>
    <a href="{{ route('teachers.index') }}" class="ml-4 text-blue-500">Lihat Semua Guru</a>
</div>

<div>
    <h2 class="text-xl mt-4">Pengelolaan Pembayaran</h2>
    <a href="{{ route('payments.index') }}" class="text-blue-500">Kelola Pembayaran</a>
</div>
@endsection
