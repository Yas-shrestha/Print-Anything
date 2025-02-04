@extends('layouts.frontend')
@section('container')
    <div class="container">
        <h1>Search Result</h1>
        <section class="product-section">
            <h1>Product</h1>
            @forelse ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 com-12 mb-3">
                    <div class="swiper-slide">

                        <div class="card position-relative">
                            <a href="{{ asset($product->front_img) }}" target="_blank">
                                <img src="{{ asset($product->front_img) }}" class="img-fluid rounded-4" alt="image" /></a>
                            <div class="card-body p-0">
                                <h3 class="card-title pt-4 m-0">{{ $product->name }}</h3>
                                <div class="card-text">

                                    <h3 class="secondary-font text-primary">{{ $product->price }}</h3>

                                    <div class="row gap-1">
                                        <div class="col-4"> <a href="{{ route('customize.prod', $product->id) }}"
                                                class="btn btn-light me-3  px-4 py-3 border-0 rounded-3">
                                                Customize</a>
                                        </div>
                                        <div class="col-7">
                                            <button type="button"
                                                class="btn btn-secondary me-3  px-4 py-3 border-0 rounded-3"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal{{ $product->id }}">
                                                Add to cart
                                            </button>
                                        </div>
                                        <!-- Button trigger modal -->


                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $product->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog        ">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            {{ $product->name }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <a href="{{ asset($product->front_img) }}" target="_blank">
                                                            <img src="{{ asset($product->front_img) }}"
                                                                class="img-fluid rounded-4" alt="image" width="100%"
                                                                height="300px" /></a>

                                                        <div class="mb-3">
                                                            <label for="color" class="form-label">Select
                                                                Color:</label>
                                                            <div class="d-flex flex-wrap">
                                                                @php
                                                                    $colors = json_decode($product->color, true); // Decode the JSON string into an array
                                                                @endphp
                                                                @if (is_array($colors) && count($colors) > 0)
                                                                    <div class="d-flex flex-wrap">
                                                                        @foreach ($colors as $color)
                                                                            <div class="color-option me-2 mb-2"
                                                                                style="width: 40px; height: 40px; background-color: {{ $color }}; border: 2px solid transparent; border-radius: 4px; cursor: pointer;"
                                                                                onclick="selectOption(this, 'color', '{{ $color }}')">
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                @else
                                                                    <p>No colors available.</p>
                                                                @endif
                                                            </div>

                                                        </div>

                                                        <!-- Size Selection -->
                                                        <div class="mb-3">
                                                            <label for="size" class="form-label">Select
                                                                Size:</label>
                                                            <div class="d-flex flex-wrap">
                                                                @php
                                                                    $sizes = json_decode($product->size, true); // Decode the JSON string into an array
                                                                @endphp
                                                                @if (is_array($sizes))
                                                                    <div class="d-flex flex-wrap">
                                                                        @foreach ($sizes as $size)
                                                                            <div class="size-option me-2 mb-2"
                                                                                style="padding: 8px 12px; background-color: #f8f9fa; border: 1px solid #ced4da; border-radius: 4px; cursor: pointer;"
                                                                                onclick="selectOption(this, 'size', '{{ $size }}')">
                                                                                {{ strtoupper($size) }}
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                @else
                                                                    <p>No colors available.</p>
                                                                @endif
                                                            </div>

                                                        </div>

                                                        {!! $product->description !!}
                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>

                                                        <form action="{{ route('carts.store') }}" method="POST"
                                                            enctype="multipart/form-data" class="pb-2 my-2">
                                                            @csrf
                                                            <input type="hidden" name="color" id="selected-color">
                                                            <input type="hidden" name="size" id="selected-size">
                                                            <button type="button" class="btn btn-link px-2"
                                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                            <input type="number" name="quantity" min="1"
                                                                max="20" style="width: 40px" value="1">
                                                            <button type="button" class="btn btn-link px-2"
                                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                            <input type="number" name="product_id"
                                                                value="{{ $product->id }}" readonly
                                                                style="display: none;">
                                                            <button type="submit" class="btn btn-secondary"
                                                                title="Add to cart"><i
                                                                    class="fa-solid fa-cart-shopping"></i></button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-danger">No products found.</div>
            @endforelse
        </section>
        <section class="custom-prod-section">
            <h1>Customized Product</h1>
            @forelse ($customizedProducts as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card shadow">
                        <img src="{{ asset($product->products->front_img) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted ">Customization-Charge : Rs
                                {{ $product->customization_charge }}</h6>
                            <div class="d-flex gap-2 W-100">
                                @if ($product->color || $product->size)
                                    @if ($product->color)
                                        <div
                                            style="display: inline-block; padding: 10px; background-color: {{ $product->color }}; color: #fff; border-radius: 4px;">
                                            Color: {{ ucfirst($product->color) }}
                                        </div>
                                    @endif
                                    @if ($product->size)
                                        <div
                                            style="display: inline-block; padding: 10px; background-color: #007bff; color: #fff; border-radius: 4px;">
                                            Size: {{ ucfirst($product->size) }}
                                        </div>
                                    @endif
                                @endif
                            </div>
                            <div class="my-2">
                                <a href="{{ route('custom.view', $product->id) }}" class="btn btn-primary">View
                                    Customized
                                    Prod</a>
                                <form action="{{ route('carts.store') }}" method="POST" enctype="multipart/form-data"
                                    class="pb-2 my-2">
                                    @csrf
                                    <input type="hidden" name="color" id="color" value="{{ $product->color }}">
                                    <input type="hidden" name="size" id="size" value="{{ $product->size }}">
                                    <button type="button" class="btn btn-link px-2"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <input type="number" name="quantity" min="1" max="20"
                                        style="width: 40px" value="1">
                                    <button type="button" class="btn btn-link px-2"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <input type="number" name="customProd_id" value="{{ $product->id }}" readonly
                                        style="display: none;">
                                    <button type="submit" class="btn btn-secondary" title="Add to cart"><i
                                            class="fa-solid fa-cart-shopping"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-danger">No products found.</div>
            @endforelse
        </section>

    </div>
@endsection
