<?php
class CategoryDB {
    public static function get_categories() {
        $db = Database::getDB();
        $query = 'SELECT categoryID, description 
                  FROM categories
                  ORDER BY description';
        try {
            $statement = $db->prepare($query);
            $statement->execute();
            
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            
            $categories = [];
			
            foreach ($rows as $row) {
                $categories[] = new Category($row['categoryID'],
                                             $row['description']);
            }
			
            return $categories;
        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }    
    }

    public static function getCategory($category_id) {
        $db = Database::getDB();
        $query = 'SELECT categoryID, description 
                  FROM categories
                  WHERE categoryID = :category_id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $category_id);
            $statement->execute();
            
            $row = $statement->fetch();
            $statement->closeCursor();
            
            return new Category($row['categoryID'], $row['description']);
        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }
    }
}
?>