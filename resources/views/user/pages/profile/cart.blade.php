@extends('user.layouts.app')

@section('title', 'Cart')

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
                <h2>My Cart</h2>
                <div class="container right-side ">

                    {{-- CART ITEM --}}
                    @for ($i=0; $i<5; $i++)
                        <div class="row py-3 border-bottom  ">
                            <div class=" col-10 col-md-9 d-flex flex-row ">
                                <div class="cart-image me-3 ">
                                    <img class="" src="https://cdn.firstcry.com/education/2022/11/06094158/Toy-Names-For-Kids.jpg" height="auto" alt="">
                                </div>
                                <div class="cart-detail ">
                                    <p class="red m-0 fw-information-bold cart-title">EMCO Super Dough EMCO Super Dough EMCO Super Dough EMCO Super Dough EMCO Super Dough EMCO Super Dough EMCO Super Dough EMCO Super Dough</p>
                                    <p class="m-0 lh-sm cart-price">Rp150.000</p>
                                    <div class="delete-btn-2 gap-1 mt-2">
                                        <i class="fal fa-trash-alt red"></i>
                                        <p class="m-0 red btn-text">Delete from cart</p>
                                    </div>
                                </div>
                            </div>

                            <div class="cart-quantity col-2 col-md-3 gap-1">
                                <button class="btn change align-self-center red rounded-pill align-items-center d-flex "><i class="far fa-minus"></i></button>
                                <input name="cart-quantity" type="number" value="1" min="1" step="1">
                                <button class="btn change align-self-center red rounded-pill align-items-center d-flex "><i class="far fa-plus"></i></button>
                            </div>
                        </div>
                    @endfor
                    {{-- CART ITEM --}}

                    {{-- <div class="cart-item pb-3 border-bottom d-flex w-100 mt-4">
                        <img src="{{asset ('template/assets/img/shop/1.png')}}" width="100px" height="auto" alt="">
                        <div class="col">
                            <p class="red fs-5 m-0 fw-information-bold">EMCO Super Dough</p>
                            <div class="row">
                                <div class="col-auto desc">
                                    <p class="m-0 lh-sm fs-6">Category: <span class="red">Green</span></p>
                                    <p class="m-0 lh-sm fs-6">Amount: <span class="red">2 pcs</span></p>
                                </div>
                                <div class="col-auto ms-3">
                                    <p class="m-0 lh-sm fs-6 text-center">Total Price</p>
                                    <p class="m-0 lh-sm fs-6 text-center red">RP.150.000,-</p>
                                </div>
                            </div>
                        </div>
                        <div class="manipulate d-flex justify-content-center align-item-center gap-1">
                            <a href="" class="btn change align-self-center red rounded-pill align-items-center d-flex"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M17 18a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2M1 2h3.27l.94 2H20a1 1 0 0 1 1 1c0 .17-.05.34-.12.5l-3.58 6.47c-.34.61-1 1.03-1.75 1.03H8.1l-.9 1.63l-.03.12a.25.25 0 0 0 .25.25H19v2H7a2 2 0 0 1-2-2c0-.35.09-.68.24-.96l1.36-2.45L3 4H1zm6 16a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2m9-7l2.78-5H6.14l2.36 5z"/></svg> <span class="ms-1">Change your order</span></a>
                            <a href="" class="btn change align-self-center red rounded-pill align-items-center d-flex delete-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3"/></svg><span class="ms-1">Delete from cart</span></a>
                        </div>
                    </div> --}}

                </div>

            </div>
        </div>

    </div>


@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".delete-btn-2").forEach(button => {
            button.addEventListener("click", function (event) {
                event.preventDefault(); // Mencegah reload halaman jika tombol berupa link

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            "Deleted!",
                            "Your item has been removed.",
                            "success"
                        );
                        let cartItem = this.closest(".cart-item"); // Cari elemen terdekat dengan class "cart-item"
                        if (cartItem) {
                            cartItem.remove(); // Hapus elemen dari DOM
                        }
                    }
                });
            });
        });
    });
</script>
@endpush
