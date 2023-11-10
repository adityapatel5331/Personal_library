CREATE TABLE Users (
username VARCHAR(50) PRIMARY KEY, 
name VARCHAR(50), 
email VARCHAR(100), 
address VARCHAR(200), 
pincode VARCHAR(6)
);

CREATE TABLE Login
(
username VARCHAR(50),
password VARCHAR(50),
FOREIGN KEY (username) REFERENCES Users(username)
);

CREATE TABLE Orders
(
orderId INT PRIMARY KEY,
userId VARCHAR(50),
orderDate DATETIME,
orderStatus VARCHAR(10),
FOREIGN KEY (userId) REFERENCES Users(username)
);

CREATE TABLE OrderItem
(
itemName VARCHAR(50),
orderId INT,
quantity INT,
FOREIGN KEY (orderId) REFERENCES Orders(orderId)
);

CREATE TABLE Invoice
(
invoiceId INT PRIMARY KEY,
orderId INT,
paymentMethod VARCHAR(20),
FOREIGN KEY (orderId) REFERENCES Orders(orderId)
);