<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vyhľadávanie obcí</title>
         @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header class="header">
        <div class="container header__content">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </div>
            <nav class="nav">
                <ul>
                    <li><a href="#">{{ __('home.home') }}</a></li>
                    <li><a href="#">{{ __('home.list_of_places') }}</a></li>
                    <li><a href="#">{{ __('home.inspection') }}</a></li>
                    <li><a href="#">{{ __('home.contact') }}</a></li>
                </ul>
            </nav>
            <div class="header__right">
                <a href="#" class="header__link">Kontakty z čísla na oddelenia</a>
                <select class="language-switcher">
                    <option value="sk">SK</option>
                    <option value="en">EN</option>
                </select>
                <form class="search-form">
                    <input type="text" placeholder="Hľadať...">
                    <button type="submit">🔍</button>
                </form>
                <a href="#" class="btn">{{ __('home.login') }}</a>
            </div>
        </div>
    </header>

    <main class="main">
        <section class="search">
            <div class="container">
                <h1>{{ __('home.search_database_title') }}</h1>
                <form class="search__form">
                    <input type="text" placeholder="{{ __('home.enter_name') }}">
                    <button type="submit">🔍</button>
                </form>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container footer__grid">
            <div class="footer__column">
                <h4>{{ __('footer.address_and_contact') }}</h4>
                <p>{{ __('footer.institute') }}</p>
                <p>{{ __('footer.address') }}</p>
                <p>{{ __('footer.headquarters') }}: {{ __('footer.phone') }}</p>
            </div>
            <div class="footer__column">
                <h4>{{ __('footer.contacts') }}</h4>
                <ul>
                    <li>{{ __('footer.phone_numbers') }}</li>
                    <li>{{ __('footer.office_hours') }}</li>
                    <li>{{ __('footer.bank_connection') }}</li>
                </ul>
            </div>
            <div class="footer__column">
                <h4>{{ __('footer.public_info') }}</h4>
                <ul>
                    <li>{{ __('footer.list_exported_medicines') }}</li>
                    <li>{{ __('footer.ministry_of_health') }}</li>
                    <li>{{ __('footer.health_portal') }}</li>
                </ul>
            </div>
            <div class="footer__column">
                <h4>{{ __('footer.about_us') }}</h4>
                <ul>
                    <li>{{ __('footer.questionnaires') }}</li>
                    <li>{{ __('footer.main_representatives') }}</li>
                    <li>{{ __('footer.basic_documents') }}</li>
                    <li>{{ __('footer.contracts') }}</li>
                    <li>{{ __('footer.history_and_successes') }}</li>
                </ul>
            </div>
            <div class="footer__column">
                <h4>{{ __('footer.media') }}</h4>
                <ul>
                    <li>{{ __('footer.press_releases') }}</li>
                    <li>{{ __('footer.medicines_in_media') }}</li>
                    <li>{{ __('footer.media_contact') }}</li>
                </ul>
            </div>
            <div class="footer__column">
                <h4>{{ __('footer.drug_precursors') }}</h4>
                <ul>
                    <li>{{ __('footer.news') }}</li>
                    <li>{{ __('footer.guidelines') }}</li>
                </ul>
            </div>
            <div class="footer__column">
                <h4>{{ __('footer.other') }}</h4>
                <ul>
                    <li>{{ __('footer.faq') }}</li>
                    <li>{{ __('footer.terms_of_use') }}</li>
                </ul>
                <p class="alert">
                    <strong>{{ __('footer.rapid_alert_system') }}</strong><br>
                    <a href="#">{{ __('footer.rapid_warning') }}</a>
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
