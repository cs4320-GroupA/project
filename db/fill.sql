INSERT INTO account_type (account_type_name) VALUES ('APPLICANT'), ('INSTRUCTOR'), ('ADMIN');

INSERT INTO status (status_title) VALUES ('APPLICATION'), ('SELECTION'), ('NOTIFICATION'), ('CLOSED');

INSERT INTO semester (semester_title, status) VALUES ('FALL 2015', (SELECT status_id FROM tasub.status WHERE status_title = 'APPLICATION'));

INSERT INTO user (username, password, salt, account_type) 
VALUES  ('admin', 'f0578f1e7174b1a41c4ea8c6e17f7a8a3b88c92a', '1', (SELECT account_type_id FROM tasub.account_type WHERE account_type_name = 'ADMIN'));

INSERT INTO course (course_name, semester) VALUES ('CS 1000: Introduction to Computer Science', 'FALL 2015'),
										('CS 1050: Algorithm Design and Programming 1', 'FALL 2015'),
										('CS 2050: Algorithm Design and Programming 2', 'FALL 2015'),
										('CS 2270: Introduction to Digital Logic', 'FALL 2015'),
										('CS 3050: Advanced Algorithm Design', 'FALL 2015'),
										('CS 3280: Computer Organization & Assembly Language', 'FALL 2015'),
										('CS 3330: Object Oriented Programming', 'FALL 2015'),
										('CS 3380: Database Applications and Information Systems', 'FALL 2015'),
										('CS 4050: Design and Analysis of Algorithms 1', 'FALL 2015'),
										('CS 4320: Software Engineering 1', 'FALL 2015'),
										('CS 4520: Operating Systems 1', 'FALL 2015'),
										('CS 4850: Computer Networks 1', 'FALL 2015'),
										('CS 4970: Senior Capstone Design', 'FALL 2015'),
										('CS 4980: Senior Capstone Design 2', 'FALL 2015'),
										('CS 2830: Introduction to the Internet, WWW, & Multimedia Systems', 'FALL 2015'),
										('CS 3530: Unix Operating System', 'FALL 2015'),
										('CS 4060: String Algorithms', 'FALL 2015'),
										('CS 4270: Computer Architecture 1', 'FALL 2015'),
										('CS 4380: Database Management Systems 1', 'FALL 2015'),
										('CS 4410: Theory of Computation 1', 'FALL 2015'),
										('CS 4430: Compilers 1', 'FALL 2015'),
										('CS 4450: Principles of Programming Languages', 'FALL 2015'),
										('CS 4440: Malware Analysis and Defense', 'FALL 2015'),
										('CS 4610: Compuer Graphics 1', 'FALL 2015'),
										('CS 4620: Physically Based Modeling & Animation', 'FALL 2015'),
										('CS 4650: Digital Image Processing', 'FALL 2015'),
										('CS 4730: Building Intelligent Robots', 'FALL 2015'),
										('CS 4740: Interdisc. Intro. to Natural Language Processing', 'FALL 2015'),
										('CS 4750: Artificial Intelligence 1', 'FALL 2015'),
										('CS 4770: Intro to Computational Intelligence', 'FALL 2015'),
										('CS 4830: Science and Engineering of the World Wide Web', 'FALL 2015'),
										('InfoTc 2610: Audio/Video 1', 'FALL 2015'),
										('InfoTc 2810: Fundamentals of Network Technology', 'FALL 2015'),
										('InfoTc 2910: Cyber Security', 'FALL 2015'),
										('InfoTc 1610: Introduction to Entertainment Media', 'FALL 2015'),
										('InfoTc 2600: Digital Multimedia', 'FALL 2015'),
										('InfoTc 2620: Computer Modeling & Animation 1', 'FALL 2015'),
										('InfoTc 3610: Audio/Video 2', 'FALL 2015'),
										('InfoTc 3620: Computer Modeling & Animation 2', 'FALL 2015'),
										('InfoTc 3630: Intro to Game Design', 'FALL 2015'),
										('InfoTc 3640: Digital Effects', 'FALL 2015'),
										('InfoTc 3850: Computer System Administration', 'FALL 2015'),
										('InfoTc 4440: C#/.NET Development', 'FALL 2015'),
										('InfoTc 4500: Team-based Mobile Application Development', 'FALL 2015'),
										('InfoTc 4440: Digital Effects 2', 'FALL 2015');