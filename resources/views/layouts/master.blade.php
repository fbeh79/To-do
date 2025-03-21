<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')
    <link rel="stylesheet" href="style.css">


</head>
<div class="container">
    <h1>Todos</h1>
    <div class="create-button">
        @yield('content')
    </div>

@include('layouts.footer')
