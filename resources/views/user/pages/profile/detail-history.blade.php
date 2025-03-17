@extends('user.layouts.app')

@section('title', 'Detail History')

@push('style')
    <link rel="stylesheet" href="{{ asset('template/assets/css/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/profile.css') }}">
@endpush

@section('main')

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="fs-1 fw-bolder text-center">Transaction History</h2>
                @foreach ($order->orderItems as $orderItem)
                    <div class="row py-3 border-bottom  ">
                        <div class=" col-12 d-flex flex-row ">
                            <div class="cart-image me-3 ">
                                <img class="" src="/storage/{{$orderItem->path}}" height="auto" alt="Product Image">
                            </div>
                            <div class="cart-detail ">
                                <p class="red m-0 fw-information-bold cart-title">{{ $orderItem->name }}</p>
                                <p class="m-0 lh-sm cart-price">Amount: <span class="red">{{ $orderItem->quantity }} pcs</span></p>
                                <p class="m-0 lh-sm cart-price">Total: <span class="red">Rp{{ number_format($orderItem->price , 0, ',', '.') }}</span></p>
                            </div>
                        </div>
                    </div>

                @endforeach

                <div class="checkout-form mt-4">
                    <h2 class="fs-4 fw-bolder red text-start">Transaction Details</h2>
                    <div class="">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-group text-start mb-4">
                                    <label>Order Number</label>
                                    <span class="form-control d-flex align-items-center">{{ $order->order_number }}</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group text-start mb-4">
                                    <label>Status</label>
                                    <span class="form-control d-flex align-items-center">{{ ucwords($order->status) }}</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group text-start mb-4">
                                    <label>Transaction Status</label>
                                    <span class="form-control d-flex align-items-center">{{ ucwords( $order->transaction_status )}}</span>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group text-start mb-4">
                                    <label>Nama Lengkap</label>
                                    <span class="form-control d-flex align-items-center">{{ $order->name }}</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group text-start mb-4">
                                    <label>Phone Number</label>
                                    <span class="form-control d-flex align-items-center">{{ $order->phone_number }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="form-group text-start mb-4">
                                    <label>Province</label>
                                    <span class="form-control d-flex align-items-center">{{ $order->province }}</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group text-start mb-4">
                                    <label>City</label>
                                    <span class="form-control d-flex align-items-center">{{ $order->city }}</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group text-start mb-4">
                                    <label>District</label>
                                    <span class="form-control d-flex align-items-center">{{ $order->district }}</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group text-start mb-4">
                                    <label>Village</label>
                                    <span class="form-control d-flex align-items-center">{{ $order->village }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group text-start mb-4">
                                    <label>Detail Address </label>
                                    <textarea readonly>{{ $order->detail_address }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group text-start mb-4">
                                    <label>Tracking Number</label>
                                    <span class="form-control d-flex align-items-center">{{ $order->tracking_number ?? '-'}}</span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group text-start mb-4">
                                    <label class="text-white">Track Order</label>
                                    @if ($order->status != 'arrived' && $order->transaction_status != 'cancel'  && $order->transaction_status != 'expire')
                                        <button type="button" class="btn btn-lg color-custom-red text-white w-100 tracking-button " data-id="{{ $order->id }}" data-bs-toggle="modal" data-bs-target="#tracking-modal">
                                            Track
                                        </button>
                                    @endif

                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            {{-- RIGHT SIDE --}}

        </div>
    </div>

    <div class="modal fade" id="tracking-modal" tabindex="-1" aria-labelledby="tracking-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Track Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="activities">

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')

    <script>
        function timestampToDatetime(time) {
            return new Date(time).toLocaleString('id-ID', { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' }).replace(',', '');
        }

        $(document).ready(function() {
            $('.tracking-button').on('click', function(){
                $('#tracking-modal').modal('show');

                var id = $(this).data('id');
                var activities = "";

                $(".activities").html(activities);

                $.ajax({
                    url: '/track-order/' + id,
                    type: 'GET',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // console.log(response.data.history);

                        response.data.history.forEach(activity => {
                            $(".activities").append(`

                            <div class="tracking-activity d-flex justify-content-start align-items-center">
                                <div class="dot-order me-2">

                                </div>
                                <div class="activity-detail">
                                    <div class="mb-0">
                                        <span class="text-job">${timestampToDatetime(activity.updated_at)}</span>

                                    </div>
                                    <p class="m-0">${activity.note}</p>
                                    ${activity.status == 'delivered' ? '<button class="btn color-custom-red text-white mt-2 finish-order" data-id="' + id + '">Finish Order</button>' : '' }
                                </div>
                            </div>

                        `);
                        });
                    }
                });

            })

            $('#tracking-modal').on('click', '.finish-order', function(){
                var id = $(this).data('id');

                console.log('click');


                $.ajax({
                    url: '/track-order/finish/' + id,
                    type: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            })
        });
    </script>

@endpush
