<!-- resources/views/pages/detail-announcement.blade.php -->
@extends('layouts.app')

@section('title', $announcement->title)

@section('content')
<h1 class="text-2xl font-semibold mb-4">{{ $announcement->title }}</h1>
<p>{{ $announcement->content }}</p>
@if($announcement->image)
    <img src="{{ asset('storage/' . $announcement->image) }}" alt="Pengumuman Image" class="mt-4">
@endif
@endsection
