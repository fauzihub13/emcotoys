@extends('user.layouts.app')

@section('title', 'History')

@push('style')
    <link rel="stylesheet" href="{{ asset ('template/assets/css/profile.css')}}">
@endpush

@section('main')

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 ">
                @include('user.components.sidebar')
            </div>
            <div class="col-lg-9">
                <h2>History</h2>
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible show fade">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                @elseif (session('error'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="w-100 d-flex justify-content-center">
                    <p class="btn actived option w-100  order-onprocess">On process</p>
                    <p class="btn option w-100 order-finish">Finished</p>
                    <p class="btn option w-100 order-cancel">Canceled</p>
                </div>

                {{-- CART ITEM --}}
                <div class="order-onprocess-content">
                    @if (count($ordersOnProcess) > 0)
                        @foreach ($ordersOnProcess as $orderOnProcess)
                            <div class="row py-3 border-bottom  ">
                                <div class="col-12 col-md-9 d-flex flex-row justify-content-between align-items-center h-auto">
                                    <div class="cart-info d-inline-flex">
                                        <div class="cart-image me-3">
                                            <img class="" src="/storage/{{$orderOnProcess->orderItems[0]->path ?? ''}}" height="auto" alt="">
                                        </div>
                                        <div class="cart-detail">
                                            <div class="detail-btn color-custom-red gap-1 mb-1">
                                                <p class="m-0 red btn-text text-white">{{ ucfirst($orderOnProcess->transaction_status) }}</p>
                                            </div>
                                            <p class="red m-0 fw-information-bold cart-title">{{ $orderOnProcess->order_number }}</p>
                                            <p class="m-0 lh-sm cart-price">Amount: <span class="red">{{ $orderOnProcess->orderItems->sum('quantity') }} pcs</span></p>
                                            <p class="m-0 lh-sm cart-price">Total: <span class="red">Rp{{ number_format($orderOnProcess->gross_amount, 0, ',', '.') }}</span></p>
                                        </div>
                                    </div>
                                    <div class="detail-btn gap-1 mobile-detail-order me-0 flex-shrink-1" onclick="window.location.href='/history/{{ $orderOnProcess->order_number }}';">
                                        <i class="far fa-eye red red"></i>
                                        <p class="m-0 red btn-text">Order detail</p>
                                    </div>
                                </div>

                                <div class="cart-quantity detail-order col-4 col-md-3 gap-1" onclick="window.location.href='/history/{{ $orderOnProcess->order_number }}';">
                                    <div class="detail-btn gap-1 mt-2">
                                        <i class="far fa-eye red"></i>
                                        <p class="m-0 red btn-text">Order detail</p>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @else
                        <div class=" text-custom-grey text-center ">No transaction history found.</div>
                    @endif

                </div>

                <div class="order-finish-content">
                    @if (count($ordersFinish)>0)
                        @foreach ($ordersFinish as $orderFinish)
                            <div class="row py-3 border-bottom  ">
                                <div class="col-12 col-md-9 d-flex flex-row justify-content-between align-items-center h-auto">
                                    <div class="cart-info d-inline-flex">
                                        <div class="cart-image me-3 ">
                                            <img class="" src="/storage/{{$orderFinish->orderItems[0]->path ?? ''}}" height="auto" alt="Product Image">
                                        </div>
                                        <div class="cart-detail ">
                                            <div class="detail-btn color-custom-red gap-1 mb-1">
                                                <p class="m-0 red btn-text text-white">{{ ucfirst($orderFinish->status) }}</p>
                                            </div>
                                            <p class="red m-0 fw-information-bold cart-title">{{ $orderFinish->order_number }}</p>
                                            <p class="m-0 lh-sm cart-price">Amount: <span class="red">{{ $orderFinish->orderItems->sum('quantity') }} pcs</span></p>
                                            <p class="m-0 lh-sm cart-price">Total: <span class="red">Rp{{ number_format($orderFinish->gross_amount, 0, ',', '.') }}</span></p>
                                        </div>
                                    </div>
                                    <div class="detail-btn gap-1 mobile-detail-order me-0 flex-shrink-1" onclick="window.location.href='/history/{{ $orderFinish->order_number }}';">
                                        <i class="far fa-eye red red"></i>
                                        <p class="m-0 red btn-text">Order detail</p>
                                    </div>

                                </div>

                                <div class="cart-quantity detail-order col-4 col-md-3 gap-1" onclick="window.location.href='/history/{{ $orderFinish->order_number }}';">
                                    <div class="detail-btn gap-1 mt-2">
                                        <i class="far fa-eye red"></i>
                                        <p class="m-0 red btn-text">Order detail</p>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @else
                        <div class=" text-custom-grey text-center ">No transaction history found.</div>
                    @endif
                </div>

                <div class="order-cancel-content">
                    @if (count($ordersCancel)>0)
                        @foreach ($ordersCancel as $orderCancel)
                            <div class="row py-3 border-bottom  ">
                                <div class="col-12 col-md-9 d-flex flex-row justify-content-between align-items-center h-auto">
                                    <div class="cart-info d-inline-flex">
                                        <div class="cart-image me-3 ">
                                            <img class="" src="/storage/{{$orderCancel->orderItems[0]->path ?? ''}}" height="auto" alt="Product Image">
                                        </div>
                                        <div class="cart-detail ">
                                            <div class="detail-btn color-custom-red gap-1 mb-1">
                                                <p class="m-0 red btn-text text-white">Canceled</p>
                                            </div>
                                            <p class="red m-0 fw-information-bold cart-title">{{ $orderCancel->order_number }}</p>
                                            <p class="m-0 lh-sm cart-price">Amount: <span class="red">{{ $orderCancel->orderItems->sum('quantity') }} pcs</span></p>
                                            <p class="m-0 lh-sm cart-price">Total: <span class="red">Rp{{ number_format($orderCancel->gross_amount, 0, ',', '.') }}</span></p>
                                        </div>
                                    </div>
                                    <div class="detail-btn gap-1 mobile-detail-order me-0 flex-shrink-1" onclick="window.location.href='/history/{{ $orderCancel->order_number }}';">
                                        <i class="far fa-eye red red"></i>
                                        <p class="m-0 red btn-text">Order detail</p>
                                    </div>

                                </div>

                                <div class="cart-quantity detail-order col-4 col-md-3 gap-1" onclick="window.location.href='/history/{{ $orderCancel->order_number }}';">
                                    <div class="detail-btn gap-1 mt-2">
                                        <i class="far fa-eye red"></i>
                                        <p class="m-0 red btn-text">Order detail</p>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @else
                        <div class=" text-custom-grey text-center ">No transaction history found.</div>
                    @endif
                </div>

            </div>
        </div>

    </div>


@endsection

@push('script')
    <script>
        $(document).ready(function(){
            $('.order-finish-content').hide();
            $('.order-cancel-content').hide();
            $('.order-onprocess').addClass('actived');

            $('.order-onprocess').click(function(){
                $('.order-finish-content').hide();
                $('.order-cancel-content').hide();
                $('.order-onprocess-content').show();

                $('.order-finish').removeClass('actived');
                $('.order-cancel').removeClass('actived');
                $(this).addClass('actived');
            });

            $('.order-finish').click(function(){
                $('.order-onprocess-content').hide();
                $('.order-cancel-content').hide();
                $('.order-finish-content').show();

                $('.order-onprocess').removeClass('actived');
                $('.order-cancel').removeClass('actived');

                $(this).addClass('actived');
            });
            $('.order-cancel').click(function(){
                $('.order-onprocess-content').hide();
                $('.order-finish-content').hide();
                $('.order-cancel-content').show();

                $('.order-finish').removeClass('actived');
                $('.order-onprocess').removeClass('actived');
                $(this).addClass('actived');
            });
        });
    </script>



@endpush
