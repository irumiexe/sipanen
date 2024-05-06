@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md text-center">
                <x-adminlte-callout theme="info">
                    <h3>Sistem Informasi Hasil Panen Petani Kota Banjarmasin</h3>
                </x-adminlte-callout>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <x-adminlte-card title="Total Hasil Panen Padi masing-masing daerah" theme="dark" icon="fas fa-lg fa-seedling">
                    <div class="row">
                        <div class="col-md">
                            <x-adminlte-info-box title="Banjarmasin Tengah" text="{{ $kecamatan['tengah'] }}" icon="fas fa-building" icon-theme="purple" class="bg-light"/>
                        </div>
                        <div class="col-md">
                            <x-adminlte-info-box title="Banjarmasin Selatan" text="{{ $kecamatan['selatan'] }}" icon="fas fa-building" icon-theme="yellow" class="bg-light"/>
                        </div>
                        <div class="col-md">
                            <x-adminlte-info-box title="Banjarmasin Utara" text="{{ $kecamatan['utara'] }}" icon="fas fa-building" icon-theme="green" class="bg-light"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <x-adminlte-info-box title="Banjarmasin Barat" text="{{ $kecamatan['barat'] }}" icon="fas fa-building" icon-theme="primary" class="bg-light"/>
                        </div>
                        <div class="col-md">
                            <x-adminlte-info-box title="Banjarmasin Timur" text="{{ $kecamatan['timur'] }}" icon="fas fa-building" icon-theme="danger" class="bg-light"/>
                        </div>
                    </div>
                </x-adminlte-card>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop