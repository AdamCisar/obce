<footer class="footer">
    <div class="container footer__grid">
        <div class="footer__column footer__column--group">
            <div class="footer__section">
                <h5>{{ __('footer.address_and_contact') }}</h5>
                <ul>
                    <li>{{ __('footer.institute') }}</li>
                    <li>{{ __('footer.street') }}</li>
                    <li>{{ __('footer.zip') }} {{ __('footer.address') }}</li>
                    <li>{{ __('footer.headquarters') }}:</li>
                    <li>{{ __('footer.phone') }}</li>
                </ul>
            </div>
            <div class="footer__section">
                <h5>{{ __('footer.contacts') }}</h5>
                <ul>
                    <li>{{ __('footer.phone_numbers') }}</li>
                    <li>{{ __('footer.contact_address') }}</li>
                    <li>{{ __('footer.office_hours') }}</li>
                    <li>{{ __('footer.bank_connection') }}</li>
                </ul>
            </div>
            <div class="footer__section">
                <h5>{{ __('footer.public_info') }}</h5>
                <ul>
                    <li>{{ __('footer.list_exported_medicines') }}</li>
                    <li>{{ __('footer.ministry_of_health') }}</li>
                    <li>{{ __('footer.health_portal') }}</li>
                </ul>
            </div>
        </div>
        <div class="footer__column footer__column--long">
            <h5>{{ __('footer.about_us') }}</h5>
            <ul>
                <li>{{ __('footer.questionnaires') }}</li>
                <li>{{ __('footer.main_representatives') }}</li>
                <li>{{ __('footer.basic_documents') }}</li>
                <li>{{ __('footer.contracts') }}</li>
                <li>{{ __('footer.history_and_successes') }}</li>
                <li>{{ __('footer.national_cooperation') }}</li>
                <li>{{ __('footer.international_cooperation') }}</li>
                <li>{{ __('footer.legal_department') }}</li>
                <li>{{ __('footer.legislation') }}</li>
                <li>{{ __('footer.offences') }}</li>
                <li>{{ __('footer.list_of_debtors') }}</li>
                <li>{{ __('footer.tariff') }}</li>
                <li>{{ __('footer.public_procurements') }}</li>
                <li>{{ __('footer.training_and_presentations') }}</li>
                <li>{{ __('footer.consultations') }}</li>
                <li>{{ __('footer.job_openings') }} ({{ $job_openings ?? 0 }})</li>
                <li>{{ __('footer.info_provision') }}</li>
                <li>{{ __('footer.complaints') }}</li>
            </ul>
        </div>
        <div class="footer__column footer__column--group">
            <div class="footer__section">
                <h5>{{ __('footer.media') }}</h5>
                <ul>
                    <li>{{ __('footer.press_releases') }}</li>
                    <li>{{ __('footer.medicines_in_media') }}</li>
                    <li>{{ __('footer.media_contact') }}</li>
                </ul>
            </div>

            <div class="footer__section">
                <h5>{{ __('footer.databases_and_services') }}</h5>
                <ul>
                    <li>{{ __('footer.database_medical_devices') }}</li>
                    <li>{{ __('footer.other_lists') }}</li>
                    <li>{{ __('footer.contact_form') }}</li>
                    <li>{{ __('footer.site_map') }}</li>
                    <li>{{ __('footer.a_z_index') }}</li>
                    <li>{{ __('footer.links') }}</li>
                    <li>{{ __('footer.rss') }}</li>
                    <li>{{ __('footer.browser_addon') }}</li>
                    <li>{{ __('footer.format_viewer') }}</li>
                 
                </ul>
            </div>
        </div>

        <div class="footer__column footer__column--group">
            <div class="footer__section">
                <h5>{{ __('footer.drug_precursors') }}</h5>
                <ul>
                    <li>{{ __('footer.news') }}</li>
                    <li>{{ __('footer.legislation') }}</li>
                    <li>{{ __('footer.guidelines') }}</li>
                    <li>{{ __('footer.contact') }}</li>
                </ul>
            </div>
            <div class="footer__section">
                <h5>{{ __('footer.other') }}</h5>
                <ul>
                    <li>{{ __('footer.links') }}</li>
                    <li>{{ __('footer.site_map') }}</li>
                    <li>{{ __('footer.faq') }}</li>
                    <li>{{ __('footer.terms_of_use') }}</li>
                </ul>
            </div>
            <div class="footer__section footer__section--alert">
                <h5 class="footer__heading footer__heading--alert">{{ __('footer.rapid_alert_system') }}</h5>
                <a href="#">{{ __('footer.rapid_warning') }}</a>
            </div>
        </div>
    </div>
</footer>