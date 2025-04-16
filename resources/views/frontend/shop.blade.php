@extends('layouts.frontend')
@section('container')
    <section id="banner-2 bg-primary" class="my-3">
        <div class="container p-5 text-center">
            <h1>You Can </h1>
            <h1>Customize your Own Product </h1>

        </div>
    </section>
    <section id="clothing" class="my-5 overflow-hidden">
        <div class="container pb-5">
            <div class="section-header text-center mb-4">
                <h2 class="display-3 fw-normal">Products</h2>
                <div class="secondary-font text-primary text-uppercase mb-3 fs-4">
                    View our products
                </div>
            </div>

            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                            <a href="{{ asset($product->front_img) }}" target="_blank">
                                <img src="{{ asset($product->front_img) }}" class="img-fluid w-100 object-fit-cover"
                                    style="height: 220px;" alt="Product image">
                            </a>
                            <div class="card-body bg-light py-3 px-4">
                                <h5 class="card-title fw-semibold text-dark mb-2">{{ $product->name }}</h5>
                                <p class="text-primary fw-bold fs-5 mb-3">{{ $product->price }}</p>

                                <div class="d-flex flex-column gap-2">
                                    <a href="{{ route('customize.prod', $product->id) }}"
                                        class="btn btn-outline-primary w-100 rounded-pill">
                                        <i class="fa fa-pen me-2"></i>Customize
                                    </a>
                                    <button type="button" class="btn btn-primary w-100 rounded-pill" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $product->id }}">
                                        <i class="fa fa-cart-plus me-2"></i>Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                        <img src="{{ asset($product->front_img) }}" class="img-fluid rounded-4"
                                            alt="image" width="100%" height="300px" /></a>

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

                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                    <form action="{{ route('carts.store') }}" method="POST" enctype="multipart/form-data"
                                        class="pb-2 my-2">
                                        @csrf
                                        <input type="hidden" name="color" id="selected-color">
                                        <input type="hidden" name="size" id="selected-size">
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
                                        <input type="number" name="product_id" value="{{ $product->id }}" readonly
                                            style="display: none;">
                                        <button type="submit" class="btn btn-secondary" title="Add to cart"><i
                                                class="fa-solid fa-cart-shopping"></i></button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- / products-carousel -->
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

    <script>
        function selectOption(element, type, value) {
            // Deselect all options of the same type
            document.querySelectorAll(`.${type}-option`).forEach(option => {
                option.style.border = '1px solid #ced4da'; // Reset border
                option.style.backgroundColor = type === 'size' ? '#f8f9fa' : option.style.backgroundColor;
            });

            // Highlight the selected option
            element.style.border = '2px solid #007bff';
            if (type === 'size') {
                element.style.backgroundColor = '#007bff';
                element.style.color = '#fff';
            }

            // Set the hidden input value
            document.getElementById(`selected-${type}`).value = value;
        }
    </script>
@endsection
