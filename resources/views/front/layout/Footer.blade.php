@php
    $setting = App\Models\Setting::first();
@endphp
<footer class="footer">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">Contact us</h5>
                        <h4 class="title">{{ $setting->number }}</h4>
                    </div>
                    <div class="footer__widget__text">
                        <p>{{ $setting->desc }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">my address</h5>
                        <h4 class="title">{{ $setting->country }}</h4>
                    </div>
                    <div class="footer__widget__address">
                        <p>{{ $setting->address }}</p>
                        <a href="mailto:{{ $setting->email }}" class="mail">{{ $setting->email }}</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">Follow me</h5>
                        <h4 class="title">socially connect</h4>
                    </div>
                    <div class="footer__widget__social">
                        <p>Lorem ipsum dolor sit amet enim. <br> Etiam ullamcorper.</p>
                        <ul class="footer__social__list">
                            <li><a href="{{ $setting->facebook_url }}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ $setting->twitter_url }}"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{ $setting->linkedIn_url }}"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="{{ $setting->instagram_url }}"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright__wrap">
            <div class="row">
                <div class="col-12">
                    <div class="copyright__text text-center">
                        <p>{{ $setting->copyrightText }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
