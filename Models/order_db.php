<?php
class OrderDB {
    public static function get_orders($userID) {
        $db = Database::getDB();
        $query = 'SELECT orderID, userID, order_date, grand_total
                  FROM orders
                  WHERE userID = :userID
                  ORDER BY orderID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':userID', $userID);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            
            $orders = [];
            foreach ($rows as $row) {
                $orders[] = new Order($row['orderID'],
                                            $row['userID'],
                                            $row['order_date'],
                                            $row['grand_total']);
            }
            return $orders;
        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }
    }

    public static function get_grand_total($orderID) {
        $db = Database::getDB();
        $query = 'SELECT grand_total
                  FROM orders
                  WHERE orderID = :orderID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':orderID', $orderID);
            $statement->execute();
            $grandTotal = $statement->fetchAll();
            $statement->closeCursor();
            
            return $grandTotal;
        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }
    }
    
    public static function get_order_items($orderID) {
        $db = Database::getDB();
        $query = 'SELECT orderID, productID, amount, total
                  FROM order_items
                  WHERE orderID = :orderID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':orderID', $orderID);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            
            $order_items = [];
            foreach ($rows as $row) {
                $order_items[] = new OrderItem($row['orderID'],
                                            $row['productID'],
                                            $row['amount'],
                                            $row['total']);
            }
            return $order_items;
        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }
    }
    
    public static function get_last_order() {
        $db = Database::getDB();
        $query = 'SELECT * FROM orders
                  ORDER BY orderID DESC LIMIT 1';
        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $order = $statement->fetch();
            $statement->closeCursor();
            
            return $order;
        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }
    }

    public static function orders_exist($userID) {
        $db = Database::getDB();
        $query = 'SELECT userID
                  FROM orders
                  WHERE userID = :userID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':userID', $userID);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            
            if(!empty($result)){
                return true;
            } else {
                return false;
            }
            
        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }
    }
    
    public static function add_order($userID, $orderDate, $grandTotal) {
        $db = Database::getDB();
        $query = 'INSERT into orders 
                    (userID,order_date,grand_total)
                  VALUES
                    (:userID,:order_date,:grand_total)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':userID', $userID);
            $statement->bindValue(':order_date', $orderDate);
            $statement->bindValue(':grand_total', $grandTotal);
            $statement->execute();
            $statement->closeCursor();
            
        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }
    }
    
    public static function set_order_items($orderID,$productID,$amount,$price) {
        $db = Database::getDB();
        $query = 'INSERT into order_items 
                    (orderID,productID,amount,total)
                  VALUES
                    (:orderID,:productID,:amount,:total)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':orderID', $orderID);
            $statement->bindValue(':productID', $productID);
            $statement->bindValue(':amount', $amount);
            $statement->bindValue(':price', $price);
            $statement->execute();
            $statement->closeCursor();
            
        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }
    }

}
?>