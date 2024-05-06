@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <h1>Export Data</h1>
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md">
                <x-adminlte-card theme="lime" theme-mode="outline">
                    <form action="{{ route('admin.export.export') }}" method="post">
                        @csrf
                        <div class="row my-3">
                            <div class="col-md-2">
                                <label for="">Pilih Data untuk di export</label>
                            </div>
                            <div class="col-md">
                                <select name="pilih_export" id="" class="custom-select shadow-sm">
                                    <option value="Seluruh Daerah">Seluruh Daerah</option>
                                    <option value="Banjarmasin Tengah">Banjarmasin Tengah</option>
                                    <option value="Banjarmasin Selatan">Banjarmasin Selatan</option>
                                    <option value="Banjarmasin Utara">Banjarmasin Utara</option>
                                    <option value="Banjarmasin Barat">Banjarmasin Barat</option>
                                    <option value="Banjarmasin Timur">Banjarmasin Timur</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <button type="submit" class="btn btn-success shadow-sm">Export</button>
                            </div>
                        </div>
                    </form>
                </x-adminlte-card>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop