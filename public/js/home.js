$(document).ready(function () {
  $(".btn_add_to_cart").click(function () {
    let id = $(this).attr("data-product-id");
    let quantity = $("#product_quantity").val();
    if(quantity == null) quantity = 1;

      $.ajax({ 
        url: `http://127.0.0.1:8000/cart/add_to_cart/${id}?quantity=${quantity}`,
        type: 'GET', 
        success: function(data){
          alert('Response ' + JSON.stringify(data));
          if (data == 1) {
            let message = new MessageOnTop("Sách đã được thêm vào giỏ hàng");
            message.Create(message.CONFIG.SUCCESS_BOOTSTRAP_CLASS);
            let sd = $(".cartnumber").text().replace(/[^0-9]/gi, '');
            var num = parseInt(sd) + 1;
            $(".cartnumber").text(num);
            return;
          }
          if (data == -3) {
            let message = new MessageOnTop("Tối đa 5 cuốn sách trong một lần order");
            message.Create(message.CONFIG.ALERT_BOOTSTRAP_CLASS);
            return;
          }
        },
        error: function (jqXHR, exception) {
          console.log(jqXHR.responseText);
        }
      })
    }
  )

  $(".btn_increament").click(function () {
    let id = $(this).attr("data-product-id");
    let quantity = 1;

      $.ajax({
        url: `http://127.0.0.1:8000/cart/add_to_cart/${id}?quantity=${quantity}`,
        type: 'GET', 
        success: function(data){
          document.location.reload();
          // alert('Response ' + JSON.stringify(data));
          // console.log($('a'));
          if (data == 1) {
            let message = new MessageOnTop("Sách đã được thêm vào giỏ hàng");
            message.Create(message.CONFIG.SUCCESS_BOOTSTRAP_CLASS);
            let sd = $(".cartnumber").text().replace(/[^0-9]/gi, '');
            var num = parseInt(sd) + 1;
            $(".cartnumber").text(num);
            return;
          }
          if (data == -3) {
            let message = new MessageOnTop("Tối đa 5 cuốn sách trong một lần order");
            message.Create(message.CONFIG.ALERT_BOOTSTRAP_CLASS);
            return;
          }
        },
        error: function (jqXHR, exception) {
          console.log(jqXHR.responseText);
        }
      })
    }
  )

  $(".btn_decreament").click(function () {
    let id = $(this).attr("data-product-id");
    let quantity = -1;
      $.ajax({
        url: `http://127.0.0.1:8000/cart/add_to_cart/${id}?quantity=${quantity}`,
        type: 'GET', 
        success: function(data){
          document.location.reload();
          if (data == 1) {
            let message = new MessageOnTop("Sách đã được thêm vào giỏ hàng");
            message.Create(message.CONFIG.SUCCESS_BOOTSTRAP_CLASS);
            let sd = $(".cartnumber").text().replace(/[^0-9]/gi, '');
            var num = parseInt(sd) + 1;
            $(".cartnumber").text(num);
            return;
          }
          if (data == -3) {
            let message = new MessageOnTop("Tối đa 5 cuốn sách trong một lần order");
            message.Create(message.CONFIG.ALERT_BOOTSTRAP_CLASS);
            return;
          }
        },
        error: function (jqXHR, exception) {
          console.log(jqXHR.responseText);
        }
      })
    }
  )

  $(".btn_delete").click(function () {
    let id = $(this).attr("data-product-id");
    $.ajax({
      url: `http://127.0.0.1:8000/cart/delete/${id}`,
      type: 'GET', 
      success: function(data){
        alert(JSON.stringify(data));
        document.location.reload();
      }
    })
  })

});

function MessageOnTop(message){
	this.message = message;
}

MessageOnTop.prototype.CONFIG = {
	ALERT_BOOTSTRAP_BASIC: "alert alert-dismissible",
	ALERT_BOOTSTRAP_CLASS: "alert-warning",
	DANGER_BOOTSTRAP_CLASS: "alert-danger",
	SUCCESS_BOOTSTRAP_CLASS:"alert-success",
	timeToExist: 2000,
	effectTime:500,
	usingEffect:true
}

MessageOnTop.prototype.Create = function(type){
	var div = document.createElement("div");

	$(div).addClass(this.CONFIG.ALERT_BOOTSTRAP_BASIC + " " +  type);

	$(div).addClass("fixed-top");

	$(div).html(this.message);

	var closeButton = document.createElement("button");
	$(closeButton).attr("type","button");
	$(closeButton).addClass("close");
	$(closeButton).attr("data-dismiss","alert");
	$(closeButton).html("&times;");

	$(div).append(closeButton);

	$('body').append(div);

	var that = this;

	setTimeout(function(){
		that.Destroy(div);
	},this.CONFIG.timeToExist);
}

MessageOnTop.prototype.Destroy = function(messageContainer){
	if(this.CONFIG.usingEffect){
		$(messageContainer).fadeOut(this.CONFIG.effectTime,function(){
			$(messageContainer).remove();
		});
	}else{
		$(messageContainer).remove();
	}
}


