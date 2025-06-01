@extends('layouts.app')

@section('content')
<section class="container-fluid search d-flex flex-column justify-content-center align-items-center">
  <div class="container text-center">
    <h1 class="search__title">{{ __('pages/home.search_database_title') }}</h1>
    <div class="search__bar mx-auto">
      <input type="text" placeholder="{{ __('pages/home.enter_name') }}">
    </div>
  </div>
</section>

@endsection

@push('styles')
    @vite(['resources/sass/pages/home.scss'])
@endpush