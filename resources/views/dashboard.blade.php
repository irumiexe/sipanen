@extends('templates.dashboard-guest')

@section('title', $title ?? "Dashboard")

@push('css')
    <style>
        .bg-hero {
            background-image: url("{{ asset('img/hero2.jpeg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: brightness(0.5);
            height: 100%;
            width: 100%;
            position: absolute;
            
            left: 0%;
            
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid text-center">
        <div class="row bg-hero">

        </div>
        <div class="row" style="position: relative; color: white;">
            <div class="col-md-12 my-3">
                <h1>Selamat datang di SI Pelaporan Hasil Produksi Panen Padi</h1>
            </div>
            <div class="col-md-12 my-3">
                <img src="{{ asset('img/logo dkp.png') }}" alt="" class="img-fluid">
            </div>
            <div class="col-md-12-8">
                <h5>Sistem informasi ini digunakan untuk memonitoring hasil produksi panen padi yang ada di wilayah kota Banjarmasin.</h5>
            </div>
        </div>
    </div>
@endsection


