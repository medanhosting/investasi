function modalCheckout(){
    // Set invest amount
    // var invest = $("input[name=amount]:checked").val();
    var invest = $("#amount").val();

    while(true)
    if(invest.includes('.')){
        invest = invest.replace('.', '');
    }
    else{
        break;
    }

    var notComplete = $("#notCompletedData").val();
    $("#checkout-notCompletedData").val(notComplete);
    if(notComplete === '0'){
        var KTP = $("#KTP").val();
        $("#checkout-KTP").val(KTP);
        var citizen = $("#citizen").val();
        $("#checkout-citizen").val(citizen);
        var address = $("#address-home").val();
        $("#checkout-address").val(address);
        var city = $("#city").val();
        $("#checkout-city").val(city);
        var province = $("#province").val();
        $("#checkout-province").val(province);
        var zip = $("#zip").val();
        $("#checkout-zip").val(zip);
    }

    // alert(invest);

    if(invest%250000 === 0 && invest >= 500000){
        $(".error-div").hide();
        $(".error-div-wallet").hide();

        var investStr = addCommas(invest);
        $("#checkout-invest-amount").html(investStr);
        $("#checkout-invest-amount-input").val(invest);

        var adminFee = 0;

        // Set admin fee
        var payment = $("input[name=payment]:checked").val();
        $("#checkout-payment-method-input").val(payment);
        if(payment === "credit_card"){
            var investFeeInt = (parseInt(invest) / 100) * 3;
            $("#checkout-admin-fee-input").val(investFeeInt);
            adminFee += investFeeInt;
            investStr = addCommas(investFeeInt);
            $("#checkout-admin-fee").html(investStr);

            $("#checkout-payment-method").html("Kartu Kredit")

            // Set total invest amount
            var total = parseInt(invest) + adminFee;
            $("#checkout-total-invest").html(addCommas(total));

            $("#modal-checkout-confirm").modal();
        }
        else if(payment === "bank_transfer"){
            adminFee += 4000;
            $("#checkout-admin-fee-input").val(4000);
            $("#checkout-admin-fee").html("Rp 4.000");
            $("#checkout-payment-method").html("Bank Transfer")

            // Set total invest amount
            var total = parseInt(invest) + adminFee;
            $("#checkout-total-invest").html(addCommas(total));

            $("#modal-checkout-confirm").modal();
        }
        else if(payment === "wallet"){

            var walletVal = $("#wallet").val();
            if(walletVal < invest){
                $(".error-div-wallet").show();
            }
            else{
                $("#checkout-admin-fee-input").val(0);
                $("#checkout-admin-fee").html("GRATIS");
                $("#checkout-payment-method").html("Dompet")

                // Set total invest amount
                var total = parseInt(invest) + adminFee;
                $("#checkout-total-invest").html(addCommas(total));

                $("#modal-checkout-confirm").modal();
            }
        }

    }
    else{
        $(".error-div").show();
    }
}

function addCommas(nStr) {
    nStr += '';
    x = nStr.split(',');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return "Rp " + x1 + x2;
}

$('input[type=radio][name=amount]').change(function() {
    var amount = parseInt(this.value);
    var totalAmount = amount + 4000;
    var totalAmountStr = addCommas(totalAmount);
    $("#wallet-deposit-amount").html(addCommas(amount));
    $("#wallet-deposit-cost").html(totalAmountStr);
});

// function onSelectTopUp(e){
//     if(e.value == "0"){
//         $("#custom_amount_section").show();
//     }
//     else{
//         $("#custom_amount_section").hide();
//     }
// }

function modalWalletDeposit(){
    $("#modal_wallet_deposit").modal();
}

$(function(){
    $('#subscribe-form').on('submit',function(e){

        e.preventDefault();
        var name = '';
        if($('#name').length > 0){
            name = $('#name').val();
        }
        var email = '';
        if($('#email').length > 0){
            email = $('#email').val();
        }

        $.ajax({
            url     : urlLink,
            method  : 'POST',
            data    : {
                // _token: CSRF_TOKEN,
                name  : name,
                email : email
            },
            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success : function(response){
                if(response.success === true){
                    $('#modal-success').modal();
                }
                else{
                    alert("There's something wrong!");
                }
            },
            error:function(){
                alert('error');
            }
        });
    });
});