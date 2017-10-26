function modalCheckout(){
    // Set invest amount
    var invest = $("input[name=amount]:checked").val();
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
    }
    else if(payment === "bank_transfer"){
        adminFee += 4000;
        $("#checkout-admin-fee-input").val(4000);
        $("#checkout-admin-fee").html("Rp 4.000");
        $("#checkout-payment-method").html("Akun Virtual")
    }
    else if(payment === "wallet"){
        $("#checkout-admin-fee-input").val(0);
        $("#checkout-admin-fee").html("GRATIS");
        $("#checkout-payment-method").html("Dompet")
    }

    // Set total invest amount
    var total = parseInt(invest) + adminFee;
    $("#checkout-total-invest").html(addCommas(total));

    $("#modal-checkout-confirm").modal();
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
