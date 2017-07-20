<!-- sidebar menu -->
<?php
session_start();
error_reporting(0);
include('../connect/connection.php');


$records = $connection->prepare('SELECT * FROM users');
$records->execute();

while($row=$records->fetch(PDO::FETCH_ASSOC)){

  if($_SESSION['usertype']==$row['user_type']){

    echo '
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
    <h3 style="">Navigation Menu</h3>
    <ul class="nav side-menu">
    <li><a href="index.php"><i class="fa fa-list-alt"></i>Dashboard</a>
    </li>
    <li><a><i class="fa fa-pencil-square-o"></i> Masters <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">


    <li><a> Product Masters <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
    <li><a href="add_product.php">Add Product</a></li>
    <li><a href="update_product.php">Update Product</a></li>
    <li><a href="delete_product.php">Delete Product</a></li>
    </ul>

    <li><a> Category Masters <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
    <li><a href="add_category.php">Add Category</a></li>
    <li><a href="delete_category.php">Delete Category</a></li>
    </ul>

        <li><a> Hot Offers <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        <li><a href="add_hot_offer.php">Add Hot Offer</a></li>
        <li><a href="delete_hot_offer.php">Delete Hot Offer</a></li>
        </ul>
    </ul>

    <li><a><i class="fa fa-file-excel-o"></i> Reports <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">

    <li><a> Products <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
    <li><a href="view_product_ids.php">View Product Ids</a></li>
    <li><a href="view_stock_details.php">View Products</a></li>
    </ul>

    <li><a href="view_categories.php">View Categories</a></li>

    <li><a href="view_offers.php">View Offers</a></li>
    <li><a href="view_coupons.php">View Coupons</a></li>
    <li><a href="view_subscriptions.php">View Subscriptions</a></li>
    <li><a href="view_customer_support.php">View Customer Queries</a></li>

    </ul>
    </li>
    <li><a><i class="fa fa-pencil-square-o"></i> Web Content <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">

    <li><a> Pages <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
    <li><a href="update_about.php">Update About Us</a></li>
    <li><a href="update_events.php">Update Events</a></li>
    <li><a href="update_services.php">Update Services</a></li>
    </ul>

    <li><a> Policies <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
    <li><a href="privacy.php">Privacy</a></li>
    <li><a href="shipping.php">Shipping</a></li>
    <li><a href="refunds.php">Refunds</a></li>
    <li><a href="termsandconditions.php">Terms & Conditions</a></li>
    <li><a href="affiliates.php">Affiliates</a></li>
    <li><a href="faqs.php">FAQs</a></li>
    </ul>

    <li><a> Offers <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
    <li><a href="add_offer.php">Add Offer</a></li>
    <li><a href="delete_offer.php">Delete Offer</a></li>
    </ul>

    <li><a> Main Slider <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
    <li><a href="add_main_slider.php">Add Main Slider</a></li>
    <li><a href="delete_main_slider.php">Delete Main Slider</a></li>
    </ul>
    <li><a> Coupons <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
    <li><a href="add_coupon.php">Add Coupon</a></li>
    <li><a href="delete_coupon.php">Delete Coupon</a></li>
    </ul>
    </ul>


    <li><a><i class="fa fa-folder-o"></i> Transactions <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
    <li><a href="recent_orders.php">Recent Orders</a></li>
    <li><a href="all_orders.php">All Orders</a></li>

    <li><a> Order Status <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
    <li><a href="pending_orders.php">Pending</a></li>
    <li><a href="complete_orders.php">Complete</a></li>
    </ul>

    </ul>
    </li>


        <li><a><i class="fa fa-folder-o"></i> Web Basic Info <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        <li><a href="update_my_address.php">Update Address</a></li>
        <li><a href="update_my_contact.php">Update Contact No</a></li>
        <li><a href="update_my_email.php">Update Support Email</a></li>
        </ul>
        </li>

    <li><a><i class="fa fa-folder-o"></i> Accounts <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
    <li><a href="update_password.php">Update Password</a></li>
    <li><a href="update_my_profile.php">Update Admin Profile</a></li>
    </ul>
    </li>

    <li><a><i class="fa fa-lock"></i> Logout <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
    <li><a href="checksession.php">Confirm Logout</a></li>

    </ul>
    </li>

    </ul>
    </div>

    </div>
    <!-- /sidebar menu -->

    ';
    break;
  }
  else {

    echo '
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
    <h3 style="">Navigation Menu</h3>
    <ul class="nav side-menu">
    <li><a href="index.php"><i class="fa fa-list-alt"></i>Dashboard</a>
    </li>

    <li><a><i class="fa fa-file-excel-o"></i> Reports <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">

    <li><a> Products <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
    <li><a href="view_product_ids.php">View Product Ids</a></li>
    <li><a href="view_stock_details.php">View Products</a></li>
    </ul>

    <li><a href="view_categories.php">View Categories</a></li>
    <li><a href="view_subscriptions.php">View Subscriptions</a></li>
    <li><a href="view_offers.php">View Offers</a></li>
    <li><a href="view_coupons.php">View Coupons</a></li>
    <li><a href="view_customer_support.php">View Customer Queries</a></li>

    </ul>
    </li>

    <li><a><i class="fa fa-lock"></i> Logout <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
    <li><a href="checksession.php">Confirm Logout</a></li>

    </ul>
    </li>

    </ul>
    </div>

    </div>

    ';
    break;
  }
}
?>
