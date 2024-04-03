@extends('layouts.inc.front')

@section('title')
    Checkout
@endsection

@section('content')


    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> /
                <a href="">
                    Checkout
                </a>
        </div>
    </div>

    <div class="container mt-3">
        <form action="{{ url('place-order') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h6>Detalhes Basicos</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="Name">Nome *</label>
                                    <input type="text" class="form-control firstname" value="{{ Auth::user()->name }}"
                                        name="fname" placeholder="Entre o nome" required="true">
                                    <span id="fname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="Name">Apelido</label>
                                    <input type="text" class="form-control lastname" value="{{ Auth::user()->lname }}"
                                        name="lname" placeholder="Entre o apelido" required="true">
                                    <span id="lname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="Name">Email</label>
                                    <input type="text" class="form-control email" value="{{ Auth::user()->email }}"
                                        name="email" placeholder="Entre o email" required="true">
                                    <span id="email_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="Name">Telefone</label>
                                    <input type="text" class="form-control phone" value="{{ Auth::user()->phone }}"
                                        name="phone" placeholder="Entre o telefone" required="true" >
                                    <span id="phone_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="Name">Endereço 1</label>
                                    <input type="text" class="form-control address1" value="{{ Auth::user()->address1 }}"
                                        name="address1" placeholder="Entre o endereço 1" required="true">
                                    <span id="address1_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="Name">Endereço 2</label>
                                    <input type="text" class="form-control address2" value="{{ Auth::user()->address2 }}"
                                        name="address2" placeholder="Entre o endereço 2" required="true">
                                    <span id="address2_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="Name">Cidade</label>
                                    <input type="text" class="form-control city" value="{{ Auth::user()->city }}"
                                        name="city" placeholder="Entre a cidade" required="true">
                                    <span id="city_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="Name">Ilha</label>
                                    <input type="text" class="form-control island" value="{{ Auth::user()->state }}"
                                        name="island" placeholder="Entre a ilha" required="true">
                                    <span id="island_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="Name">País</label>
                                    <input type="text" class="form-control country" value="{{ Auth::user()->country }}"
                                        name="country" placeholder="Entre o país" required="true">
                                    <span id="country_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="Name">Codigo Postal</label>
                                    <input type="text" class="form-control pincode" value="{{ Auth::user()->pincode }}"
                                        name="pincode" placeholder="codigo postal" required="true">
                                    <span id="pincode_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h6>Detalhes do Pedido</h6>
                            <hr>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        @if ($cartitems->count() > 0)
                                            <th style="text-align:center">Nome</th>
                                            <th style="text-align:center">Data in</th>
                                            <th style="text-align:center">Data ter</th>
                                            <th style="text-align:center">Qtd</th>
                                            <th style="text-align:center">Preço</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0; @endphp
                                    @foreach ($cartitems as $item)
                                        <tr>
                                            @php $total += ($item->services->selling_price * $item->servc_qty) @endphp
                                            <td style="text-align:center">{{ $item->services->name }}</td>
                                            <td style="text-align:center">{{ date('d-m-Y', strtotime($item->checkin_date)) }}</td>
                                            <td style="text-align:center">{{ date('d-m-Y', strtotime($item->checkout_date)) }}</td>
                                            <td style="text-align:center">{{ $item->servc_qty }}</td>
                                            <td style="text-align:center">{{ $item->services->selling_price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h6 class="px-2">Total Geral<samp class="float-end">{{ $total }}$</samp>
                            </h6>
                            <hr>
                            <input type="hidden" name="payment_mode" value="DIR">
                            <button type="submit" class="btn btn-success w-100 mb-2">Pagar diretamente | DIR</button>
                            <!--<button type="button" class="btn btn-primary w-100 mb-2 razorpay_btn">Pagar com Razorpay</button>-->
                            <div id="paypal-button-container"></div>
                        @else
                            <h4 class="text-center">O seu carinho esta vazia</h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script
        src="https://www.paypal.com/sdk/js?client-id=AdLLRuh-WOmFJJyHEKDVWSlIcBojijptWC59Vevi97vkGfnzjetfqjJNAM0y9Y-bQcpihB3_MrPckT7X">
    </script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                // This function sets up the details of the transaction, including the amount and line item details.
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{ $total }}'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                // This function captures the funds from the transaction.
                return actions.order.capture().then(function(details) {


                    // This function shows a transaction success message to your buyer.
                    //alert('Transaction completed by ' + details.payer.name.given_name);

                    var firstname = $(".firstname").val();
                    var lastname = $(".lastname").val();
                    var email = $(".email").val();
                    var phone = $(".phone").val();
                    var address1 = $(".address1").val();
                    var address2 = $(".address2").val();
                    var city = $(".city").val();
                    var island = $(".island").val();
                    var country = $(".country").val();
                    var pincode = $(".pincode").val();

                    if (!firstname) {
                        fname_error = "Por favor preencha este campo";
                        $("#fname_error").html("");
                        $("#fname_error").html(fname_error);
                    } else {
                        fname_error = "";
                        $("#fname_error").html("");
                    }

                    $.ajax({
                        method: "POST",
                        url: "/place-order",
                        data: {
                            'fname': firstname,
                            'lname': lastname,
                            'email': email,
                            'phone': phone,
                            'address1': address1,
                            'address2': address2,
                            'city': city,
                            'island': island,
                            'country': country,
                            'pincode': pincode,
                            'payment_mode': "Pago com Paypal",
                            'payment_id': details.id,
                        },
                        success: function(response) {
                            swal(response.status)
                                .then((value) => {
                                    window.location.href = "/my-orders";
                                });
                        }
                    });
                });
            }
        }).render('#paypal-button-container');
        //This function displays payment buttons on your web page.
    </script>
@endsection
