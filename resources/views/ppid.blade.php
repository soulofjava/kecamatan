@extends('layouts.app')
@section('title', 'PPID')
@push('css')
<link rel="stylesheet" href="{{ asset('/css/desa.css') }}">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
@endpush
@section('content')
<div class="col-md-8">

    <livewire:p-p-i-d-page>

</div>
@endsection