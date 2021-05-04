$(document).ready(function() {
    $("#emfialomenoBtn").click(function() {
        addToBasket("emfialomeno");
    });

    $("#xumaBtn").click(function() {
        addToBasket("xuma");
    });
});

function addToBasket(productType) {
    console.log(productType);
    $.ajax({
        url: 'php/addToBasket.php',
        type: 'post',
        data: {
            productType: productType,
        },
        success: function(res) {
            if (res == 1) {
                alert("Το προϊόν επιτυχώς προσθέθηκε στο καλάθι");
            } else {
                alert("Unexpected error: try again later");
            }
        }
    })
}