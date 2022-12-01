<?php
class UserDB {
    public static function validateLogin($email, $password) {
		if(empty($email)||empty($password))  return false;
		
        $db = Database::getDB();
        $query = 'SELECT password FROM users
                    WHERE email = :email';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':email', strtolower($email));
            $statement->execute();
            $pword = $statement->fetch();
            $statement->closeCursor();
            
            if(!empty($pword)&&in_array($password, $pword)){
                return true;
            } else {
                return false;
            }
            
        } catch (PDOException $e) {
            return false;
        }
        
    }
    
    public static function registerUser($email,$pnum,$address,$fname,$lname,$password) {
        $db = Database::getDB();
        $query = 'INSERT into users 
                    (email,phone,address,name_first,name_last,password)
                  VALUES
                    (:email,:phone,:address,:fname,:lname,:password)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':email', strtolower($email));
            $statement->bindValue(':phone', $pnum);
            $statement->bindValue(':address', $address);
            $statement->bindValue(':fname', $fname);
            $statement->bindValue(':lname', $lname);
            $statement->bindValue(':password', $password);
            $statement->execute();
            $statement->closeCursor();
			return true;
            
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function getUserId($email) {
        $db = Database::getDB();
        $query = 'SELECT userID FROM users
                WHERE email = :email';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':email', $email);
            $statement->execute();
            $userId = $statement->fetch();
            $statement->closeCursor();
            return $userId['userID'];

        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }
    }
}
?>