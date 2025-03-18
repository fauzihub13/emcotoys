@extends('admin.layouts.app')

@section('title', 'Edit Transaction')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/extensions/choices.js/public/assets/styles/choices.css') }}">
@endpush

@section('main')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Order</h3>
                    <p class="text-subtitle text-muted">A page where users can edit order</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('order.index') }}">Order</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12">

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible show fade">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    @elseif (session('error'))
                        <div class="alert alert-danger alert-dismissible show fade">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <p class="form-control">{{ $order->name }}</p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Order Number</label>
                                        <p class="form-control">{{ $order->order_number }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Order Status</label>
                                        <p class="form-control">{{ ucwords($order->status) }}</p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Transaction Status</label>
                                        <p class="form-control">{{ ucwords($order->transaction_status) }}</p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Transaction Time</label>
                                        <p class="form-control">{{ $order->created_at->format('d F Y') }}</p>
                                    </div>
                                </div>
                            </div>

                            <p class="fw-semibold">Products</p>

                            @foreach ($order->orderItems as $orderItem )
                                <div class="d-flex flex-column justify-content-between mb-2 pb-2 border-bottom">
                                    <div class="d-flex align-items-center">
                                        <div class="mini-product-image">
                                            <img src="{{ asset('storage/'.$orderItem->path) }}" alt="Face 1">
                                        </div>
                                        <div class="d-flex flex-column ms-2">
                                            <p class="m-0">{{ $orderItem->name }}</p>
                                            <p class="m-0 d-flex align-items-center">{{ $orderItem->quantity }} x &nbsp; <span class=""> Rp{{ number_format($orderItem->price, 0, ',', '.') }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Gross Amount</label>
                                        <p class="form-control">Rp{{ number_format($order->gross_amount, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Shipping Rate</label>
                                        <p class="form-control">Rp{{ number_format($order->shipping_cost, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Payment Method</label>
                                        <p class="form-control">{{ ucwords($order->payment_method ?? '-') }}</p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Shipping Courier</label>
                                        <p class="form-control">{{ ucwords($order->courier) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-sm-8">
                                    <form action="" method="POST" id="updateTrackingNumber">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Tracking Number </label>
                                            @if ($order->status != 'arrived')
                                            @endif
                                            <input class="form-control @error('tracking_number') is-invalid @enderror"
                                                type="text"
                                                name='tracking_number'
                                                placeholder="Tracking number"
                                                value="{{ $order->tracking_number }}" {{ $order->status == 'arrived' ? 'readonly' : '' }}>
                                            @error('tracking_number')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </form>

                                </div>
                                <div class="col-sm-4 d-flex">
                                    @if ($order->status != 'arrived')
                                        <div class="form-group mt-4 me-2">
                                            <button type="submit" class="btn btn-primary" form="updateTrackingNumber">Save</button>
                                        </div>
                                    @endif
                                    <div class="form-group mt-4">
                                        <button type="button" class="btn btn-primary tracking-button" data-bs-toggle="modal"
                                            data-bs-target="#trackingModal" data-id="{{ $order->id }}">
                                            Track
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!--scrolling content Modal -->
    <div class="modal fade" id="trackingModal" tabindex="-1" role="dialog"
        aria-labelledby="trackingModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Track Order</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="activities">

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script src="{{ asset ('assets/admin/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset ('assets/admin/static/js/pages/form-element-select.js') }}"></script>
    <script src="{{ asset ('assets/admin/extensions/jquery/jquery.min.js') }}"></script>

    <script>
        function timestampToDatetime(time) {
            return new Date(time).toLocaleString('id-ID', { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' }).replace(',', '');
        }

        $(document).ready(function() {

            $('.tracking-button').on('click', function(){
                $('#trackingModal').modal('show');

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
                        if(response.success) {
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

                                        </div>
                                    </div>
                                `);
                            });
                        } else {
                           $(".activities").append(`
                                <p>Not valid tracking number</p>
                            `);
                        }

                    },
                    error: function (xhr) {
                        console.log('Waduh error');
                    },
                });

            })

        });
    </script>
@endpush
