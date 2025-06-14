<div class="row justify-content-center shopping">
                @php
                    $colors = ['red', 'green', 'yellow', 'purple', 'blue', 'pink'];
                @endphp

                @for ($i=0; $i<4; $i++)
                    @php
                        $bgColor = $colors[$i % count($colors)];
                    @endphp
                    <div class="col-md-6 col-lg-3 ">
                        <div class="products product-background-{{ $bgColor }}">
                            <img src="{{ asset('template/assets/img/shop/1.png') }}" alt="" class="">
                            <a href="{{ route('detail-product') }}" class='details'>
                                <span>Detail</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                        <p class="judul">Mainan MECO Hot Shot Marvel Viper Mainan</p>
                    </div>
                @endfor

            </div>
