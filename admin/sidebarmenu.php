<!-- sidebar menu -->
<?php
session_start();
error_reporting(0);

?>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3 style="">Navigation Menu</h3>
    <ul class="nav side-menu">
      <li><a href="index.php"><i class="fa fa-list-alt"></i>Dashboard</a>
      </li>
      <li><a><i class="fa fa-pencil-square-o"></i> Masters <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="add_product.php">Add New Products</a></li>
          <li><a href="add_category.php">Add Category Master</a></li>
          <li><a href="update_product.php">Update Product Master</a></li>
          <li><a href="update_slider_images.php">Change Slider Master</a></li>
          <li><a href="update_offer_images.php">Change Offer Master</a></li>

        </ul>

        <li><a><i class="fa fa-file-excel-o"></i> Reports <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="newsletter.php">View Subscriptions</a></li>
            <li><a href="customer_support.php">View Queries</a></li>
            <li><a href="stock_details.php">View Products</a></li>
            <li><a href="product_ids.php">View Product Ids</a></li>
          </ul>
        </li>


        <li><a><i class="fa fa-folder-o"></i> Transactions <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="recent_orders.php">Recent Orders</a></li>
            <li><a href="all_orders.php">All Orders</a></li>

          </ul>
        </li>

        <li><a><i class="fa fa-folder-o"></i> Accounts <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="credentials.php">Change Credentials</a></li>
            <li><a href="my_profile.php">Update Profile</a></li>
          </ul>
        </li>

        <li><a><i class="fa fa-lock"></i> Logout <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="../checksession.php">Confirm Logout</a></li>

          </ul>
        </li>

      </ul>
    </div>

  </div>

  <?php// }else{
    ?>
    <!--
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
    <h3 style="">Navigation menu</h3>
    <ul class="nav side-menu">
    <li><a href="index.php"><i class="fa fa-list-alt"></i>Dashboard</a>
  </li>
  <li><a><i class="fa fa-folder-o"></i>Home Page <span class="fa fa-chevron-down"></span></a>
  <ul class="nav child_menu">
  <li><a href="slider.php">Main Slider</a></li>
  <li><a href="notice.php">Notice Board</a></li>
  <li><a href="remove-notice.php">Remove Notice</a></li>
  <li><a href="aboutus.php">About Us</a></li>

  <li><a href="imageanddescription.php">Image & Description</a></li>

</ul>
</li>
<li><a href="about-us-new.php"><i class="fa fa-folder-o"></i> About Us </a> </li>
<li><a href="about-bhp.php"><i class="fa fa-folder-o"></i> About Berhampore </a> </li>
<li><a href="our-services.php"><i class="fa fa-folder-o"></i> Services </a> </li>
<li><a href="our-system.php"><i class="fa fa-folder-o"></i> Our System </a></li>
<li><a><i class="fa fa-folder-o"></i> Registration <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="registration.php">Student Registration</a></li>
<li><a href="modify-student.php">Modify Registration</a></li>

</ul>
</li>
<li><a><i class="fa fa-folder-o"></i> Documents <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="add-docs.php">Add Documents</a></li>
<li><a href="remove-docs.php">Remove Documents</a></li>
<li><a href="report-card.php">Student Report Card</a></li>
<li><a href="remove-report-card.php">Remove Report Card</a></li>


</ul>
</li>
<li><a><i class="fa fa-folder-o"></i> Accounts <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="credentials.php">Change Credentials</a></li>

</ul>
</li>

<li><a><i class="fa fa-lock"></i> Logout <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="logout.php">Confirm Logout</a></li>

</ul>
</li>

</ul>
</div>

</div>-->
<?php// } ?>
<!-- /sidebar menu -->
