CREATE TABLE everybody(
	user_global_id INT NOT NULL AUTO_INCREMENT,
	fname VARCHAR(20) NOT NULL,
	lname VARCHAR(20) NOT NULL,
	full_name VARCHAR(40) NOT NULL,
	username VARCHAR(20) NOT NULL,
	email VARCHAR(100) NOT NULL,
	unique_pass VARCHAR(100) NOT NULL,
	signed_on VARCHAR(12) NOT NULL,
	act_state VARCHAR(5) NOT NULL,
	PRIMARY KEY(user_global_id),
	INDEX(email)
)	ENGINE=InnoDB AUTO_INCREMENT=260500; 
 
CREATE TABLE jokers(
	id INT NOT NULL AUTO_INCREMENT,
	username VARCHAR(20) NOT NULL,
	email VARCHAR(100) NOT NULL,
	smile VARCHAR(100) NOT NULL,
	PRIMARY KEY(id),
	INDEX(email)
)	ENGINE=InnoDB AUTO_INCREMENT=1; 
 
CREATE TABLE mail_act(
	id INT NOT NULL AUTO_INCREMENT,
	username VARCHAR(20) NOT NULL,
	token VARCHAR(100) NOT NULL,
	resource VARCHAR(50) NOT NULL,
	time VARCHAR(12) NOT NULL,
	PRIMARY KEY(id),
	INDEX(username)
)	ENGINE=InnoDB AUTO_INCREMENT=1; 

CREATE TABLE seafile(
	user_global_id INT NOT NULL,
	profile_pic VARCHAR(30) NOT NULL,
	name VARCHAR(40) NOT NULL,
	PRIMARY KEY(user_global_id),
	INDEX(name)
)	ENGINE=InnoDB; 

CREATE TABLE friendlist(
	sender INT NOT NULL,
	reciever INT NOT NULL,
	state INT NOT NULL,
	INDEX(sender),INDEX(reciever)
)	ENGINE=InnoDB; 

CREATE TABLE notifications(
	nid VARCHAR(20) NOT NULL,
	userid INT NOT NULL,
	PRIMARY KEY(nid),
	INDEX(userid)
)	ENGINE=InnoDB; 

CREATE TABLE notification_type(
	ntid VARCHAR(20) NOT NULL,
	notificationsID VARCHAR(20) NOT NULL,
	type INT NOT NULL,
	PRIMARY KEY(ntid),
	FOREIGN KEY(notificationsID) REFERENCES notifications(nid),
	INDEX(notificationsID)
)	ENGINE=InnoDB; 

CREATE TABLE notification_change(
	ncid VARCHAR(20) NOT NULL,
	notificationTID VARCHAR(20) NOT NULL,
	action VARCHAR(2) NOT NULL,
	actor INT NOT NULL,
	PRIMARY KEY(ncid),
	FOREIGN KEY(notificationTID) REFERENCES notification_type(ntid)
)	ENGINE=InnoDB; 

 