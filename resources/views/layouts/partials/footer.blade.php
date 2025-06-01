<footer class="footer d-flex justify-content-center">
    <div class="container">
        <div class="row footer__grid mt-5 mb-3 gap-5">
            <div class="footer__column footer__column--group col">
                <div class="footer__section mb-4">
                    <h5>{{ __('layouts/footer.address_and_contact') }}</h5>
                    <ul>
                        <li>{{ __('layouts/footer.institute') }}</li>
                        <li>{{ __('layouts/footer.street') }}</li>
                        <li>{{ __('layouts/footer.zip') }} {{ __('layouts/footer.address') }}</li>
                        <li>{{ __('layouts/footer.headquarters') }}:</li>
                        <li>{{ __('layouts/footer.phone') }}</li>
                    </ul>
                </div>
                <div class="footer__section mb-4">
                    <h5>{{ __('layouts/footer.contacts') }}</h5>
                    <ul>
                        <li>{{ __('layouts/footer.phone_numbers') }}</li>
                        <li>{{ __('layouts/footer.contact_address') }}</li>
                        <li>{{ __('layouts/footer.office_hours') }}</li>
                        <li>{{ __('layouts/footer.bank_connection') }}</li>
                    </ul>
                </div>
                <div class="footer__section mb-4">
                    <h5>{{ __('layouts/footer.public_info') }}</h5>
                    <ul>
                        <li>{{ __('layouts/footer.list_exported_medicines') }}</li>
                        <li>{{ __('layouts/footer.ministry_of_health') }}</li>
                        <li>{{ __('layouts/footer.health_portal') }}</li>
                    </ul>
                </div>
            </div>
            <div class="footer__column footer__column--long col">
                <h5>{{ __('layouts/footer.about_us') }}</h5>
                <ul>
                    <li>{{ __('layouts/footer.questionnaires') }}</li>
                    <li>{{ __('layouts/footer.main_representatives') }}</li>
                    <li>{{ __('layouts/footer.basic_documents') }}</li>
                    <li>{{ __('layouts/footer.contracts') }}</li>
                    <li>{{ __('layouts/footer.history_and_successes') }}</li>
                    <li>{{ __('layouts/footer.national_cooperation') }}</li>
                    <li>{{ __('layouts/footer.international_cooperation') }}</li>
                    <li>{{ __('layouts/footer.legal_department') }}</li>
                    <li>{{ __('layouts/footer.legislation') }}</li>
                    <li>{{ __('layouts/footer.offences') }}</li>
                    <li>{{ __('layouts/footer.list_of_debtors') }}</li>
                    <li>{{ __('layouts/footer.tariff') }}</li>
                    <li>{{ __('layouts/footer.public_procurements') }}</li>
                    <li>{{ __('layouts/footer.training_and_presentations') }}</li>
                    <li>{{ __('layouts/footer.consultations') }}</li>
                    <li>{{ __('layouts/footer.job_openings') }} ({{ $job_openings ?? 0 }})</li>
                    <li>{{ __('layouts/footer.info_provision') }}</li>
                    <li>{{ __('layouts/footer.complaints') }}</li>
                </ul>
            </div>
            <div class="footer__column footer__column--group col">
                <div class="footer__section mb-4">
                    <h5>{{ __('layouts/footer.media') }}</h5>
                    <ul>
                        <li>{{ __('layouts/footer.press_releases') }}</li>
                        <li>{{ __('layouts/footer.medicines_in_media') }}</li>
                        <li>{{ __('layouts/footer.media_contact') }}</li>
                    </ul>
                </div>

                <div class="footer__section mb-4">
                    <h5>{{ __('layouts/footer.databases_and_services') }}</h5>
                    <ul>
                        <li>{{ __('layouts/footer.database_medical_devices') }}</li>
                        <li>{{ __('layouts/footer.other_lists') }}</li>
                        <li>{{ __('layouts/footer.contact_form') }}</li>
                        <li>{{ __('layouts/footer.site_map') }}</li>
                        <li>{{ __('layouts/footer.a_z_index') }}</li>
                        <li>{{ __('layouts/footer.links') }}</li>
                        <li>{{ __('layouts/footer.rss') }}</li>
                        <li>{{ __('layouts/footer.browser_addon') }}</li>
                        <li>{{ __('layouts/footer.format_viewer') }}</li>
                    
                    </ul>
                </div>
            </div>

            <div class="footer__column footer__column--group col">
                <div class="footer__section mb-4">
                    <h5>{{ __('layouts/footer.drug_precursors') }}</h5>
                    <ul>
                        <li>{{ __('layouts/footer.news') }}</li>
                        <li>{{ __('layouts/footer.legislation') }}</li>
                        <li>{{ __('layouts/footer.guidelines') }}</li>
                        <li>{{ __('layouts/footer.contact') }}</li>
                    </ul>
                </div>
                <div class="footer__section mb-4">
                    <h5>{{ __('layouts/footer.other') }}</h5>
                    <ul>
                        <li>{{ __('layouts/footer.links') }}</li>
                        <li>{{ __('layouts/footer.site_map') }}</li>
                        <li>{{ __('layouts/footer.faq') }}</li>
                        <li>{{ __('layouts/footer.terms_of_use') }}</li>
                    </ul>
                </div>
                <div class="footer__section footer__section--alert mb-4">
                    <h5 class="footer__heading footer__heading--alert">{{ __('layouts/footer.rapid_alert_system') }}</h5>
                    <a href="#">{{ __('layouts/footer.rapid_warning') }}</a>
                </div>
            </div>
        </div>
    </div>
</footer>