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
	actionverb VARCHAR(2) NOT NULL,
	actor INT NOT NULL,
	PRIMARY KEY(ncid),
	FOREIGN KEY(notificationTID) REFERENCES notification_type(ntid)
)	ENGINE=InnoDB; 
