<?php
    function get_user_emails() {
        global $db;
        $query = 'SELECT email FROM users
                  ORDER BY userID';
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement;
    }
    
    function get_user_pass($user) {
        global $db;
        $query = 'SELECT password FROM users
                  WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $user);
        $statement->execute();    
        $password = $statement->fetch();
        $statement->closeCursor();    
        $user_pass = $password['password'];
        return $user_pass;
    }
?>