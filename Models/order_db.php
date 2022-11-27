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
            $statement->execute();
            $statement->bindValue(':userID', $userID);
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
            $statement->execute();
            $statement->bindValue(':userID', $userID);
            $result = $statement->fetchAll();
            $statement->closeCursor();
            
            if (empty($result)) {
                return false;
            } else {
                return true;
            }
            
        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }
    }

}
?>