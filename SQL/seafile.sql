CREATE TABLE seafile(
	user_global_id INT NOT NULL,
	profile_pic VARCHAR(30) NOT NULL,
	name VARCHAR(40) NOT NULL,
	PRIMARY KEY(user_global_id),
	INDEX(name)
)	ENGINE=InnoDB; 
 