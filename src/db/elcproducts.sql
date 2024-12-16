CREATE TABLE elcproducts (
    online_sku VARCHAR(255) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT
);
INSERT INTO elcproducts (online_sku, name, price, description)
VALUES ('001', 'Full Cooling Package', 1599.99, 'Full service package with custom cooling loops, pump, and liquid nitrogen included');

INSERT INTO elcproducts (online_sku, name, price, description)
VALUES('003', 'Loops Only', 699.99, 'Custom cooling loops, handmade for a perfect fit' );

INSERT INTO elcproducts (online_sku, name, price, description)
VALUES('002', 'Tank & Pump', 229.99, 'Tank and pump, handmade for a perfect fit.');

ALTER TABLE elcproducts ADD COLUMN image VARCHAR(255);

UPDATE elcproducts
SET image = 'Loops.png'
WHERE online_sku = '003';

UPDATE elcproducts
SET image = 'FullPackage.png'
WHERE online_sku = '001';

UPDATE elcproducts
SET image = 'Pump.png'
WHERE online_sku = '002';

UPDATE elcproducts
SET online_sku = '004'
WHERE name = "Loops Only";

UPDATE elcproducts
SET online_sku = '003'
WHERE name = 'Tank & Pump';

UPDATE elcproducts
SET online_sku = '002'
WHERE online_sku = '004';

SELECT * from elcproducts