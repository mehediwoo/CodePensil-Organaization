<section class="work__process mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
                    <span class="sub-title">03 - Working Process</span>
                    <h2 class="title">A clear product design process is the basis of success</h2>
                </div>
            </div>
        </div>
        <div class="row work__process__wrap">
            @if (!empty($workingProcess) && $workingProcess->count() > 0)
                @foreach ($workingProcess as $work)
                <div class="col">
                    <div class="work__process__item">
                        <span class="work__process_step">Step - 0{{ $work->lavel }}</span>
                        <div class="work__process__icon">
                            <img class="light" src="{{ asset('storage/'.$work->logo) }}" alt="">
                        </div>
                        <div class="work__process__content">
                            <h4 class="title">{{ $work->title }}</h4>
                            <p>{{ $work->shortDescription }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif

        </div>
    </div>
</section>
