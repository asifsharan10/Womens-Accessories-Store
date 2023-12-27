$(document).ready(function () {
  var prod_id = sessionStorage.getItem("data_product");
  var multiPrice = sessionStorage.getItem("data_product_MultiPrice");
  var billmod = sessionStorage.getItem("data_product_billing_model");
  //alert('billmod ' + billmod);
  //get the choosen product is ss or trl or cntnty
  if (billmod == 4 || billmod == 5 || billmod == 6 || billmod == 7) {
    if (billmod == 4) {
      sessionStorage.setItem("data_sale_type", 2);
      var getid = "#pdt_type";
    }
    if (billmod == 5) {
      sessionStorage.setItem("data_sale_type", 1);
      var getid = "#pdt_type_5";
    }
    if (billmod == 6) {
      sessionStorage.setItem("data_sale_type", 2);
      var getid = "#pdt_type6";
    }
    if (billmod == 7) {
      sessionStorage.setItem("data_sale_type", 1);
      var getid = "#pdt_type7";
    }
    //need to retreive which type of product is selected on page load and showing the plus minus button or dropdown
    var firstpdt = $(getid + " option:first").val();
    if (firstpdt == 1 && multiPrice == "yes") {
      $.ajax({
        url: "bp_config/site-info.php",
        type: "POST",
        data: {
          type: 1,
          prod_id: prod_id,
        },
        cache: false,
        success: function (result) {
          // console.log(result);
          $("<div class='qty-select' id='multi-bill-if-ss'></div>").insertAfter(
            ".qty-col"
          );
          $(".qty-select").html(result);
          $(".qty-col").hide();
        },
      });
      //above ajax was firing multiple times so that more than 1 dropdown list is coming. so need to fire ajax one time
      // $('.selectbox').one('click', clickHandler);
    } else {
      $(".qty-col").show();
      $(".qty-select").hide();
    }

    // var isexectued;
    // for bill model 4,5,6,7 get the price and pass it to the next page

    $(".selectbox").change(function () {
      var model_id = $(this).val();
      if (model_id == 1) {
        sessionStorage.setItem("data_sale_type", 1);
        sessionStorage.setItem("data_product_type", 1);
      }
      if (model_id == 2) {
        sessionStorage.setItem("data_sale_type", 2);
        sessionStorage.setItem("data_product_type", "");
      }
      if (model_id == 3) {
        sessionStorage.setItem("data_sale_type", 3);
        sessionStorage.setItem("data_product_type", "");
      }

      $.ajax({
        url: "bp_config/site-info.php",
        type: "POST",
        data: {
          type: 4,
          model_id: model_id,
          prod_id: prod_id,
          multiPrice: multiPrice,
        },
        cache: false,
        success: function (data) {
          var response = JSON.parse(data);
          var pdt_price = parseFloat(response.pdt_price);
          var shipping_price = parseFloat(response.shipping_price);
          var totalPrice = pdt_price + shipping_price;
          $("span#subtotal_price").html(pdt_price.toFixed(2));
          $("span#shipping_price").html(shipping_price.toFixed(2));
          $("span#single_pdt_price").html(totalPrice.toFixed(2));
          sessionStorage.setItem("data_product_price", pdt_price);
          sessionStorage.setItem("data_product_shipping", shipping_price);
          sessionStorage.setItem("data_total_price", totalPrice);
        },
      });

      //in bill mod 4,5,6,7 if ss product selected and multiprc is set to yes then fetch the qyt dropdown
      if (model_id == 1 && multiPrice == "yes") {
        $.ajax({
          url: "bp_config/site-info.php",
          type: "POST",
          data: {
            type: 1,
            // model_id: model_id,
            // multiPrice: multiPrice,
            prod_id: prod_id,
          },
          cache: false,
          success: function (result) {
            // console.log(result);
            $(
              "<div class='qty-select' id='multi-bill-if-ss'></div>"
            ).insertAfter(".qty-col");
            $(".qty-select").html(result);
            $(".qty-col").hide();
          },
        });
        //above ajax was firing multiple times so that more than 1 dropdown list is coming. so need to fire ajax one time
        $(".selectbox").one("click", function () {
          // clickHandler;
          console.log("clickHandler");
        });
      } else {
        $(".qty-col").show();
        $(".qty-select").hide();
      }
      //set if the product is ss or trl or cntnty
      if (model_id == 1) {
        sessionStorage.setItem("data_sale_type", 1);
      }
      if (model_id == 2) {
        sessionStorage.setItem("data_sale_type", 2);
      }
      if (model_id == 3) {
        sessionStorage.setItem("data_sale_type", 3);
      }
    });
    // });
  }

  //set if the product is ss or trl or cntnty
  if (billmod == 1) {
    sessionStorage.setItem("data_sale_type", 1);
  } else if (billmod == 2 || billmod == 8) {
    sessionStorage.setItem("data_sale_type", 2);
  } else if (billmod == 3) {
    sessionStorage.setItem("data_sale_type", 3);
  }
});
