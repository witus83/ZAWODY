CREATE TABLE SHOOTER (
  
  ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  FirstName varchar(50) not null,
  LastName varchar(150) not null,
  City varchar(100) not null,
  Club varchar(100),
  IsLicence boolean,
  DateBirth Date,
  Email varchar(150),
  Phone varchar(20),
  Notes varchar(1024),
  RegDate Timestamp
)

CREATE TABLE USER (
  ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  Login varchar(20),
  Password varchar(200),
  Status int(1)
  )

CREATE TABLE COMPETITION_TYPE (

  ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  DESCR varchar(200)
  
)

CREATE TABLE COMPETITION (

  ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  COMPETITION_NAME varchar(300),
  MONTH INT(2),
  YEAR INT(4)
)

CREATE TABLE RESULTS (

  ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  
  FOREIGN KEY (COMPETITION) REFERENCES COMPETITION(ID),
  FOREIGN KEY (SHOOTER_ID) REFERENCES SHOOTER(ID)
)

INSERT INTO `user` (`login`, `password`) VALUES
    ('admin', '21232f297a57a5a743894a0e4a801fc3');


