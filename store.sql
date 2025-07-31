CREATE TABLE users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  password VARCHAR(100)
);

INSERT INTO users VALUES (1, 'Admin', 'admin@shop.com', MD5('pass123'));

CREATE TABLE categories (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50)
);
INSERT INTO categories VALUES (1, 'T-Shirts'), (2, 'Hats'), (3, 'Stickers');

CREATE TABLE suppliers (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  contact_email VARCHAR(100)
);
INSERT INTO suppliers VALUES 
  (1, 'Printful', 'contact@printful.com'), (2, 'Sticker Mule', 'info@stickermule.com');

CREATE TABLE products (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  description TEXT,
  price DECIMAL(8,2),
  category_id INT UNSIGNED,
  supplier_id INT UNSIGNED,
  stock INT,
  image VARCHAR(255),
  FOREIGN KEY (category_id) REFERENCES categories(id),
  FOREIGN KEY (supplier_id) REFERENCES suppliers(id)
);
INSERT INTO products VALUES
  (1, 'Cool Tee', '100% cotton.', 20.00, 1, 1, 50, 'default.jpg'),
  (2, 'Smiley Sticker', 'Vinyl sticker.', 2.50, 3, 2, 100, 'default.jpg');

CREATE TABLE customers (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  password VARCHAR(255),
  address VARCHAR(200)
);
INSERT INTO customers VALUES
  (1, 'Jane Doe', 'jane@buyer.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '101 Main St'),
  (2, 'John Smith', 'john@buyer.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '202 Side Ave');

CREATE TABLE orders (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  customer_id INT UNSIGNED,
  order_date DATETIME,
  total DECIMAL(10,2),
  FOREIGN KEY (customer_id) REFERENCES customers(id)
);

INSERT INTO orders VALUES (1, 1, '2025-07-26 10:00:00', 22.50);

CREATE TABLE order_items (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  order_id INT UNSIGNED,
  product_id INT UNSIGNED,
  quantity INT,
  price DECIMAL(8,2),
  FOREIGN KEY (order_id) REFERENCES orders(id),
  FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO order_items VALUES (1, 1, 1, 1, 20.00), (2, 1, 2, 1, 2.50);

-- Add image column to products table
ALTER TABLE products ADD COLUMN image VARCHAR(255);

-- Update Products with default image
UPDATE products SET image = 'default.jpg' WHERE image IS NULL;