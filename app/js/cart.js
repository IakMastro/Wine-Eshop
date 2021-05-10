$(document).ready(function() {
    updateAmounts();

    $("#order").click(function() {
        $.ajax({
            url: 'php/makeOrder.php',
            type: 'post',
            data: {
                final_cost: $("#final_price").text(),
                payment: $("input:radio[name = 'paymentOptions']:checked").val()
            },
            success: function(res) {
                $('#cartTable > tbody > tr').each(function() {
                    $.ajax({
                        url: 'php/addOrderDetail.php',
                        type: 'post',
                        data: {
                            product_id: $(this).find('.id').text(),
                            litre: $(this).find('.qty').text(),
                            cost: $(this).find('.amount').text()
                        },
                        success: function(res) {}
                    });
                });

                alert("Η παραγγελία σας ολοκληρώθηκε επιτυχώς!");

                window.location = "php/clearCart.php";
            }
        })
    })
})

function updateAmounts() {
    var sum = 0.0;

    $('#cartTable > tbody > tr').each(function() {
        var qty = $(this).find('.qty').text();
        var price = $(this).find('.price').text();
        var amount = (qty * price);
        $(this).find('.amount').html(amount);

        sum += amount;
    });

    $("#final_price").html(sum);
}