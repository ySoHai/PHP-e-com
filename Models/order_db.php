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

}
?>