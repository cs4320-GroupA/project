INSERT INTO account_type (account_type_name) FROM tasub VALUES ('TA'), ('PLA'), ('INSTRUCTOR'), ('ADMIN');

INSERT INTO status (status_title) FROM tasub VALUES ('APPLICATION'), ('SELECTION'), ('NOTIFICATION'), ('CLOSED');

INSERT INTO semester (semester_title, status) FROM tasub VALUES ('FALL 2015', (SELECT id FROM tasub.status WHERE status_title = 'APPLICATION'));

INSERT INTO user (first_name, last_name, mizzou_email, username, password, salt, account_type) 
	FROM tasub VALUES 	('test', 'test', 'test', 'ta', 'pass', 'test_salt', (SELECT account_type_id FROM tasub.account_type WHERE account_type_name = 'TA'))
						('test', 'test', 'test', 'pla', 'pass', 'test_salt', (SELECT account_type_id FROM tasub.account_type WHERE account_type_name = 'PLA')) 
						('test', 'test', 'test', 'instructor', 'pass', 'test_salt', (SELECT account_type_id FROM tasub.account_type WHERE account_type_name = 'INSTRUCTOR')) 
						('test', 'test', 'test', 'admin', 'pass', 'test_salt', (SELECT account_type_id FROM tasub.account_type WHERE account_type_name = 'ADMIN'));

INSERT INTO course (ccourse_name) FROM tasub VALUES 	('CS 1000: Introduction to Computer Science')
														('CS 1050: Algorithm Design and Programming 1')
														('CS 2050: Algorithm Design and Programming 2')
														('CS 2270: Introduction to Ditgal Logic')
														('CS 3050: Advance Algorithm Design')
														('CS 3280: Computer Organization & Assembly Language')
														('CS 3330: Object Oriented Programming')
														('CS 3380: Database Applications and Information Systems')
														('CS 4050: Design and Analysis of Algorithms 1')
														('CS 4320: Software Engineering 1')
														('CS 4520: Operating Systems 1')
														('CS 4850: Computer Networks 1')
														('CS 4970: Senior Capstone Design')
														('CS 4980: Senior Capstone Design 2')
														('CS 2830: Introduction to the Internet, WWW & Multimedia Systems')
														('CS 3530: Unix Operating System')
														('CS 4060: String Algorithms')
														('CS 4270: Computer Architecture 1')
														('CS 4380: Database Management Systems 1')
														('CS 4410: Theory of Computation 1')
														('CS 4430: Compilers 1')
														('CS 4450: Principles of Programming Languages')
														('CS 4440: Malware Analysis and Defense')
														('CS 4610: Compuer Graphics 1')
														('CS 4620: Physically Based Modeling & Animation')
														('CS 4650: Ditgal Image Processing')
														('CS 4730: Building Intelligent Robots')
														('CS 4740: Interdisc. Intro. to Natural Language Processing')
														('CS 4750: Artificial Intelligence 1')
														('CS 4770: Intro to Computational Intelligence')
														('CS 4830: Science and Engineering of the World Wide Web')

														