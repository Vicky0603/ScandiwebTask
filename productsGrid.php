<?php
  foreach($books as $book) { ?>
  <div id="product_card">
    <input
      class='form-check-input'
      name='checkbox[<?php echo $book->getId() ?>]'
      type='checkbox' value=<?php echo $book->getId(); ?>/>
    <p> <?php echo $book->getSKU(); ?> </p>
    <p> <?php echo $book->getName(); ?> </p>
    <p> $ <?php echo $book->getPrice();  ?> </p>
    <p> weight: <?php echo $book->getWeight();  ?> </p>
  </div>
  <?php }

  foreach($dvds as $dvd) { ?>
  <div id="product_card">
    <input
      class='form-check-input'
      name='checkbox[<?php echo $dvd->getId() ?>]'
      type='checkbox' value=<?php echo $dvd->getId(); ?>/>
    <p> <?php echo $dvd->getSKU(); ?> </p>
    <p> <?php echo $dvd->getName(); ?> </p>
    <p> $ <?php echo $dvd->getPrice();  ?> </p>
    <p> Size: <?php echo $dvd->getSize();  ?> </p>
  </div>
  <?php }

  foreach($furniture as $furn) { ?>
  <div id="product_card">
    <input
      class='form-check-input'
      name='checkbox[<?php echo $furn->getId() ?>]'
      type='checkbox' value=<?php echo $furn->getId(); ?>/>
    <p> <?php echo $furn->getSKU() ; ?> </p>
    <p> <?php echo $furn->getName(); ?> </p>
    <p> $ <?php echo $furn->getPrice();  ?> </p>
    <p> Dimentions: <?php echo $furn->getHeight();?> x
                    <?php echo $furn->getLength(); ?> x
                    <?php echo $furn->getWidth(); ?>
    </p>
  </div>
  <?php }
