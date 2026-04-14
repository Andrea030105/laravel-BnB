@extends('layouts.admin')
@section('content')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="card-title text-capitalize text-danger"><strong>{{ $sponsor->name }}</strong></h3>
                        <div class="d-flex justify-content-center">
                            <p class="card-text mx-2"><strong>Durata dello Sponsor:</strong></p>
                            <p>{{ $sponsor->hours }} h</p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <p class="card-text mx-2"><strong>Costo dello Sponsor:</strong></p>
                            <p>{{ $sponsor->price }} <i class="fa-solid fa-euro-sign"></i></p>
                        </div>
                    </div>
                    <div class="card-footer">

                        <form id="payment-form-{{ $sponsor->id }}" action="{{ route('admin.sponsors.store') }}"
                            method="POST">
                            @csrf
                            <input type="hidden" name="apartment_id" value="{{ $apartment->id }}">
                            <input type="hidden" name="sponsor_id" value="{{ $sponsor->id }}">
                            <input type="hidden" name="payment_method_nonce" id="nonce-{{ $sponsor->id }}">

                            <div id="dropin-{{ $sponsor->id }}"></div>

                            <button type="submit" class="btn btn-primary mt-2">Paga e Attiva</button>
                        </form>

                        <script src="https://js.braintreegateway.com/web/dropin/1.43.0/js/dropin.min.js"></script>

                        <script>
                            braintree.dropin.create({
                                authorization: '{{ $clientToken }}',
                                container: '#dropin-{{ $sponsor->id }}'
                            }, function(err, instance) {
                                document.getElementById('payment-form-{{ $sponsor->id }}')
                                    .addEventListener('submit', function(e) {
                                        e.preventDefault();
                                        instance.requestPaymentMethod(function(err, payload) {
                                            document.getElementById('nonce-{{ $sponsor->id }}').value = payload.nonce;
                                            e.target.submit();
                                        });
                                    });
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
