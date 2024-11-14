<!-- resources/views/pages/announcement.blade.php -->
@extends('layouts.app')

@section('title', 'Pengumuman')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Pengumuman Terbaru</h1>
<ul>
    @foreach($announcements as $announcement)
        <li>
            <a href="{{ route('announcement.detail', $announcement->id) }}" class="text-blue-500">{{ $announcement->title }}</a>
        </li>
    @endforeach
</ul>
@endsection
