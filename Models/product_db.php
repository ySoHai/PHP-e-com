<?php
class ProductDB {
    public static function get_products() {
        $db = Database::getDB();
        $query = 'SELECT productID, name, description, price, 
                     quantity, quality_new, ship_days, categoryID, sellerID 
                  FROM products
                  ORDER BY productID';
        try {
            $statement = $db->prepare($query);
            $statement->execute();
            
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            
            $products = [];
            foreach ($rows as $row) {
                $products[] = new Product($row['productID'],
                                            $row['name'],
                                            $row['description'],
                                            $row['price'],
                                            $row['quantity'],
                                            $row['quality_new'],
                                            $row['ship_days'],
                                            $row['categoryID'],
                                            $row['sellerID']);
            }
            return $products;
        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }
    }
    
    public static function get_product_by_category($category_id) {
        $db = Database::getDB();
        $category = CategoryDB::getCategory($category_id);
        $query = 'SELECT productID, name, description, price, 
                     quantity, quality_new, ship_days, categoryID, sellerID 
                  FROM products
                  WHERE categoryID = :category_id
                  ORDER BY productID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $category_id);
            $statement->execute();
            
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            
            $products = [];
            foreach ($rows as $row) {
                $products[] = self::loadProduct($row);
            }
            return $products;
        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }
    }
    
    private static function loadProduct($row) {
        $product = new Product($row['productID'],
                                            $row['name'],
                                            $row['description'],
                                            $row['price'],
                                            $row['quantity'],
                                            $row['quality_new'],
                                            $row['ship_days'],
                                            $row['categoryID'],
                                            $row['sellerID']);
        return $product;
    }
    
    public static function get_product_by_id($product_id) {
        $db = Database::getDB();
        $query = 'SELECT productID, name, description, price, 
                     quantity, quality_new, ship_days, categoryID, sellerID 
                  FROM products
                  WHERE productID = :product_id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':product_id', $product_id);
            $statement->execute();
            
            $row = $statement->fetch();
            $statement->closeCursor();
			
            return self::loadProduct($row);
        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }
    }
    
    public static function addProduct($product) {
        $db = Database::getDB();
        $query = 'INSERT INTO products
                    (productID, name, description, price, 
                     quantity, quality_new, ship_days, categoryID, sellerID)
                 VALUES
                    (:product_id, :name, :description, :price, 
                     :quantity, :quality_new, :ship_days, :category_id, :seller_id)';
       try {
            $statement = $db->prepare($query);
            $statement->bindValue(':name', $product->getName());
            $statement->bindValue(':description', $product->getDescription());
            $statement->bindValue(':price', $product->getPrice());
            $statement->bindValue(':quantity', $product->getQuantity());
            $statement->bindValue(':quality_new', $product->getQuality());
            $statement->bindValue(':ship_days', $product->getShip_days());
            $statement->bindValue(':category_id', 
                   $product->getCategory()->getID());
            $statement->bindValue(':seller_id', 
                   $product->getUser()->getUserID());
            $statement->execute();
            $statement->closeCursor();

           // Get the last product ID that was automatically generated
            return $db->lastInsertId();
       } catch (PDOException $e) {
            Database::displayError($e->getMessage());
       }
    }
    
    public static function updateProduct($product) {
        $db = Database::getDB();
        $query = 'UPDATE Products
                  SET name = :name, description = :description,
                      price = :price, quantity = :quantity,
                      quality_new = :quality_new, ship_days = :ship_days,
                      categoryID = :category_id, sellerID = :seller_id
                  WHERE productID = :product_id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':product_id', $product->getID());
            $statement->bindValue(':name', $product->getName());
            $statement->bindValue(':description', $product->getDescription());
            $statement->bindValue(':price', $product->getPrice());
            $statement->bindValue(':quantity', $product->getQuantity());
            $statement->bindValue(':quality_new', $product->getQuality());
            $statement->bindValue(':ship_days', $product->getShip_days());
            $statement->bindValue(':category_id', 
                   $product->getCategory()->getID());
            $statement->bindValue(':seller_id', 
                   $product->getUser()->getUserID());
            $statement->execute();
            
            $row_count = $statement->rowCount();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }
    }
    
    public static function deleteProduct($product_id) {
        $db = Database::getDB();
        $query = 'DELETE FROM products
                  WHERE productID = :product_id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':product_id', $product_id);
            $statement->execute();
            
            $row_count = $statement->rowCount();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }
    }
}

?>