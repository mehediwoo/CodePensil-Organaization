<!-- contact-info-area -->
<section class="contact-info-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="contact__info">
                    <div class="contact__info__icon">
                        <img src="{{ asset('front/assets/img/icons/contact_icon01.png') }}" alt="">
                    </div>
                    <div class="contact__info__content">
                        <h4 class="title">address line</h4>
                        <span>{{ $setting->address }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact__info">
                    <div class="contact__info__icon">
                        <img src="{{ asset('front/assets/img/icons/contact_icon02.png') }}" alt="">
                    </div>
                    <div class="contact__info__content">
                        <h4 class="title">Phone Number</h4>
                        <span>{{ $setting->number }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact__info">
                    <div class="contact__info__icon">
                        <img src="{{ asset('front/assets/img/icons/contact_icon03.png') }}" alt="">
                    </div>
                    <div class="contact__info__content">
                        <h4 class="title">Mail Address</h4>
                        <span>{{ $setting->email }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-info-area-end -->
