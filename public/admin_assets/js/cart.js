$(document).ready(function () {
    $("#btn_save").click(function () {
        let order_id = $(this).attr("data-order-id");
        let status = $( `#status_${order_id} option:selected`).val();
        $.ajax({
            url: `http://127.0.0.1:8000/admin/cartManager/updateOrderStatus/${order_id}?status=${status}`,
            type: 'GET',
            success: function () {
                document.location.reload();
            },
            error: function (jqXHR, exception) {
                console.log(jqXHR.responseText);
            }
        })
    });
});