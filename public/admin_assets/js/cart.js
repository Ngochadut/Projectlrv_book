$(document).ready(function () {
    $(".btn_save").click(function (event) {
        
        let order_id = $(this).attr("data-order-id");
        let status = $( `#status_${order_id} option:selected`).val();
        $.ajax({
            url: `http://127.0.0.1:8000/admin/cartManager/updateOrderStatus`,
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                order_id, 
                status
            },
            dataType: 'JSON',
            success: function (data) {
                // alert()
                console.log(data);
            },
            error: function (jqXHR, exception) {
                console.log(jqXHR.responseText);
            }
        })
    });
});