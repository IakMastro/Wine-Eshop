$(document).ready(function() {
    $('#orders > tbody > tr').each(function() {
        var orderId = $(this).find('.order').text()
        $(this).find('#detailsBtn').click(function() {
            $.ajax({
                url: 'php/getOrderDetails.php',
                type: 'get',
                data: {
                    order_id: orderId
                },
                success: function(res) {
                    // window.location = "order_details.php ";
                    $('.modal').modal('show');
                }
            });
        });
    });
});