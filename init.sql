DROP TABLE IF EXISTS users, categories, products, sub_categories;


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    description TEXT
);


CREATE TABLE sub_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    name VARCHAR(50) NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);


CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image_path VARCHAR(255),
    category_id INT NOT NULL,
    sub_category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (sub_category_id) REFERENCES sub_categories(id)
);


INSERT INTO categories (name, description) VALUES
('Vegetables', 'Fresh vegetables for your garden.'),
('Fruits', 'Delicious and healthy fruits.'),
('Flowers', 'Beautiful flowers to brighten up your space.'),
('Herbs', 'Fresh herbs for your culinary needs.'),
('Sprouts', 'Fresh sprouts to nourish your body.');

-- Example sub-categories (optional)
INSERT INTO sub_categories (category_id, name) VALUES
(1, 'Tomatoes'),
(1, 'Carrots'),
(2, 'Strawberries'),
(2, 'Apples'),
(3, 'Roses'),
(4, 'Mint'),
(5, 'Alfalfa');


INSERT INTO products (name, description, price, image_path, category_id, sub_category_id) VALUES
('Cherry Tomato Seeds', 'Sweet and juicy cherry tomatoes.', 2.99, 'images/cherry-tomato.jpg', 1, 1),
('Mint Leaves Pack', 'Fresh mint for drinks and dishes.', 1.99, 'images/mint.jpg', 4, 6);

CREATE TABLE customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(255),
    phone VARCHAR(20),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO customers (customer_id, first_name, last_name, email, password, address, phone, created_at)
VALUES (
    1,
    'Test',
    'User',
    'test@example.com',
    'test123',
    '123 Garden St, Green City',
    '1234567890',
    '2025-04-14 10:24:33'
);