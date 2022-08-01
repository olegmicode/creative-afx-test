@extends('layouts.master')

@section('content')
    <section class="container mt-5">
        <form method='post' action="{{ route('welcome.login') }}">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="row mb-3">
                <div class="col-12 col-sm-4">
                    Email:
                </div>
                <div class="col-12 col-sm-8">
                    <input name="email" type="email" value="admin@example.com">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-sm-4">
                    Password:
                </div>
                <div class="col-12 col-sm-8">
                    <input name="password" type="password" value="password">
                </div>
            </div>
            <input type="submit" class="btn btn-primary">
        </form>
    </section>
@stop
