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
	
	public static function get_active_products() {
        $db = Database::getDB();
        $query = 'SELECT productID, name, description, price, 
                     quantity, quality_new, ship_days, categoryID, sellerID 
                  FROM products WHERE quantity >= 1
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
    
    public static function get_active_products_by_user($userID) {
        $db = Database::getDB();
        $query = 'SELECT productID, name, description, price, 
                     quantity, quality_new, ship_days, categoryID, sellerID 
                  FROM products WHERE quantity >= 1 AND sellerID = :userID
                  ORDER BY productID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':userID',$userID);
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
        $query = 'SELECT productID, name, description, price, 
                     quantity, quality_new, ship_days, categoryID, sellerID 
                  FROM products WHERE quantity >= 1 AND categoryID = :category_id
                  ORDER BY productID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $category_id);
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
    
    public static function addProduct($prodName, $prodDesc, $price, $quantity, $quality, $shipDays, $categoryID, $sellerID) {
        $db = Database::getDB();
        $query = 'INSERT INTO products
                    (name, description, price, 
                     quantity, quality_new, ship_days, categoryID, sellerID)
                 VALUES
                    (:name, :description, :price, 
                     :quantity, :quality_new, :ship_days, :category_id, :seller_id)';
       try {
            $statement = $db->prepare($query);
            $statement->bindValue(':name', $prodName);
            $statement->bindValue(':description', $prodDesc);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':quantity', $quantity);
            $statement->bindValue(':quality_new', $quality);
            $statement->bindValue(':ship_days', $shipDays);
            $statement->bindValue(':category_id', $categoryID);
            $statement->bindValue(':seller_id', $sellerID);
            $statement->execute();
            $statement->closeCursor();
            
       } catch (PDOException $e) {
            Database::displayError($e->getMessage());
       }
    }
    
    public static function updateQuantity($product) {
        $db = Database::getDB();
        $query = 'UPDATE products
                  SET quantity = :quantity
                  WHERE productID = :product_id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':product_id', $product->getID());
            $statement->bindValue(':quantity', $product->getQuantity());
            $statement->execute();
            $statement->closeCursor();
            
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