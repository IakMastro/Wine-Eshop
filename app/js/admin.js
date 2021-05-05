$(document).ready(function() {
    $.ajax({
        url: 'php/getOrders.php',
        type: 'get',
        data: { admin: 'admin' }
    });
});