@extends('user.layouts.app')

@section('title', 'Profile')

@push('style')
@endpush

@section('main')

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 ">
                @include('user.components.sidebar')
            </div>
            <div class="col-lg-9 bg-primary"></div>
        </div>

    </div>


@endsection

@push('script')
@endpush
