<?php
include_once __DIR__ ."/../site/header.php";
?>
<div id="banner-container" class="width1024">
<div id="slider">

<div class="sliders">
<div class="slide"><a href="#"><img src="img/banners01.jpg"></a></div>
<div class="slide"><a href="#"><img src="img/banners02.jpg"></a></div>
<div class="slide"><a href="#"><img src="img/banners03.jpg"></a></div>
</div>
<a href="#" class="banner-btn btn-left"><span></span><img src="img/arrow-left.png"> </a>
<a href="#" class="banner-btn btn-right"><span></span><img src="img/arrow-right.png"> </a>

</div>
<div id="rand-product-banner">
<h3>Deal of the Month</h3>
<div class="slogan">The Human Face of Big Data</div>
<div class="pic"><a href="#"><img src="img/books01.jpg"></a></div>
<div class="price">
<span>Save 45% Today</span>
<b>$123.0</b>
</div>
<div class="btn-buy">
<a href="#">Buy now </a>
  </div>
 </div>
</div>
<div id="content" class="width1024">
<?php
include_once __DIR__ ."/../site/sidebar.php";
?>
<div class="body">
<div class="booksmarks  desktop-element">
<ul>
  <li class="active"><a href="#">Best Sellers</a></li>
  <li><a href="#">Now Arrivals</a></li>
  <li><a href="#">Used Books</a></li>
  <li><a href="#">Specials Offers</a></li>
</ul>
</div>
<div class="bookmarks-mobile mobile-element">
<select onchange="document.location=this.value">
  <option value="#">Best Sellers</option>
  <option value="#">Now Arrivals</option>
  <option value="#">Used Books</option>
  <option value="#">Specials Offers</option>
</select>
</div>

<div id="product-list">
<ul>
<?php for($i=0;$i<sizeof($all);$i++):
if($i % 5 === 0)print "</ul><ul>";
?>
<li>
  <img src="img/sale30.png">
 <a href="?model=product&action=view&id=<?=$all[$i]['id']?>"><img src="http://shop/uploads/products/<?=$all[$i]['picture']?>"></a>
 <h4><a href="?model=product&action=view&id=<?=$all[$i]['id']?>"><?=$all[$i]['title']?></a></h4>
 <div class="price"><?=$all[$i]['price']?></div>
 </li>
 <?php endfor;?>
  </ul>
  <div class="pager">
<div class="link-to-begin"><a href="#"><<<<</a></div>
<div class="link-to-left"><a href="#"></a></div>
<div class="pager"><a href="#">1</a></div>
<div class="pager"><a href="#">2</a></div>
<div class="pager current"><a href="#">3</a></div>
<div class="pager"><a href="#">4</a></div>
<div class="pager"><a href="#">5</a></div>
<div class="link-to-right"><a href="#"></a></div>
<div class="link-to-end"><a href="#">>>>></a></div>
</div>
</div>
</div>
</div>
<?php
include_once __DIR__ ."/../site/footer.php";
?>
