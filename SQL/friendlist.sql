CREATE TABLE friendlist(
	sender INT NOT NULL,
	reciever INT NOT NULL,
	state INT NOT NULL,
	INDEX(sender),INDEX(reciever)
)	ENGINE=InnoDB; 