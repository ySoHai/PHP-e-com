DROP DATABASE IF EXISTS TechTrade;
CREATE DATABASE TechTrade;
USE TechTrade;

CREATE TABLE users (
    userID      INT             NOT NULL    AUTO_INCREMENT,
    email       VARCHAR(255)    NOT NULL    UNIQUE,
    phone       VARCHAR(12)     			DEFAULT NULL,
    address     VARCHAR(255)    NOT NULL,
    name_first  VARCHAR(60)     NOT NULL,
    name_last   VARCHAR(60)     NOT NULL,
    password    VARCHAR(60)     NOT NULL,
    
    PRIMARY KEY (userID)
);

INSERT INTO `users` (`userID`, `email`, `phone`, `address`, `name_first`, `name_last`, `password`) VALUES
(1, 'john@miller.com', '23513585', '100 St 1598, Z5G35G Downtown, USA', 'John', 'Miller', 'sp4153'),
(2, 'maria@miller.com', '15856135', '100 St 1598, Z5G35G Downtown, USA', 'Maria', 'Miller', '555'),
(3, 'mike@gmail.com', '+141589135', '155 St 1598 #5, Z5G35G Surrey, Canada', 'Mike', 'Mayer-Hava', '156463');

CREATE TABLE categories (
    categoryID  INT         NOT NULL    AUTO_INCREMENT,
    description VARCHAR(60) NOT NULL,
    
    PRIMARY KEY (categoryID)
);

INSERT INTO `categories` (`categoryID`, `description`) VALUES
(1, 'Phones'),
(2, 'Laptops'),
(3, 'Desktop-Computer'),
(4, 'Other'),
(5, 'Components'),
(6, 'Tablets');

CREATE TABLE products (
    productID   INT             NOT NULL    AUTO_INCREMENT,
    name        VARCHAR(60)     NOT NULL,
    description LONGTEXT     	NOT NULL,
    price       DECIMAL(10,2)   NOT NULL,
    quantity    INT             NOT NULL,
    quality_new TINYINT         NOT NULL    DEFAULT 0,
    ship_days   INT             NOT NULL,
    categoryID  INT             NOT NULL,
	sellerID    INT             NOT NULL,
    
    PRIMARY KEY (productID),
    FOREIGN KEY (categoryID) REFERENCES categories (categoryID),
	FOREIGN KEY (sellerID) REFERENCES users (userID)
);

INSERT INTO `products` (`productID`, `name`, `description`, `price`, `quantity`, `quality_new`, `ship_days`, `categoryID`, `sellerID`) VALUES
(1, 'Apple iPad 10.9 64GB with Wi-Fi 6 (10th Generation) - Silver', 'The Apple iPad 10th Generation is colourfully reimagined to be more capable, more intuitive, and even more fun.', '600.00', 20, 1, 3, 6, 1),
(2, 'Apple iPhone 14 Pro 128GB - Space Black', 'Experience iPhone in a whole new way with the iPhone 14 Pro.', '450.00', 2, 0, 5, 1, 2);

CREATE TABLE orders (
    orderID     INT             NOT NULL    AUTO_INCREMENT,
    userID      INT             NOT NULL,
    order_date  DATETIME        NOT NULL,
    grand_total DECIMAL(10,2)   NOT NULL,
    
    PRIMARY KEY (orderID),
    FOREIGN KEY (userID) REFERENCES users (userID)
);

CREATE TABLE order_items (
    orderID     INT             NOT NULL,
    productID   INT             NOT NULL,
    amount      INT             NOT NULL,
    total       DECIMAL(10,2)   NOT NULL,
    
    PRIMARY KEY (orderID, productID),
    FOREIGN KEY (orderID) REFERENCES orders(orderID),
    FOREIGN KEY (productID) REFERENCES products(productID)
);