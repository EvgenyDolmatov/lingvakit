<footer class="main-footer">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
            <p class="text-primary">{{ __('© Lingva-Kit - Online School of Success') }}</p>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-end justify-content-lg-end justify-content-md-end justify-content-center">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('site.privacy-policy')}}">{{ __("site-pages.privacy-policy") }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="{{asset('documents/offer_agreement_lingvakit.pdf')}}">
                        {{ __("site-pages.license-agreement") }}
                    </a>
                </li>
                <li class="nav-item">
{{--                    <a class="nav-link" href="{{route('site.offer-agreement')}}">{{ __("site-pages.offer-agreement") }}</a>--}}
                    <a class="nav-link" target="_blank" href="{{asset('documents/offer_agreement_lingvakit.pdf')}}">
                        {{ __("site-pages.offer-agreement") }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>
<!-- End Page Footer -->
<a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
