<!-- resources/views/pages/landing.blade.php -->
@extends('layouts.app')

@section('title', 'Welcome to Our School')

@section('content')
<div class="text-center">
    <h1 class="text-3xl font-bold mb-4">Welcome to School Management System</h1>
    <p class="mb-8">Manage your school activities efficiently and stay connected.</p>
    
    <div class="flex justify-center">
        <a href="{{ route('login', ['role' => 'guru']) }}" class="mr-4 px-4 py-2 bg-blue-500 text-white rounded">Login Guru</a>
       
