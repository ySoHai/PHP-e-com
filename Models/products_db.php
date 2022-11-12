<?php

function get_products() {
    $db = Database::getDB();
    $query = 'SELECT * FROM products
              ORDER BY productID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
}

function get_products_by_category($category_id) {
    $db = Database::getDB();
    $query = 'SELECT * FROM products
              WHERE products.categoryID = :category_id
              ORDER BY productID';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

function get_product_by_id($product_id) {
    $db = Database::getDB();
    $query = 'SELECT * FROM products
              WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $product;
}

function get_products_by_name($product_name) {
    $db = Database::getDB();
    $query = 'SELECT * FROM products
              WHERE name = :product_name';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_name', $product_name);
    $statement->execute();
    $products = $statement->fetch();
    $statement->closeCursor();
    return $products;
}

function add_product($category_id, $seller_id, $name, $description, $price, $quantity, $ship_days, $quality) {
    $db = Database::getDB();
    $query = 'INSERT INTO products
                 (name, description, price, quantity, quality_new, ship_days, categoryID, sellerID)
              VALUES
                 (:name, :description, :price, :quantity, :quality_new, :ship_days, :category_id, :seller_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':seller_id', $seller_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':quantity', $quantity);
    $statement->bindValue(':ship_days', $ship_days);
    $statement->bindValue(':quality_new', $quality);
    $statement->execute();
    $statement->closeCursor();
}

function delete_product($product_id) {
    $db = Database::getDB();
    $query = 'DELETE FROM products
              WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->execute();
    $statement->closeCursor();
}

?>