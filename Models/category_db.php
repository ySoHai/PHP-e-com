<?php
function get_categories() {
    global $db;
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_category_by_description($category_description) {
    global $db;
    $query = 'SELECT * FROM categories
              WHERE description = :category_description';    
    $statement = $db->prepare($query);
    $statement->bindValue(':category_description', $category_description);
    $statement->execute();    
    $category = $statement->fetch();
    $statement->closeCursor();    
    $category_description = $category['description'];
    return $category_description;
}
?>