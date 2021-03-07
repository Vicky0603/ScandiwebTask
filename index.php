<?php
ob_start();

include('bootstrap.php');
include('classes/products.php');

//header starts

$title = 'Products list';
$styleLink = "main.css";
$scriptUrl = 'index.js';

//Header ends

$productsFetch = new ProductPDO();
$books = $productsFetch->displayBooks();
$dvds = $productsFetch->displayDvds();
$furniture = $productsFetch->displayFurniture();

if(isset($_POST['delete']) && isset($_POST['checkbox'])) {
  $productsFetch->deleteProduct();
}

include_once('header/header.php'); ?>
<nav class="nav_bar">
  <h3> Product list </h3>
    <div class="spacer"></div>
        <div class="buttons">
        <input
         type='button'
         value='ADD'
         id='addButton'
         class='btn btn-outline-success'/>
        <input
         name='delete'
         form='productsList'
         type='submit'
         class='btn btn-outline-danger'
         value='DELETE'/>
        </div>
      </nav>
      <hr>
      <section>
        <form class="" action="" name="productsList" method="post" id="productsList">
          <div class="grid-container">
          <?php include_once('productsGrid.php'); ?>
        </div>
      </form>
    </section>
<?php include('footer/footer.php');  ?>
