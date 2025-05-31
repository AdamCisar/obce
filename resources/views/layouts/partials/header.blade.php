<header class="header">
  <div class="container">
    <div class="header__container d-flex justify-content-between align-items-center">
      
      <div class="header__logo">
        <img src="{{ asset('storage/logo/logo.png') }}" alt="Logo">
      </div>

      <div class="header__right d-flex align-items-center">
        <a href="#" class="header__link me-3 fw-bold text-decoration-none">{{ __('layout/header.contacts_and_numbers') }}</a>

        <div class="header__language me-2">
          <select class="form-select language-switcher me-3 border-0">
            <option value="sk">SK</option>
            <option value="en">EN</option>
          </select>
        </div>

        
        <div class="header__search position-relative me-3">
          <input type="search" class="form-control pe-5" aria-label="Search">
          <i class="header__search-icon bi bi-search position-absolute"></i>
        </div>


        <a href="#" class="header__login btn">
          <span class="header__login-text">{{ __('layout/header.login') }}</span>
        </a>
      </div>

    </div>

    @include('layouts.partials.navigation')
  </div>
</header>
