@extends('user.layouts.app')

@section('title', 'Payment')

@push('style')
    <link rel="stylesheet" href="{{ asset ('template/assets/css/profile.css')}}">
    <script type="text/javascript"
      src="{{ Config::get('app.is_production') ? Config::get('app.midtrans_snap_js_production') : Config::get('app.midtrans_snap_js_sandbox') }}"
      data-client-key="{{ Config::get('app.midtrans_client_key') }}"></script>
@endpush

@section('main')

    <div class="container py-5 ">
        <div class="row d-flex justify-content-center">

            <div class="col-12 col-lg-10 text-center">
                <h2>Payment</h2>
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
                <div class="container right-side border-top form-text mb-4 mt-4">
                    <p class="title text-danger fs-5 fw-normal mb-0">Total Amount to Pay</p>
                    <p class="title text-danger fs-5 fw-normal mb-5">Rp{{ number_format($totalPayment, 0, ',', '.') }}</p>
                    @if ($isPaid === false && !($transactionStatus == 'expire' || $transactionStatus == 'cancel'))
                        <button id="pay-button" type="button" class="btn btn-lg color-custom-red text-white w-100 mb-4" >Pay Now</button>
                        <p class="text-secondary mb-0">By proceeding with this payment, you acknowledge and agree to the applicable terms and conditions.</p>
                    @else
                        <a class="btn btn-lg color-custom-red text-white w-100 mb-4" href="{{ route('history') }}" >Back</a>
                        <p class="text-secondary mb-0">This order has already been successfully paid.</p>
                    @endif

                </div>

            </div>
        </div>

    </div>


@endsection

@push('script')
    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{ $snapToken }}');
        // customer will be redirected after completing payment pop-up
      });
    </script>
@endpush
