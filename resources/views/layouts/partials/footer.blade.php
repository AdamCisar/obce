<footer class="footer">
    <div class="container footer__grid">
        <div class="footer__column footer__column--group">
            <div class="footer__section">
                <h5>{{ __('layout/footer.address_and_contact') }}</h5>
                <ul>
                    <li>{{ __('layout/footer.institute') }}</li>
                    <li>{{ __('layout/footer.street') }}</li>
                    <li>{{ __('layout/footer.zip') }} {{ __('layout/footer.address') }}</li>
                    <li>{{ __('layout/footer.headquarters') }}:</li>
                    <li>{{ __('layout/footer.phone') }}</li>
                </ul>
            </div>
            <div class="footer__section">
                <h5>{{ __('layout/footer.contacts') }}</h5>
                <ul>
                    <li>{{ __('layout/footer.phone_numbers') }}</li>
                    <li>{{ __('layout/footer.contact_address') }}</li>
                    <li>{{ __('layout/footer.office_hours') }}</li>
                    <li>{{ __('layout/footer.bank_connection') }}</li>
                </ul>
            </div>
            <div class="footer__section">
                <h5>{{ __('layout/footer.public_info') }}</h5>
                <ul>
                    <li>{{ __('layout/footer.list_exported_medicines') }}</li>
                    <li>{{ __('layout/footer.ministry_of_health') }}</li>
                    <li>{{ __('layout/footer.health_portal') }}</li>
                </ul>
            </div>
        </div>
        <div class="footer__column footer__column--long">
            <h5>{{ __('layout/footer.about_us') }}</h5>
            <ul>
                <li>{{ __('layout/footer.questionnaires') }}</li>
                <li>{{ __('layout/footer.main_representatives') }}</li>
                <li>{{ __('layout/footer.basic_documents') }}</li>
                <li>{{ __('layout/footer.contracts') }}</li>
                <li>{{ __('layout/footer.history_and_successes') }}</li>
                <li>{{ __('layout/footer.national_cooperation') }}</li>
                <li>{{ __('layout/footer.international_cooperation') }}</li>
                <li>{{ __('layout/footer.legal_department') }}</li>
                <li>{{ __('layout/footer.legislation') }}</li>
                <li>{{ __('layout/footer.offences') }}</li>
                <li>{{ __('layout/footer.list_of_debtors') }}</li>
                <li>{{ __('layout/footer.tariff') }}</li>
                <li>{{ __('layout/footer.public_procurements') }}</li>
                <li>{{ __('layout/footer.training_and_presentations') }}</li>
                <li>{{ __('layout/footer.consultations') }}</li>
                <li>{{ __('layout/footer.job_openings') }} ({{ $job_openings ?? 0 }})</li>
                <li>{{ __('layout/footer.info_provision') }}</li>
                <li>{{ __('layout/footer.complaints') }}</li>
            </ul>
        </div>
        <div class="footer__column footer__column--group">
            <div class="footer__section">
                <h5>{{ __('layout/footer.media') }}</h5>
                <ul>
                    <li>{{ __('layout/footer.press_releases') }}</li>
                    <li>{{ __('layout/footer.medicines_in_media') }}</li>
                    <li>{{ __('layout/footer.media_contact') }}</li>
                </ul>
            </div>

            <div class="footer__section">
                <h5>{{ __('layout/footer.databases_and_services') }}</h5>
                <ul>
                    <li>{{ __('layout/footer.database_medical_devices') }}</li>
                    <li>{{ __('layout/footer.other_lists') }}</li>
                    <li>{{ __('layout/footer.contact_form') }}</li>
                    <li>{{ __('layout/footer.site_map') }}</li>
                    <li>{{ __('layout/footer.a_z_index') }}</li>
                    <li>{{ __('layout/footer.links') }}</li>
                    <li>{{ __('layout/footer.rss') }}</li>
                    <li>{{ __('layout/footer.browser_addon') }}</li>
                    <li>{{ __('layout/footer.format_viewer') }}</li>
                 
                </ul>
            </div>
        </div>

        <div class="footer__column footer__column--group">
            <div class="footer__section">
                <h5>{{ __('layout/footer.drug_precursors') }}</h5>
                <ul>
                    <li>{{ __('layout/footer.news') }}</li>
                    <li>{{ __('layout/footer.legislation') }}</li>
                    <li>{{ __('layout/footer.guidelines') }}</li>
                    <li>{{ __('layout/footer.contact') }}</li>
                </ul>
            </div>
            <div class="footer__section">
                <h5>{{ __('layout/footer.other') }}</h5>
                <ul>
                    <li>{{ __('layout/footer.links') }}</li>
                    <li>{{ __('layout/footer.site_map') }}</li>
                    <li>{{ __('layout/footer.faq') }}</li>
                    <li>{{ __('layout/footer.terms_of_use') }}</li>
                </ul>
            </div>
            <div class="footer__section footer__section--alert">
                <h5 class="footer__heading footer__heading--alert">{{ __('layout/footer.rapid_alert_system') }}</h5>
                <a href="#">{{ __('layout/footer.rapid_warning') }}</a>
            </div>
        </div>
    </div>
</footer>