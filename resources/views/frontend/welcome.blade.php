@extends('layouts.master')

@section('content')
    <section class="container mt-5">
        @livewire('show-posts')
    </section>
    <div class="position-absolute top-0 end-0 pe-4 pt-4">
        <a href="{{ route('welcome.logout') }}" class="btn btn-outline-primary"> Logout </a>
    </div>
@stop
