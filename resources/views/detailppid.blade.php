@extends('layouts.app')
@push('scripts')
<style>
    .isi-artikel {
        padding: 10px;
    }
</style>
@endpush
@section('content')
<div class="col-md-8">
    <livewire:detail-p-p-i-d-page :slug="$slug" />
</div>
@endsection
@push('scripts')
<script type="text/javascript"
    src="https://platform-api.sharethis.com/js/sharethis.js#property=61eeb3e9e14521001ac13912&product=inline-share-buttons"
    async="async"></script>
@endpush