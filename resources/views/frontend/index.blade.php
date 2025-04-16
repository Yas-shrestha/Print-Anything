@extends('layouts.frontend')
@section('container')
    <section id="banner bg-light">
        <div class="container ">
            <div class="swiper main-swiper">
                <div class="swiper-wrapper">
                    @forelse ($carousels as $carousel)
                        <div class="swiper-slide py-5">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <img src="{{ url('uploads/' . $carousel->img) }}" class="img-fluid" alt="Carousel Image" />
                                </div>
                                <div class="col-md-7 px-5 text-dark">
                                    <h2 class="display-4 display-md-3  lh-sm mb-4">
                                        {{ $carousel->title }}
                                    </h2>
                                    <h2 class="text-primary mb-4">{{ $carousel->sub_title }}</h2>

                                    <a href="/shop"
                                        class="btn btn-dark btn-lg px-4 py-2 text-uppercase rounded-0 shadow-sm">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        @for ($i = 0; $i < 3; $i++)
                            <div class="swiper-slide py-5">
                                <div class="row align-items-center">
                                    <div class="col-md-5">
                                        <img src="{{ asset('assets/images/model-img.png') }}" class="img-fluid"
                                            alt="Placeholder Image" />
                                    </div>
                                    <div class="col-md-7 px-5 text-dark">
                                        <div class="text-uppercase text-secondary  mb-3">
                                            Save 10 - 20 % off
                                        </div>
                                        <h2 class="display-4  mb-4">
                                            Best destination for
                                        </h2>
                                        <h2 class="text-primary mb-4 ">your clothes</h2>
                                        <a href="/shop" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                                            Shop Now

                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    @endforelse
                </div>

                <div class="swiper-pagination mb-5"></div>
            </div>
        </div>
    </section>

    <section id="service">
        <div class="container py-5 my-5">
            <div class="row g-4 text-center">
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 shadow-sm border-0 p-4">
                        <div class="mb-3">
                            <iconify-icon class="text-primary" icon="la:shopping-cart" width="48"
                                height="48"></iconify-icon>
                        </div>
                        <h5 class="card-title fw-semibold mb-2">Free Delivery</h5>
                        <p class="card-text text-muted fs-6">
                            Lorem ipsum dolor sit amet, consectetur adipi elit.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 shadow-sm border-0 p-4">
                        <div class="mb-3">
                            <iconify-icon class="text-primary" icon="la:user-check" width="48"
                                height="48"></iconify-icon>
                        </div>
                        <h5 class="card-title fw-semibold mb-2">100% Secure Payment</h5>
                        <p class="card-text text-muted fs-6">
                            Lorem ipsum dolor sit amet, consectetur adipi elit.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 shadow-sm border-0 p-4">
                        <div class="mb-3">
                            <iconify-icon class="text-primary" icon="la:tag" width="48" height="48"></iconify-icon>
                        </div>
                        <h5 class="card-title fw-semibold mb-2">Daily Offer</h5>
                        <p class="card-text text-muted fs-6">
                            Lorem ipsum dolor sit amet, consectetur adipi elit.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 shadow-sm border-0 p-4">
                        <div class="mb-3">
                            <iconify-icon class="text-primary" icon="la:award" width="48" height="48"></iconify-icon>
                        </div>
                        <h5 class="card-title fw-semibold mb-2">Quality Guarantee</h5>
                        <p class="card-text text-muted fs-6">
                            Lorem ipsum dolor sit amet, consectetur adipi elit.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="banner-2" class="my-3 bg-light">
        <div class="container">
            <div class="row flex-row-reverse banner-content align-items-center">
                <div class="img-wrapper col-12 col-md-6">
                    <img src="{{ asset('assets/images/model-img.png') }}" class="img-fluid" alt="">
                </div>
                <div class="content-wrapper col-12 offset-md-1 col-md-5 p-5">
                    <div class="secondary-font text-primary text-uppercase mb-3 fs-4">
                        Let your idea Flow
                    </div>
                    <h2 class="banner-title display-1 fw-normal">Customize your Own !!</h2>
                    <a href="/custom-prod" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                        shop now
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonial">
        <div class="container my-5 py-5">
            <h2 class="display-3 fw-normal text-center">Testimonials</h2>
            <div class="secondary-font text-primary text-center text-uppercase mb-3 fs-4">
                What our customers says
            </div>
            <div class="row">
                <div class="offset-md-1 col-md-10">
                    <div class="swiper testimonial-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-2">
                                        <iconify-icon icon="ri:double-quotes-l"
                                            class="quote-icon text-primary"></iconify-icon>
                                    </div>
                                    <div class="col-md-10 mt-md-5 p-5 pt-0 pt-md-5">
                                        <p class="testimonial-content fs-4">
                                            Best Place to Design Your clothes. The box is simple you just got to throw
                                            everything you want to include and they will print it
                                        </p>
                                        <p class="text-black">- Joshima Lin</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-2">
                                        <iconify-icon icon="ri:double-quotes-l"
                                            class="quote-icon text-primary"></iconify-icon>
                                    </div>
                                    <div class="col-md-10 mt-md-5 p-5 pt-0 pt-md-5">
                                        <p class="testimonial-content fs-4">
                                            Loved it soo cool Best Place to Design Your clothes. The box is simple you just
                                            got to
                                            throw
                                            everything you want to include and they will print it
                                        </p>
                                        <p class="text-black">- Joshima Lin</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-2">
                                        <iconify-icon icon="ri:double-quotes-l"
                                            class="quote-icon text-primary"></iconify-icon>
                                    </div>
                                    <div class="col-md-10 mt-md-5 p-5 pt-0 pt-md-5">
                                        <p class="testimonial-content fs-4">
                                            Loved the result
                                        </p>
                                        <p class="text-black">- Joshima Lin</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        function increment(index) {
            let input = document.getElementById("quantity_" + index);
            input.value = parseInt(input.value) + 1;
        }

        function decrement(index) {
            let input = document.getElementById("quantity_" + index);
            if (input.value > input.min) {
                input.value = parseInt(input.value) - 1;
            }
        }
    </script>
@endsection
