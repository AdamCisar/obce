<header class="header">
  <div class="container">
    <div class="row header__container gx-5 align-items-center">
      
      <div class="header__logo col-12 col-md-3 mb-3 mb-md-0">
        <a href="/" class="header__logo-link">
          <img src="{{ asset('storage/logo/logo.png') }}" alt="Logo" class="img-fluid">
        </a>
      </div>

      <div class="header__right col-12 col-md-9 d-flex flex-column flex-md-row align-items-md-center justify-content-md-end gap-3">
        
        <a href="#" class="header__link text-decoration-none">
          {{ __('layouts/header.contacts_and_numbers') }}
        </a>

        <div class="header__language">
          <select class="form-select form-select-custom language-switcher me-3 border-0">
            <option value="sk">SK</option>
            <option value="en">EN</option>
          </select>
        </div>

        <div class="header__search position-relative">
          <input type="search" class="form-control pe-5" aria-label="Search">
          <i class="header__search-icon bi bi-search position-absolute"></i>
        </div>

        <a href="#" class="header__login btn">
          <span class="header__login-text">{{ __('layouts/header.login') }}</span>
        </a>

      </div>
    </div>

    @include('layouts.partials.navigation')
  </div>
</header>
