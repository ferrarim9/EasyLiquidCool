CREATE TABLE elcproducts (
    online_sku VARCHAR(255) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT
);
INSERT INTO elcproducts (online_sku, name, price, description)
VALUES ('001', 'Full Cooling Package', 1599.99, 'Full service package with custom cooling loops, pump, and liquid nitrogen included');