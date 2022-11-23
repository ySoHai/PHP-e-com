<?php
class User {
    private int $id;
    private string $email;
    private string $pNum;
    private string $address;
    private string $fName;
    private string $lName;

    public function __construct(int $value) {
        $this->id = $value;
        $this->setEmail();
        $this->setPhone();
        $this->setAdd();
        $this->setFName();
        $this->setLName();
      }
    
    public function getUserID() {
        return $this->id;
    }

    //public function setUserID(int $value) {
    //    $this->id = $value;
    //}
    
    public function getEmail() {
        return $this->email;
    }
    
    public function setEmail() {
        $db = Database::getDB();
        $query = 'SELECT email FROM users
                WHERE userID = :userID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':userID', $this->id);
            $statement->execute();
            $email = $statement->fetch();
            $statement->closeCursor();

        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        } 
        
        $this->email = $email['email'];
    }
    
    public function getPhone() {
        return $this->pNum;
    }
    
    public function setPhone() {
        $db = Database::getDB();
        $query = 'SELECT phone FROM users
                WHERE userID = :userID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':userID', $this->id);
            $statement->execute();
            $pNum = $statement->fetch();
            $statement->closeCursor();

        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        } 
        
        $this->pNum = $pNum['phone'];
    }
    
    public function getAdd() {
        return $this->address;
    }
    
    public function setAdd() {
        $db = Database::getDB();
        $query = 'SELECT address FROM users
                WHERE userID = :userID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':userID', $this->id);
            $statement->execute();
            $address = $statement->fetch();
            $statement->closeCursor();

        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        } 
        
        $this->address = $address['address'];
    }
    
    public function getFName() {
        return $this->fName;
    }
    
    public function setFName() {
        $db = Database::getDB();
        $query = 'SELECT name_first FROM users
                WHERE userID = :userID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':userID', $this->id);
            $statement->execute();
            $fName = $statement->fetch();
            $statement->closeCursor();

        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        } 
        
        $this->fName = $fName['name_first'];
    }
    
    public function getLName() {
        return $this->lName;
    }
    
    public function setLName() {
        $db = Database::getDB();
        $query = 'SELECT name_last FROM users
                WHERE userID = :userID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':userID', $this->id);
            $statement->execute();
            $lName = $statement->fetch();
            $statement->closeCursor();

        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        } 
        
        $this->lName = $lName['name_last'];
    }
    
    public function getOrders() {
        $db = Database::getDB();
        $query = 'SELECT * FROM orders
                  WHERE userID = :userID
                  ORDER BY orderID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':userID', $this->id);
            $statement->execute();
            $orders = $statement->fetchAll();
            $statement->closeCursor();
            return $orders;
            
        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }
    }
    
    public function getListings() {
        $db = Database::getDB();
        $query = 'SELECT * FROM products
                  WHERE sellerID = :userID
                  ORDER BY productID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':userID', $this->id);
            $statement->execute();
            $listings = $statement->fetchAll();
            $statement->closeCursor();
            return $listings;
            
        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }
    }
    
}

?>