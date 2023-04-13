<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="about__icons__wrap">
                    @if (!empty($homeAboutIcon) && $homeAboutIcon->count() > 0)
                        @foreach ($homeAboutIcon as $icon)
                        <li>
                            <img class="light" src="{{ asset('storage/'.$icon->icon) }}" alt="XD">
                        </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <span class="sub-title">01 - About me</span>
                        <h2 class="title">{{ $aboutBanner->title }}</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="{{ asset('storage/'.$aboutBanner->logo) }}" alt="">
                        </div>
                        <div class="about__exp__content">
                            <p>{{ $aboutBanner->subtitle }}</p>
                        </div>
                    </div>
                    <p class="desc">{{ $aboutBanner->desc }}</p>
                    <a href="{{ route('resume') }}" class="btn">Download my resume</a>
                </div>
            </div>
        </div>
    </div>
</section>
