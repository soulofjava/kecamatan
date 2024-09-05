@extends('layouts.dashboard_template')

@section('content')
<section class="content-header">
    <h1>
        {{ $page_title ?? 'Page Title' }}
        <small>{{ $page_description ?? '' }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('informasi.ppid.index') }}">Daftar Artikel</a></li>
        <li class="active">{{ $page_description }}</li>
    </ol>
</section>

<section class="content container-fluid">

    {!! Form::open(['url' => route('informasi.ppid.store'), 'files' => true]) !!}

    @include('informasi.ppid._form')

    {!! Form::close() !!}

</section>
@endsection