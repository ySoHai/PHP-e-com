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

    public static function orders_exist($userID) {
        $db = Database::getDB();
        $query = 'SELECT *
                  FROM orders
                  WHERE userID = :userID
                  ORDER BY orderID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':userID', $userID);
            $statement->execute();
            $result = $statement->fetchAll();
            $statement->closeCursor();
            
            if (empty($result)) {
                return false;
            } else {
                return true;
            }
            
        } catch (PDOException $e) {
            return false;
        }
    }

}
?>