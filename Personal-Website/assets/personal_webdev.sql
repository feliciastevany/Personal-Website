drop database if exists personal_webdev;
create database personal_webdev;
use personal_webdev;
CREATE table table1
(
	id int primary key auto_increment,
	nama varchar(100),
	email varchar(50),
    sub varchar(500),
	msg varchar(500)
);
