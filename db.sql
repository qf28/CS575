
CREATE  products (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    body TEXT,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    initial VARCHAR(20),
    target VARCHAR(20),
    link VARCHAR(300),
    email VARCHAR(100)
);

INSERT INTO products (title, body, created, modified, initial, target, link, email)
    VALUES ('Ipad min', 'ipad min', NOW(), NOW(), 329.00, 300.00, "http://www.ebay.com/itm/Apple-iPad-mini-with-Retina-Display-2nd-Generation-32GB-Wi-Fi-7-9in-/331376570534?pt=US_Tablets&hash=item4d279530a6", "youremailadress");