<!-- Cookie Consent by TermsFeed https://www.TermsFeed.com -->
<script type="text/javascript" src="https://www.termsfeed.com/public/cookie-consent/4.1.0/cookie-consent.js" charset="UTF-8"></script>
<script type="text/javascript" charset="UTF-8">
    document.addEventListener('DOMContentLoaded', function() {
        cookieconsent.run({
            "notice_banner_type": "simple",
            "consent_type": "express",
            "palette": "light",
            "language": "{{ strtolower(\App\Facades\HelperMethods::getLang()) }}",
            "page_load_consent_levels": ["strictly-necessary"],
            "notice_banner_reject_button_hide": false,
            "preferences_center_close_button_hide": false,
            "page_refresh_confirmation_buttons": false,
            "website_name": "{{ config('app.name', 'Laravel') }}",
            "website_privacy_policy_url": "{{ route('dashboard.privacy_policy') }}"
        });
    });
</script>

@if(config('app.debug') == false)
    <!-- Google Analytics -->
    <!-- Google tag (gtag.js) -->
    <script type="text/plain" data-cookie-consent="tracking" async src="https://www.googletagmanager.com/gtag/js?id=G-DEMO"></script>
    <script type="text/plain" data-cookie-consent="tracking">
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-DEMO');
    </script>
    <!-- end of Google Analytics-->
@endif
<!-- End Cookie Consent by TermsFeed https://www.TermsFeed.com -->
