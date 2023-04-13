<!-- about-area -->
<section class="about about__style__two">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about__image">
                    <img src="{{ asset('storage/'.$bannerData->banner) }}" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <span class="sub-title">01 - About me</span>
                        <h2 class="title">{{ $bannerData->title }}</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="{{ asset('storage/'.$bannerData->logo) }}" alt="">
                        </div>
                        <div class="about__exp__content">
                            <p><span>{{ $bannerData->subtitle }}</p>
                        </div>
                    </div>
                    <p class="desc">{{ $bannerData->desc }}</p>
                    <a href="{{ route('resume') }}" class="btn">Download my resume</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="about__info__wrap">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button"
                                role="tab" aria-controls="about" aria-selected="true">About</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="skills-tab" data-bs-toggle="tab" data-bs-target="#skills" type="button"
                                role="tab" aria-controls="skills" aria-selected="false">Skills</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="awards-tab" data-bs-toggle="tab" data-bs-target="#awards" type="button"
                                role="tab" aria-controls="awards" aria-selected="false">awards</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="education-tab" data-bs-toggle="tab" data-bs-target="#education" type="button"
                                role="tab" aria-controls="education" aria-selected="false">education</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                            {!! $about->description !!}
                        </div>
                        <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                            <div class="about__skill__wrap">
                                <div class="row">
                                    @if (!empty($skill) && $skill->count() > 0)
                                        @foreach ($skill as $iteam)
                                        <div class="col-md-6">
                                            <div class="about__skill__item">
                                                <h5 class="title">{{ $iteam->name }}</h5>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ $iteam->percent }}%;" aria-valuenow="{{ $iteam->percent }}" aria-valuemin="0" aria-valuemax="100"><span class="percentage">{{ $iteam->percent }}%</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="awards" role="tabpanel" aria-labelledby="awards-tab">
                            <div class="about__award__wrap">
                                <div class="row ">
                                    @if (!empty($award) && $award->count() > 0)
                                    @foreach ($award as $iteam)
                                    <div class="col-md-6 col-sm-9">
                                        <div class="about__award__item">
                                            <div class="award__content">
                                                <h5 class="title">{{ $iteam->title }}</h5>
                                                <p>{{ $iteam->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                            <div class="about__education__wrap">
                                <div class="row">
                                @if (!empty($educa) && $educa->count() > 0)
                                    @foreach ($educa as $iteam)
                                    <div class="col-md-6">
                                        <div class="about__education__item">
                                            <h3 class="title">{{ $iteam->orga_name }}</h3>
                                            <span class="date">{{ $iteam->year }}</span>
                                            <p>{{ $iteam->description }}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about-area-end -->
