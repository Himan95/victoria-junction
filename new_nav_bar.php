
<style>
.active {
}


.linked{
  text-decoration: none;
  color:white;
}
.mera-button{
  background-color: red;
}
/* Dropdown Button */
.dropbtn {
  margin-top:3px;
  margin-right:10px;
  margin-left:20px;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.btn-hover:hover{
  background-color:#3e8e41;
}

/* The container <div> - needed to position the dropdown content */


/* Dropdown Content (Hidden by Default) */
.content-dropdown {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 180px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.content-dropdown a {
  font-size: 15px;
  color: black;
  padding: 10px 12px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.content-dropdown a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .content-dropdown {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
</style>

<div style="width:100%; height:60px; background-color:red;" class="">
<div style="margin-left:100px;" class="dropdown">
  <button class="dropbtn mera-button">Cakes</button>
  <div class="content-dropdown">
    <a href="cakes.php">Basic Cakes</a>
    <a href="cakes.php">Customised Cakes</a></li>
  </div>
</div>

<div class="dropdown">
  <button class="dropbtn mera-button">Pastries</button>
  <div class="content-dropdown">
    <a href="pastries.php">Special Pastries</a>
    <a href="muffins.php">Chocolate Muffins</a>
    <a href="pastries.php">Show All Pastries</a>
    <a href="muffins.php">Show All Muffins</a>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn mera-button">Snacks</button>
  <div class="content-dropdown">
    <a href="drinks.php">Beverages</a>
    <a href="snacks.php">Show All Snacks</a>
  </div>
</div>


<button class="dropbtn btn-hover mera-button"><a class="linked" href="chocolates.php">Chocolates</a></button>
<button class="dropbtn btn-hover mera-button"><a class="linked" href="breads.php">Breads</a></button>
<button class="dropbtn btn-hover mera-button"><a class="linked" href="cookies.php">Cookies</a></button>
<button class="dropbtn btn-hover mera-button"><a class="linked" href="bouquets.php">Bouquets</a></button>
<button class="dropbtn btn-hover mera-button"><a class="linked" href="gifts.php">Gifts</a></button>
<button class="dropbtn btn-hover mera-button"><a class="linked" href="combos.php">Combos</a></button>
</div>
