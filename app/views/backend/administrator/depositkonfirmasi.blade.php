@extends('backend.templates.layout')

@section('title')
Konfirmasi Deposit
@stop

@section('nav3')
active
@stop

@section('header')
Konfirmasi Deposit
@stop

@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama Sampah</td>
            <td>Berat</td>
            <td>Sub Total</td>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0; ?>
        @foreach
        <tr>
            <td>{{ $no++ }}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop
