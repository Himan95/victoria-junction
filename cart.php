

<?php

error_reporting(0);
session_start();
include('connect/connection.php');
date_default_timezone_set('Asia/Kolkata');

$order_id=mt_rand(100000, 999999);
$username=$_SESSION['username'];
$SESSION['order_id']=$order_id;

$prod_id=$_GET['item_id'];

$records1 = $connection->prepare('SELECT * FROM products WHERE prod_id=:prod_id');
$records1->bindParam(':prod_id',$prod_id);
$records1->execute();
$results1=$records1->fetch(PDO::FETCH_ASSOC);

/*

$username=$_SESSION['username'];
$SESSION['order_id']=$order_id;
$order_date=date('Y-m-d');
$order_time=date('h:i:s');
$prod_name=$results2['prod_name'];
$prod_price=$results2['prod_price'];
$prod_quantity=$results2['prod_quantity'];
$total= $results2['prod_price'];

$records2 = $connection->prepare('INSERT INTO user_cart(order_id,username,order_date,order_time,prod_name,prod_price,prod_quantity,prod_total) VALUES(:order_id,:username,:order_date,:order_time,:prod_name,:prod_price,:prod_quantity,:total)');
$records2->bindParam(':order_id',$order_id);
$records2->bindParam(':username',$username);
$records2->bindParam(':order_date',$order_date);
$records2->bindParam(':order_time',$order_time);
$records2->bindParam(':prod_name',$prod_name);
$records2->bindParam(':prod_price',$prod_price);
$records2->bindParam(':prod_quantity',$prod_quantity);
$records2->bindParam(':total',$total);
$records2->execute();

*/

if(isset($_POST['checkout'])){

  $_SESSION['tot_amount']=$_POST['tot'];
    echo "<script>alert('Redirecting to Billing Section! ')</script>";
  echo "<script>window.location.href='checkout.php';</script>";
}
?>


<html>
<head>
  <title>My Cart</title>
  <!-- for-mobile-apps -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Victoria Junction, Siliguri - Custom Cakes fro Every Occassion, Gluten, Dairy & Egg-Free Options Available
  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
  function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!-- //for-mobile-apps -->

  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  <!-- font-awesome icons -->
  <link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
  <!-- //font-awesome icons -->
  <!-- js -->
  <script src="js/jquery-1.11.1.min.js"></script>
  <!-- //js -->
  <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
  <!-- start-smoth-scrolling -->
  <script type="text/javascript" src="js/move-top.js"></script>
  <script type="text/javascript" src="js/easing.js"></script>

</head>
<style>
@import "compass/css3";
/* Global settings */
$color-border: #eee;
$color-label: #aaa;
$font-default: 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, sans-serif;
$font-bold: 'HelveticaNeue-Medium', 'Helvetica Neue Medium';


/* Global "table" column settings */
.product-image { float: left; width: 20%; }
.product-details { float: left; width: 37%; }
.product-price { float: left; width: 12%; }
.product-quantity { float: left; width: 10%; }
.product-removal { float: left; width: 9%; }
.product-line-price { float: left; width: 12%; text-align: right; }


/* This is used as the traditional .clearfix class */
.group:before,
.group:after {
  content: '';
  display: table;
}
.group:after {
  clear: both;
}
.group {
  zoom: 1;
}


/* Apply clearfix in a few places */
.shopping-cart, .column-labels, .product, .totals-item {
  @extend .group;
}


/* Apply dollar signs */
.product .product-price:before, .product .product-line-price:before, .totals-value:before {
  content: "Rs.  ";
}


/* Body/Header stuff */
body {
  padding: 0px 30px 30px 20px;
  font-family: $font-default;
  font-weight: 100;
}

h1 {
  margin: 0px auto;
  font-weight: 100;
}

label {
  color: $color-label;
}

.shopping-cart {
  margin: 0px auto;
}


/* Column headers */
.column-labels {

  label {

    padding-bottom: 15px;
    margin-bottom: 15px;
    border-bottom: 1px solid $color-border;
  }


  .product-image, .product-details, .product-removal {
    text-indent: -9999px;
  }
}


/* Product entries */
.product {

  margin-bottom: 20px;
  padding-bottom: 10px;
  border-bottom: 1px solid $color-border;


  .product-details {
    .product-title {
      margin-right: 20px;
      font-family: $font-bold;
    }
  }

  .product-quantity {
    input {
      width: 40px;

    }
  }

  .remove-product {
    border: 0;
    padding: 4px 8px;
    background-color: #c66;
    color: #fff;
    font-family: $font-bold;
    font-size: 12px;
    border-radius: 3px;
  }

  .remove-product:hover {
    background-color: #a44;
  }
}


/* Totals section */
.totals {
  .totals-item {
    float: right;
    clear: both;
    width: 100%;
    margin-bottom: 10px;

    label {
      float: left;
      clear: both;
      width: 79%;
      text-align: right;
    }

    .totals-value {
      float: right;
      width: 21%;
      text-align: right;
    }
  }

  .totals-item-total {
    font-family: $font-bold;
  }
}

.checkout {
  margin: 0px auto;
  background-color: #6b6;
  color: #fff;
  font-size: 25px;
  border-radius: 3px;
}

.checkout:hover {
  background-color: #494;
}

/* Make adjustments for tablet */
@media screen and (max-width: 650px) {

  .shopping-cart {
    margin: 0;
    padding-top: 20px;
    border-top: 1px solid $color-border;
  }

  .column-labels {
    display: none;
  }

  .product-details {
    float: none;
    margin-bottom: 10px;
    width: auto;
  }

  .product-price {
    clear: both;
    width: 70px;
  }

  .product-quantity {
    width: 100px;
    input {
      margin-left: 20px;
    }
  }

  .product-quantity:before {
    content: 'x';
  }

  .product-removal {
    width: auto;
  }

  .product-line-price {
    float: right;
    width: 70px;
  }

}


/* Make more adjustments for phone */
@media screen and (max-width: 350px) {

  .product-removal {
    float: right;
  }

  .product-line-price {
    float: right;
    clear: left;
    width: auto;
    margin-top: 10px;
  }

  .product .product-line-price:before {
    content: 'Item Total: $';
  }

  .totals {
    .totals-item {
      label {
        width: 60%;
      }

      .totals-value {
        width: 40%;
      }
    }
  }
}

</style>
<body>
<a style="margin:10px;font-size:22px; color:blue;" href="javascript:history.go(-1)">Back</a>

  <h1 style="font-weight:bold; text-align:center; margin-top:40px;">Shopping Cart</h1>
<center>
  <div style="margin-top:40px;" class="shopping-cart">

    <div class="column-labels">
      <label style="text-align:center; border: 1px solid; margin-bottom:40px;" class="product-details">Product Name </label>
      <label style="text-align:center; border: 1px solid; margin-bottom:40px;" class="product-price">Price</label>
      <label style="text-align:center; border: 1px solid; margin-bottom:40px;" class="product-quantity">Quantity</label>
      <label style="text-align:center; border: 1px solid; margin-bottom:40px;" class="product-removal">Remove</label>
      <label style="text-align:center; border: 1px solid; margin-bottom:40px;" class="product-line-price">Total</label>
    </div>

    <div class="product">
      <div class="product-details">
        <div style="text-align:center;" class="product-title"><?php echo $results1['prod_name']; ?></div>
      </div>
      <div style="text-align:center;" class="product-price"><?php echo $results1['prod_price']; ?></div>
      <div style="text-align:center;" class="product-quantity">
        <input style="border:none;text-align:center;" type="number" value="1" min="1"/>
      </div>
      <div style="text-align:center;" class="product-removal">
        <button class="remove-product">Remove</button>
      </div>
      <div style="text-align:center;" class="product-line-price"><?php echo $results1['prod_price']; ?></div>
    </div>
  </div>

<br><br><br>
<br>
</center>

    <div style="float:right;" class="totals">
      <div style="margin-bottom:10px;" class="totals-item">
        <label  style="margin-right:50px;">Subtotal</label>
        <div class="totals-value" id="cart-subtotal"><?php echo $results1['prod_price']; ?></div>
      </div>
      <?php

        $delivery=50;
        $gst=$results1['prod_price'] * 0.05;
       ?>
      <div style="margin-bottom:10px;" class="totals-item">
        <label  style="margin-right:50px;">GST (5%)</label>
        <div class="totals-value" id="cart-tax"><?php echo $gst; ?></div>
      </div>
      <div style="margin-bottom:10px;" class="totals-item">
        <label  style="margin-right:50px;">Delivery</label>
        <div class="totals-value" id="cart-shipping"><?php echo $delivery;?></div>
      </div>
      <div class="totals-item totals-item-total">
        <label  style="margin-right:50px;">Grand Total</label>
        <div class="totals-value" id="cart-total"><?php echo $results1['prod_price'] + $delivery+ $gst;  ?></div>

      </div>
    </div>
    <div>
      <form action="cart.php" method="POST">
        <input type="hidden" value="<?php echo $results1['prod_price'] + $delivery+ $gst; ?>" name="tot" id="mytext"/>
    <input style="float:left; margin-top:200px;" type="submit" name="checkout"  value="Checkout" class="checkout"/>
  </form>
</div>
  </div>


  <script>

  /* Set rates + misc */
  var taxRate = 0.05;
  var shippingRate = 50.00;
  var fadeTime = 300;


  /* Assign actions */
  $('.product-quantity input').change( function() {
    updateQuantity(this);
  });

  $('.product-removal button').click( function() {
    removeItem(this);
  });

  /* Recalculate cart */
  function recalculateCart()
  {
    var subtotal = 0;

    /* Sum up row totals */
    $('.product').each(function () {
      subtotal += parseFloat($(this).children('.product-line-price').text());
    });

    /* Calculate totals */
    var tax = subtotal * taxRate;
    var shipping = (subtotal > 0 ? shippingRate : 0);
    var total = subtotal + tax + shipping;
    document.getElementById("mytext").value = total;
    /* Update totals display */
    $('.totals-value').fadeOut(fadeTime, function() {
      $('#cart-subtotal').html(subtotal.toFixed(2));
      $('#cart-tax').html(tax.toFixed(2));
      $('#cart-shipping').html(shipping.toFixed(2));
      $('#cart-total').html(total.toFixed(2));

            if(total == 0){
        $('.checkout').fadeOut(fadeTime);
      }else{
        $('.checkout').fadeIn(fadeTime);
      }
      $('.totals-value').fadeIn(fadeTime);
    });
  }


  /* Update quantity */
  function updateQuantity(quantityInput)
  {
    /* Calculate line price */
    var productRow = $(quantityInput).parent().parent();
    var price = parseFloat(productRow.children('.product-price').text());
    var quantity = $(quantityInput).val();
    var linePrice = price * quantity;

    /* Update line price display and recalc cart totals */
    productRow.children('.product-line-price').each(function () {
      $(this).fadeOut(fadeTime, function() {
        $(this).text(linePrice.toFixed(2));
        recalculateCart();
        $(this).fadeIn(fadeTime);
      });
    });
  }


  /* Remove item from cart */
  function removeItem(removeButton)
  {
    /* Remove row from DOM and recalc cart total */
    var productRow = $(removeButton).parent().parent();
    productRow.slideUp(fadeTime, function() {
      productRow.remove();
      recalculateCart();
    });
  }
  </script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>
