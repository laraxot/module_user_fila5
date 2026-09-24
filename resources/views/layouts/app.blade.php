<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> 350420cb (Check & fix styling)
?>
@extends('pub_theme::layouts.base')

@section('body')
    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
