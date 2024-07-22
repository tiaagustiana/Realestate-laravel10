@php
    $property = App\Models\Property::where('status', '1')->where('hot', '1')->limit(3)->get();
@endphp

<section class="deals-section sec-pad">
    <div class="auto-container">
        <div class="sec-title">
            <h5>Hot Property</h5>
            <h2>Our Best Deals</h2>
        </div>

        <div class="row clearfix">

            @foreach ($property as $item)

            @endforeach
            <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <img src="{{ asset($item->thumbnail) }}" alt="">
                            </figure>
                            <div class="batch"><i class="icon-11"></i></div>
                            <span class="category">Hot</span>
                        </div>
                        <div class="lower-content">
                            <div class="author-info clearfix">
                                <div class="author pull-left">
                                    @if ($item->agent_id == Null)
                                    <figure class="author-thumb">
                                        <img src="{{ url('upload/Leonxiety.png') }}" alt="">
                                    </figure>
                                    <h6>Admin</h6>
                                    @else
                                    <figure class="author-thumb"><img
                                            src="{{ (!empty($item->user->photo)) ? url('upload/agent-images'.$item->user->photo) : url('upload/no-image.jpg') }}" alt="">
                                    </figure>
                                    <h6>{{ $item->user->name }}</h6>
                                    @endif
                                </div>
                                <div class="buy-btn pull-right"><a href="property-details.html">For {{ $item->property_status }}</a></div>
                            </div>
                            <div class="title-text">
                                <h4><a href="{{ url('property/details'.$item->id.'/'.$item->property_slug) }}">{{ $item->property_name }}</a></h4>
                            </div>
                            <div class="price-box clearfix">
                                <div class="price-info pull-left">
                                    <h6>Start From</h6>
                                    <h4>{{ $item->lowest_price }}</h4>
                                </div>
                                {{-- sampai sini dlu tgl 10/07/2024 --}}
                                <ul class="other-option pull-right clearfix">
                                    <li><a href="property-details.html"><i class="icon-12"></i></a></li>
                                    <li><a href="property-details.html"><i class="icon-13"></i></a></li>
                                </ul>
                            </div>

                            <ul class="more-details clearfix">
                                <li><i class="icon-14"></i>3 Beds</li>
                                <li><i class="icon-15"></i>2 Baths</li>
                                <li><i class="icon-16"></i>600 Sq Ft</li>
                            </ul>
                            <div class="btn-box">
                                <a href="property-details.html" class="theme-btn btn-two">See Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('frontend/assets/images/feature/feature-1.jpg') }}"
                                    alt=""></figure>
                            <div class="batch"><i class="icon-11"></i></div>
                            <span class="category">Featured</span>
                        </div>
                        <div class="lower-content">
                            <div class="author-info clearfix">
                                <div class="author pull-left">
                                    <figure class="author-thumb"><img
                                            src="{{ asset('frontend/assets/images/feature/author-1.jpg') }}" alt="">
                                    </figure>
                                    <h6>Michael Bean</h6>
                                </div>
                                <div class="buy-btn pull-right"><a href="property-details.html">For Buy</a></div>
                            </div>
                            <div class="title-text">
                                <h4><a href="property-details.html">Villa on Grand Avenue</a></h4>
                            </div>
                            <div class="price-box clearfix">
                                <div class="price-info pull-left">
                                    <h6>Start From</h6>
                                    <h4>$30,000.00</h4>
                                </div>
                                <ul class="other-option pull-right clearfix">
                                    <li><a href="property-details.html"><i class="icon-12"></i></a></li>
                                    <li><a href="property-details.html"><i class="icon-13"></i></a></li>
                                </ul>
                            </div>

                            <ul class="more-details clearfix">
                                <li><i class="icon-14"></i>3 Beds</li>
                                <li><i class="icon-15"></i>2 Baths</li>
                                <li><i class="icon-16"></i>600 Sq Ft</li>
                            </ul>
                            <div class="btn-box"><a href="property-details.html" class="theme-btn btn-two">See
                                    Details</a></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('frontend/assets/images/feature/feature-1.jpg') }}"
                                    alt=""></figure>
                            <div class="batch"><i class="icon-11"></i></div>
                            <span class="category">Featured</span>
                        </div>
                        <div class="lower-content">
                            <div class="author-info clearfix">
                                <div class="author pull-left">
                                    <figure class="author-thumb"><img
                                            src="{{ asset('frontend/assets/images/feature/author-1.jpg') }}" alt="">
                                    </figure>
                                    <h6>Michael Bean</h6>
                                </div>
                                <div class="buy-btn pull-right"><a href="property-details.html">For Buy</a></div>
                            </div>
                            <div class="title-text">
                                <h4><a href="property-details.html">Villa on Grand Avenue</a></h4>
                            </div>
                            <div class="price-box clearfix">
                                <div class="price-info pull-left">
                                    <h6>Start From</h6>
                                    <h4>$30,000.00</h4>
                                </div>
                                <ul class="other-option pull-right clearfix">
                                    <li><a href="property-details.html"><i class="icon-12"></i></a></li>
                                    <li><a href="property-details.html"><i class="icon-13"></i></a></li>
                                </ul>
                            </div>

                            <ul class="more-details clearfix">
                                <li><i class="icon-14"></i>3 Beds</li>
                                <li><i class="icon-15"></i>2 Baths</li>
                                <li><i class="icon-16"></i>600 Sq Ft</li>
                            </ul>
                            <div class="btn-box"><a href="property-details.html" class="theme-btn btn-two">See
                                    Details</a></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
