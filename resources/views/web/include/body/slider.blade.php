<div class="py-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 px-0">
                <header>
                    <div id="owl-carousel-one" class="owl-carousel">
                    @foreach($sliders as $slider)
                    <div class="item"
                            data-small-bg="{{ asset('images/slider/small/'.$slider->image) }}"
                            data-large-bg="{{ asset('images/slider/large/'.$slider->image) }}" data-type="Banner">
                            @if($slider->type != 'Simple')
                            <div class="container position-relative">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h2>{{ strtoupper($slider->heading) }}</h2>
                                        <h4 class="mt--30">{{ strtoupper($slider->sub_heading) }}</h4>
                                        <div class="slider-btn mt--30">
                                            <a href="#" class="btn btn-outlined--primary btn-rounded">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <span class="herobanner-progress"></span>
                        </div>
                        @endforeach
                    </div>
                </header>
            </div>
    </div>
    </div>
</div>