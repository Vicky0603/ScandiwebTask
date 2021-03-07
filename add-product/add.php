<?php
ob_start();
include('../bootstrap.php');
include('../classes/Products.php');

//header starts

$title="'Add";
$styleLink = 'add-product-form.css';
$scriptUrl = 'add_product_func.js';

//header ends

$addProduct = new ProductPDO();
if(isset($_POST['submit']) && $_POST['categoryName']) {
    $addProduct->insertData($_POST);
}

include_once('../header/header.php');?>
  <nav>
    <h3> Add Product </h3>
      <div class="spacer"></div>
          <div class="buttons">
            <input
             type='submit'
             name='submit'
             class='btn btn-outline-primary'
             value='Submit'
             form='addProductForm'>
            <input
             type='reset'
             id='cancelButton'
             class='btn btn-outline-danger'
             value='Cancel'
             form='addProductForm'>
          </nav>
        </header>
        <hr>
        <form class="addProductForm" id="addProductForm" action="add.php" method="post" novalidate>
          <div class="form-group">
            <label for="SKU">SKU</label>
            <input class="form-control" name="sku" required type="text" placeholder="SKU">
            <div class="invalid-feedback">
              Please add a SKU.
            </div>
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" name="name" required type="text" placeholder="Name">
            <div class="invalid-feedback">
              Please add a product's name.
            </div>
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input class="form-control" name="price" step="0.01" required type="number" placeholder="Price">
            <div class="invalid-feedback">
              Please add a price in numbers.
            </div>
          </div>
          <div class="form-group">
            <label for="typeSwitcher">Type Switcher</label>
            <select required id="inputState" name="categoryName"  class="categoryName form-select">
              <option  selected disabled value="" >Choose...</option>
              <option value="Dvd">DVD</option>
              <option value="Book">Book</option>
              <option value="Furniture">Furniture</option>
            </select>
            <div class="invalid-feedback">
              Please select a  type.
            </div>
          </div>
          <div id="card"></div>
        </form>
<?php include_once('../footer/footer.php'); ?>
