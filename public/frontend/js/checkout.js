$(document).ready(function () {
    $(".razorpay_btn").click(function (e) {
        e.preventDefault();

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

        if (!lastname) {
            lname_error = "Por favor preencha este campo"; 
            $("#lname_error").html("");
            $("#lname_error").html(lname_error);
        } else {
            lname_error = "";
            $("#lname_error").html("");
        }

        if (!email) {
            email_error = "Por favor preencha este campo";
            $("#email_error").html("");
            $("#email_error").html(email_error);
        } else {
            email_error = "";
            $("#email_error").html("");
        }

        if (!phone) {
            phone_error = "Por favor preencha este campo";
            $("#phone_error").html("");
            $("#phone_error").html(phone_error);
        } else {
            phone_error = "";
            $("#phone_error").html("");
        }

        if (!address1) {
            address1_error = "Por favor preencha este campo";
            $("#address1_error").html("");
            $("#address1_error").html(address1_error);
        } else {
            address1_error = "";
            $("#address1_error").html("");
        }

        if (!address2) {
            address2_error = "Por favor preencha este campo";
            $("#address2_error").html("");
            $("#address2_error").html(address2_error);
        } else {
            address2_error = "";
            $("#address2_error").html("");
        }

        if (!city) {
            city_error = "Por favor preencha este campo";
            $("#city_error").html("");
            $("#city_error").html(city_error);
        } else {
            city_error = "";
            $("#city_error").html("");
        }

        if (!island) {
            island_error = "Por favor preencha este campo";
            $("#island_error").html("");
            $("#island_error").html(island_error);
        } else {
            island_error = "";
            $("#island_error").html("");
        }

        if (!country) {
            country_error = "Por favor preencha este campo";
            $("#country_error").html("");
            $("#country_error").html(country_error);
        } else {
            country_error = "";
            $("#country_error").html("");
        }

        if (!pincode) {
            pincode_error = "Por favor preencha este campo";
            $("#pincode_error").html("");
            $("#pincode_error").html(pincode_error);
        } else {
            pincode_error = "";
            $("#pincode_error").html("");
        }

        if (
            fname_error != "" ||
            lname_error != "" ||
            email_error != "" ||
            phone_error != "" ||
            address1_error != "" ||
            address2_error != "" ||
            city_error != "" ||
            island_error != "" ||
            country_error != "" ||
            pincode_error != ""
        ) {
            return false;
        } else {
            var data = {
                'firstname': firstname,
                'lastname': lastname,
                'email': email,
                'phone': phone,
                'address1': address1,
                'address2': address2,
                'city': city,
                'island': island,
                'country': country,
                'pincode': pincode,
            };

            $.ajax({
                method: "POST",
                url: "/proceed-to-pay",
                data: data,
                success: function (response) {
                    /* alert(response.total_price) */
                    var options = {
                        "key": "rzp_test_m8m4f4w4POqz4L", // Enter the Key ID generated from the Dashboard
                        "amount": response.total_price*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "currency": "USD",
                        "name": response.firstname+' '+response.lastname,
                        "description": "Muito obrigado pela escolha",
                        "image": "https://example.com/your_logo",
                        //"order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                        "handler": function (responsea){
                            //alert(response.razorpay_payment_id);
                            $.ajax({
                                method: "POST",
                                url: "/place-order",
                                data: {
                                    'fname':response.firstname,
                                    'lname':response.lastname,
                                    'email':response.email,
                                    'phone':response.phone,
                                    'address1':response.address1,
                                    'address2':response.address2,
                                    'city':response.city,
                                    'island':response.island,
                                    'country':response.country,
                                    'pincode':response.pincode,
                                    'payment_mode': "Pago com Razorpay",
                                    'payment_id':responsea.razorpay_payment_id, 
                                },
                                success: function(responseb) {
                                    swal(responseb.status)
                                    .then((value) => {
                                        window.location.href = "/my-orders";
                                      });
                                    
                                }
                            });
                        },
                        "prefill": {
                            "name": response.firstname+' '+response.lastname,
                            "email": response.email,
                            "contact": response.phone
                        },
                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                        rzp1.open();
                }
            });
        }
    });
});
