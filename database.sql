CREATE TABLE USERS(
   idUser INT AUTO_INCREMENT,
   email VARCHAR(250)  NOT NULL,
   password VARCHAR(250),
   name VARCHAR(50),
   firstname VARCHAR(50),
   phone INT,
   isAdmin BOOLEAN,
   PRIMARY KEY(idUser),
   UNIQUE(email)
);

CREATE TABLE SERVICES(
   idService INT AUTO_INCREMENT,
   nameService VARCHAR(100),
   text TEXT,
   price DECIMAL(5,2),
   PRIMARY KEY(idService)
);

CREATE TABLE PRODUCTS(
   idProduct INT AUTO_INCREMENT,
   nameProduct VARCHAR(50),
   description TEXT,
   PRIMARY KEY(idProduct)
);

CREATE TABLE COMMENTS(
   idComment INT AUTO_INCREMENT,
   text TEXT DEFAULT NULL,
   note INT DEFAULT NULL,
   _date DATE DEFAULT current_timestamp(),
   active BOOLEAN DEFAULT 0,
   idService INT NOT NULL,
   idUser INT NOT NULL,
   PRIMARY KEY(idComment),
   FOREIGN KEY(idService) REFERENCES SERVICES(idService),
   FOREIGN KEY(idUser) REFERENCES USERS(idUser)
);

CREATE TABLE CONTACTS(
   idContact INT AUTO_INCREMENT,
   name VARCHAR(50) ,
   firstname VARCHAR(50) ,
   email VARCHAR(250) ,
   object VARCHAR(250) ,
   text TEXT,
   _date DATE DEFAULT current_timestamp(),
   idUser INT,
   PRIMARY KEY(idContact),
   FOREIGN KEY(idUser) REFERENCES USERS(idUser)
);

CREATE TABLE toUse(
   idService INT,
   idProduct INT,
   PRIMARY KEY(idService, idProduct),
   FOREIGN KEY(idService) REFERENCES SERVICES(idService),
   FOREIGN KEY(idProduct) REFERENCES PRODUCTS(idProduct)
);
