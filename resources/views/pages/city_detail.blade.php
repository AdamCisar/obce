@extends('layouts.app')

@section('content')
    <div class="container city-details mb-5">
        <div class="row mt-3 mb-4">
            <h1 class="col text-center fw-light">{{ __('pages/city_detail.title') }}</h1>
        </div>

        <div class="row city-details__wrapper">
            <div class="col-md-6 city-details__info">
                <div class="row mb-2">
                    <div class="col-6 fw-bold">{{ __('pages/city_detail.mayor_name') }}:</div>
                    <div class="col-6">{{ $city->mayor_name }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 fw-bold">{{ __('pages/city_detail.city_hall_address') }}:</div>
                    <div class="col-6">{{ $city->city_hall_address }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 fw-bold">{{ __('pages/city_detail.phone') }}:</div>
                    <div class="col-6">{{ $city->phone }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 fw-bold">{{ __('pages/city_detail.fax') }}:</div>
                    <div class="col-6">{{ $city->fax ?? '-' }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 fw-bold">{{ __('pages/city_detail.email') }}:</div>
                    <div class="col-6">{{ str_replace(';', ' ', $city->email) }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 fw-bold">{{ __('pages/city_detail.web_address') }}:</div>
                    <div class="col-6">{{ $city->web_address }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 fw-bold">{{ __('pages/city_detail.geolocation') }}:</div>
                    <div class="col-6">{{ $city->city_hall_address }}</div>
                </div>
            </div>

            <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                <img src="{{ asset($city->coat_of_arms_url) }}" alt="Coat of arms" class="img-fluid mb-3" style="max-height: 250px;">
                <h1 class="city-details__city-name text-center">{{ $city->name }}</h1>
            </div>
        </div>
    </div>
@endsection

@push('viteEntries')
    @vite(['resources/sass/pages/city_detail.scss'])
@endpush