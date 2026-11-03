<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $product->name_uz }} &mdash; Pharmative</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<style>
    .btn-gradient {
        background: linear-gradient(45deg, #181a9e, #172496);
        border: none;
        color: #fff;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        padding: 10px 20px;
    }

    .btn-gradient:hover {
        background: linear-gradient(45deg, #1b1da8, #1ea085);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(24, 26, 158, 0.3);
    }

    .btn-gradient-outline {
        background: transparent;
        border: 2px solid #181a9e;
        color: #181a9e;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-gradient-outline:hover {
        background: linear-gradient(45deg, #181a9e, #172496);
        color: #fff;
        transform: translateY(-2px);
    }

    .gallery-main {
        aspect-ratio: 1 / 1;
        border-radius: 16px;
        overflow: hidden;
        background: #f6f1e7;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    #main-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .gallery-main:hover #main-image {
        transform: scale(1.04);
    }

    .gallery-thumbs {
        display: flex;
        gap: 10px;
    }

    .thumbnail-wrapper {
        width: 84px;
        height: 84px;
        padding: 0;
        border: 2px solid transparent;
        border-radius: 12px;
        overflow: hidden;
        background: #f6f1e7;
        cursor: pointer;
        opacity: 0.7;
        transition: all 0.2s ease;
    }

    .thumbnail-wrapper:hover,
    .thumbnail-wrapper.active {
        border-color: #181a9e;
        opacity: 1;
    }

    .thumbnail-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-brand {
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #b8892d;
        margin-bottom: 6px;
    }

    .product-heading {
        font-weight: 800;
        margin-bottom: 14px;
    }

    .total-price {
        display: inline-block;
        font-size: 28px;
        font-weight: 800;
        color: #181a9e;
    }

    .product-description {
        background: #faf7f1;
        border-left: 4px solid #b8892d;
        border-radius: 12px;
        padding: 18px 20px;
        line-height: 1.75;
        color: #444;
    }

    /* Download File Button Styles */
    .btn-download-file {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(45deg, #181a9e, #172496);
        color: #fff;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        margin-top: 10px;
    }

    .btn-download-file:hover {
        background: linear-gradient(45deg, #1b1da8, #1ea085);
        color: #fff;
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(24, 26, 158, 0.3);
    }

    .btn-download-file svg {
        width: 20px;
        height: 20px;
        flex-shrink: 0;
    }

    @media (max-width: 768px) {
        .btn-download-file {
            padding: 8px 16px;
            font-size: 14px;
            gap: 6px;
        }

        .btn-download-file svg {
            width: 18px;
            height: 18px;
        }
    }

    @media (max-width: 768px) {
        .thumbnail-wrapper {
            width: 64px;
            height: 64px;
        }

        .btn-download-file {
            padding: 7px 14px;
            font-size: 12px;
        }
    }
</style>

<body>
    @include('helpers.navbar')

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="/">Home</a> <span class="mx-2 mb-0">/</span>
                    <a href="/store">Store</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">{{ $product->{'name_' . app()->getLocale()} }}</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mr-auto mb-4 mb-md-0">
                    <div class="gallery-main mb-3">
                        <img id="main-image" src="{{ $product->image_url }}" alt="{{ $product->name_uz }}">
                    </div>

                    @if (count($product->gallery) > 1)
                        <div class="gallery-thumbs">
                            @foreach ($product->gallery as $i => $url)
                                <button type="button" class="thumbnail-wrapper {{ $i === 0 ? 'active' : '' }}">
                                    <img src="{{ $url }}" class="thumbnail-image" data-image="{{ $url }}"
                                        alt="{{ $product->name_uz }} {{ $i + 1 }}">
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="col-md-6">
                    <div class="product-brand">Sino Tib</div>
                    <h2 class="text-black product-heading">{{ $product->{'name_' . app()->getLocale()} }}</h2>

                    <div class="price-section mb-4">
                        <strong class="total-price">{{ number_format($product->price, 0, '.', ' ') }} uzs</strong>
                    </div>

                    @if ($product->{'description_' . app()->getLocale()})
                        <div class="product-description mb-4">
                            {!! nl2br(e($product->{'description_' . app()->getLocale()})) !!}
                        </div>
                    @endif

                    <form action="{{ route('cart.add', ['locale' => app()->getLocale(), 'id' => $product->id]) }}"
                        method="POST">
                        @csrf
                        <div class="mb-5">
                            <div class="input-group mb-3" style="max-width: 220px;">
                                <div class="input-group-prepend">
                                    <button class="btn btn-gradient-outline js-btn-minus"
                                        type="button">&minus;</button>
                                </div>
                                <input type="number" name="quantity" id="quantity-input"
                                    class="form-control text-center" value="1" min="1">
                                <div class="input-group-append">
                                    <button class="btn btn-gradient-outline js-btn-plus" type="button">&plus;</button>
                                </div>
                            </div>
                        </div>

                        <p>
                            <button type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-gradient">
                                {{ __('messages.add_to_cart') }}
                            </button>
                        </p>
                    </form>

                    <div class="mt-5">
                        <table class="table custom-table">
                            <tbody>
                                <tr>
                                    <td>{{ __('messages.single_product_name') }}</td>
                                    <td>{{ $product->{'name_' . app()->getLocale()} }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('messages.single_product_price') }}</td>
                                    <td class="unit-price-table">{{ number_format($product->price, 0, '.', ' ') }} uzs</td>
                                </tr>
                                <tr>
                                    <td>{{ __('messages.single_product_country') }}</td>
                                    <td>{{ $product->{'country_' . app()->getLocale()} }}</td>
                                </tr>
                                @if ($product->category)
                                    <tr>
                                        <td>Category</td>
                                        <td>{{ $product->category->{'name_' . app()->getLocale()} }}</td>
                                    </tr>
                                @endif
                                {{-- Download File Button - shows if product has a file --}}
                                @if ($product->file)
                                    <a href="{{ asset('storage/' . $product->file) }}" download
                                        class="btn-download-file" target="_blank">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M7 10L12 15L17 10" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M12 15V3" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        {{ __('messages.download_file') }}
                                    </a>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="site-footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="block-7 position-relative p-4 rounded" style="overflow: hidden;">
                        <div class="about-bg"
                            style="
                            position: absolute;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background: url('{{ asset('images/honey.png') }}') center/contain no-repeat;
                            opacity: 0.7;
                            z-index: 1;
                        ">
                        </div>
                        <div class="position-relative" style="z-index: 1;">
                            <h3 class="footer-heading mb-4">{{ __('messages.about_title') }}</h3>
                            <p>{{ __('messages.about_text') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
                    <h3 class="footer-heading mb-4">{{ __('messages.navigation') }}</h3>
                    <ul class="list-unstyled">
                        @foreach ($footer_categories as $category)
                            <li>
                                <a href="{{ route('store', app()->getLocale(), ['category_id' => $category->id]) }}">
                                    {{ $category->name_uz }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="block-5 mb-5">
                        <h3 class="footer-heading mb-4">{{ __('messages.contact_info') }}</h3>
                        <ul class="list-unstyled">
                            <li class="location">
                                <a href="https://www.google.com/maps/search/?api=1&query=Your+Address"
                                    target="_blank">
                                    {{ __('messages.address') }}
                                </a>
                            </li>
                            <li class="phone"><a href="tel:+998947836996">+998 94 783 69 96</a></li>
                            <li class="phone"><a href="tel:+998984446969">+998 98 444 69 69</a></li>
                            <li class="email"><a
                                    href="mailto:abdushukurtabiboriginal@gmail.com">abdushukurtabiboriginal@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            const unitPrice = parseFloat('{{ $product->price }}'.replace(/[^\d.-]/g, ''));

            function updateTotalPrice() {
                const quantity = parseInt($('#quantity-input').val()) || 1;
                const totalPrice = unitPrice * quantity;
                $('.total-price').text(totalPrice.toLocaleString() + ' uzs');
                $('.unit-price-table').text(totalPrice.toLocaleString() + ' uzs');
            }

            $('.js-btn-plus').on('click', function(e) {
                e.preventDefault();
                const quantityInput = $('#quantity-input');
                quantityInput.val(parseInt(quantityInput.val()) + 1);
                updateTotalPrice();
            });

            $('.js-btn-minus').on('click', function(e) {
                e.preventDefault();
                const quantityInput = $('#quantity-input');
                const currentQuantity = parseInt(quantityInput.val());
                if (currentQuantity > 1) quantityInput.val(currentQuantity - 1);
                updateTotalPrice();
            });

            $('#quantity-input').on('input', function() {
                if (parseInt($(this).val()) < 1 || isNaN($(this).val())) $(this).val(1);
                updateTotalPrice();
            });

            $('.thumbnail-wrapper').on('click', function() {
                const newImageSrc = $(this).find('.thumbnail-image').data('image');
                $('.thumbnail-wrapper').removeClass('active');
                $(this).addClass('active');
                $('#main-image').fadeOut(150, function() {
                    $(this).attr('src', newImageSrc).fadeIn(150);
                });
            });

            updateTotalPrice();
        });
    </script>
</body>

</html>
