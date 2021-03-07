<?php
include('Product.class.php');

class ProductPDO {

  private $connection;

  public function __construct( PDO $connection = null)
  {
    try {
      $this->connection = new PDO(
                      'mysql:host=localhost;dbname=products',
                      'root',
                      'root' );
      $this->connection->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
      );
    } catch (\Exception $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }

  public function insertData($post)
  {
    try {
        //insert product
        $this->connection->beginTransaction();
        $stmt= $this->connection->prepare("INSERT INTO Product(sku, name, price, category)
        VALUES (:sku, :name, :price, :category)");

        $stmt->bindParam(':sku', $sku);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':category', $category);

        $sku = $_POST['sku'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $category = $_POST['categoryName'];
        $stmt->execute();

        //insert Book
        if($_POST['categoryName'] == 'Book') {
          $stmt= $this->connection->prepare("INSERT INTO Book(bookId, weight)
          VALUES (:bookId, :weight)");
          $lastInsertID = $this->connection->lastInsertId();
          $stmt->bindParam(':bookId', $lastInsertID);
          $stmt->bindParam(':weight', $weight);
          $weight = $_POST['weight'];
          $stmt->execute();
        }

        //insert dvd
        elseif ($_POST['categoryName'] == 'Dvd') {
          $stmt= $this->connection->prepare("INSERT INTO Dvd(dvdId, size)
          VALUES (:dvdId, :size)");
          $lastInsertID = $this->connection->lastInsertId();
          $stmt->bindParam(':dvdId', $lastInsertID);
          $stmt->bindParam(':size', $size);
          $size = $_POST['size'];
          $stmt->execute();
        }

        //insert furniture
        elseif ($_POST['categoryName'] == 'Furniture'){
          $stmt= $this->connection->prepare("INSERT INTO Furniture(furnitureId, height, length, width)
          VALUES (:furnitureId, :height, :length, :width)");
          $lastInsertID = $this->connection->lastInsertId();
          $stmt->bindParam(':furnitureId', $lastInsertID);
          $stmt->bindParam(':height', $height);
          $stmt->bindParam(':length', $length);
          $stmt->bindParam(':width', $width);
          $height = $_POST['height'];
          $length = $_POST['length'];
          $width = $_POST['width'];
          $stmt->execute();
        }
        $this->connection->commit();
        header("Location: /scandiweb2/index.php");

      } catch (\Exception $e) {
        $this->connection->rollback();
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
      }
	}

  public function displayBooks()
  {
    try {
      $stmt = $this->connection->prepare("SELECT bookId, sku, name, price, category, weight
        FROM Product
        INNER JOIN Book ON Product.productID = Book.bookId");
      $stmt->execute();
       return $books = $stmt->fetchAll(PDO::FETCH_FUNC, "Book::buildFromPdo");

    } catch (\Exception $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }

  public function displayDvds()
  {
    try {
      $stmt = $this->connection->prepare("SELECT dvdId, sku, name, price, category, size
        FROM Product
        INNER JOIN Dvd ON Product.productID = Dvd.dvdId");
      $stmt->execute();
      return $dvds = $stmt->fetchAll(PDO::FETCH_FUNC, "DVD::buildFromPdo");
    } catch (\Exception $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }

    public function displayFurniture()
  {
    try {
      $stmt = $this->connection->prepare("SELECT furnitureId, sku, name, price,
         category, length, height, width
         FROM Furniture
         INNER JOIN Product ON Product.productId = Furniture.furnitureId");
      $stmt->execute();
      return $furniture = $stmt->fetchAll(PDO::FETCH_FUNC, "Furniture::buildFromPdo");
    } catch (\Exception $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }

  public function deleteProduct()
  {
    try {
      if(!empty($_POST['checkbox'])) {
        foreach($_POST['checkbox'] as $key => $value){
          $stmt = $this->connection->prepare("DELETE FROM Product WHERE productId = '$key'");
          $stmt->execute();
        }
      }
      header("Location: /scandiweb2/index.php");
    } catch (\Exception $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }

}
