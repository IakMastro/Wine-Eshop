$(document).ready(function() {
    $.ajax({
        url: 'php/getOrders.php',
        type: 'get',
        data: { admin: 'admin' }
    });
});

$(document).ready(function() {
    $('#orders > tbody > tr').each(function() {
        var orderId = $(this).find('.order').text();
        $(this).find('#approveBtn').click(function() {
            $.ajax({
                url: 'php/approveOrder.php',
                type: 'get',
                data: {
                    order_id: orderId
                },
                success: function(res) {
                    alert("Η παραγγελία εγκρίθηκε!");
                }
            });
        });
    });
})