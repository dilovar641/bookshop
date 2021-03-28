<?php
include_once __DIR__ ."/../../../common/src/Service/UserService.php";

$currentuser = UserService::getcurrentuser();
?>

<!Doctype html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>Shop</title>
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/shop-style.css">
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
</head>

<body>
<header>
<div id="head">
 <div class="top">
 <div class="width1024">
 <ul class="desktop-element">
  <li><?=!empty($currentuser['login'])
  ? '<span style="color:#fff">Hello,' . $currentuser['login'] . '!</span>' 
  : '<a href="/frontend/?model=register&action=form">Register  </a>'?></li>         
 <li><?=!empty($currentuser['login'])
 ?  '<a href="/frontend/?model=auth&action=logout"> Sign out</a>' 
 : '<a href="/frontend/?model=site&action=login"> Sign in</a>'?></li>
<?=!empty($currentuser['login']) ? '<li><a href="/frontend/?model=basket&action=view">Basket </a></li>' : '' ?> 
 <li><a href="">  Help</a></li>
 
 </ul>
 <div id="mobile-logo" class="mobile-element">BOOKS</div>
 <select id="top-link" onchange="document.location=this.value" class="mobile-element form-control">
 <option disable selected> </option>
 <option value="/frontend/?model=register&action=form">Register </option>
 <option value="/frontend/?model=site&action=login">Sign in </option>
 <option value="#order">Order Status </option>
 <option value="#help">Help </option>

 </select>
 </div>
 
 </div>
 <div class="header-panel">
 <div class="width1024  flex">
 <div id="logo">
 <a href="http://shop/frontend/"> <img src="img/book1.png"></a>
</div>
<div id="search-field">
  <form action="#">
  <input type="text" name="search-text">
  <button>Search</button>
  </form>
  </div>
  <div id= "basket-container">
  <div >Your cart<span>(2 times) </span></div>
  <div> <b>$125.0</b><a href="#">Checkout</a></div>
  </div>
  <div id="favor">
  <div>Wish list</div>
  </div>
  </div>
  </div>

   <nav >
  <ul class="width1024 desktop-element ">
                                                   

  <li><a href="#">Computers </a>
  <li><a href="#">Cooking</a>
  <li><a href="#">Education</a>
  <li ><a href="#">Fiction</a>
  <li class="active"> <a href="#">Health</a>
  <li><a href="#">Mathematics</a>
  <li><a href="#">Medical</a>
  <li><a href="#">Reference</a>
  <li><a href="#">Science</a>
  
  </ul>
  
    <select onchange="document.location=this.value" class="mobile-element">
                                                   
  <option disabled selected></option>
 <option value="#Computers">Computers </option>
  <option value="#Cooking">Cooking</option>
  <option value="#Education">Education</option>
  <option value="#">Fiction</option>
  <option value="#">Health</option>
  <option value="#">Mathematics</option>
  <option value="#">Medical</option>
  <option value="#">Reference</option>
  <option value="#">Science</option>
  
  </select>
  
  </nav>
</header>

<div class="body">