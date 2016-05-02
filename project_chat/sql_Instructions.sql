
/*

//Change this file extension to .sql to see editor syntax higlight.

//SQL Database Creation steps
//To be copy and pasted into mysql>
*/

/*
//Create DATBASE for this project
*/
CREATE DATABASE ChatWebsite;
USE BlogWebsite;

/*
//Creating Users table
*/
CREATE TABLE Users (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
UserName VARCHAR(20),
Password VARCHAR(255),
confirmed CHAR(1),
signup_date DATE);
ALTER TABLE Users ADD UNIQUE INDEX(UserName);
/*
//End of Instruction
*/
/* Dummy User Insert
INSERT INTO Users (id,UserName,Password,confirmed,signup_date) VALUES (NULL, "dummy", "dummy","Y", '2016-04-27');
Deltin users by id
DELETE FROM Users WHERE id=some_value;
*/

/*
//Online Users table
*/
CREATE TABLE Online (id INT NOT NULL PRIMARY KEY,username varchar(20) NOT NULL);
/*
	INSERT INTO Online (id,username) VALUES (id , "online usr");
*/

/*
Friend Relationship table
Where
status == 0 = pending request
status == 1 = friend
status == 2 = When user id = friend_one = friend_two // we can change the meaning of this
*/
CREATE TABLE Friends ( friend_one INT ,
friend_two INT ,
status ENUM('0','1','2') DEFAULT '0',
PRIMARY KEY (friend_one , friend_two),
FOREIGN KEY (friend_one) REFERENCES Users(id),
FOREIGN KEY (friend_two) REFERENCES Users(id));
/*
Adding Friends

INSERT INTO friends (friend_one,friend_two) VALUES ('$user_id','$friend_id');

*/
