/*
 *  init file for database tables
 *  cs4320 - group A
 *  March 17, 2015
 */

use tasub;

/*
 * user - base table for all users (TAs, Admins, Instructors)
 */
create table user(
    user_id int not null auto_increment,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    mizzou_email varchar(50) not null,
    username varchar(20) not null,
    password varchar(30) not null,
    salt varchar(30) not null,
    account_type varchar(15) not null,
    primary key(user_id)
) character set 'utf8';

/*
 * account type - to distinguish between TAs, instructors, and admins
 */
create table account_type(
    account_type_id int not null auto_increment,
    account_type_name varchar(15) not null,
    primary key( account_type_id )
)character set 'utf8';

/*
 * form - application to be submitted by TA/PLA applicants
 */
create table form(
    form_id int not null auto_increment,
    semester_id references semester(semester_id),
    user_id int,
    submission_date date not null,
    form_data references form_data( form_data_id ),
    user_id references user(user_id),
    primary key( form_id, semester_id )
)character set 'utf8';

/*
 * form_data - table that holds the input from the forms submitted by TA/PLA applicants
 */
create table form_data(
    form_data_id int auto_increment,
    student_id varchar(10) not null,
    expected_graduation varchar(50) not null,
    SPEAK-OPT_score float,
    last_date_of_test date,
    advisor varchar(50) not null,
    gpa float not null,
    phone_number int,
    primary key( form_data_id )
)character set 'utf8';

/*
 * semester
 */
create table semester(
    semester_id int auto_increment,
    semester_title varchar(20),
    status references status(status_id),
    primary key( semester_id )
)character set 'utf8';

/*
 * status - indicates progress of semester (?)
 */
create table status(
    status_id int auto_increment,
    status_title varchar(20),
    primary key( status_id )
)character set 'utf8';

/*
 * course
 *
 */
create table course(
    course_id int auto_increment,
    course_name varchar(50),
    instructor_id varchar(20),
    primary key( course_id, course_name )
)character set 'utf8';

/*
 * comments - instructor comments on previous preformance of TAs
 */
create table previous_taken(
    comment_id int auto_increment,
    posted_by references user( user_id ),
    posted_about references user( user_id ),
    score float,
    description text,
    primary key( comment_id, posted_by, posted_about )
)character set 'utf8';

--
--	Many to many relationship tables...
--
 
/*
 * Form-data & course tables...
 */
 
create table previous_taken(
	previous_taken_id int auto_increment,
	course_id references course( course_id ),
	course_name references course( course_name ),
	form_data_id references form_data( form_data_id ),
	grade float not null,
	primary key( previous_taken_id, course_id, course_name, form_data_id )
)character set 'utf8'; 

create table previous_taught(
	previous_taught_id int auto_increment,
	course_id references course( course_id ),
	course_name references course( course_name ),
	form_data_id references form_data(form_data_id),
	primary key( previous_taught_id, course_id, course_name, form_data_id )
)character set 'utf8';

create table desired_courses(
	desired_course_id int auto_increment,
	course_id references course( course_id ),
	course_name references course( course_name ),
	form_data_id references form_data( form_data_id ),
	primary key( desired_course_id, course_id, course_name, form_data_id )
)character set 'utf8'; 
 
/*
 *	form and course tables...
 */
create table assigned_courses(
	assigned_id int auto_increment,
	course_id references course( course_id ),
	course_name references course( course_name ),
	form_id references form( form_id ),
	semester_id references semester( semester_id ),
	primary key( assigned_id, course_id, course_name, form_id, semester_id )
) character set 'utf8'; 

create table course_preference(
	preference_id int auto_increment,
	course_id references course( course_id ),
	course_name references course( course_name ),
	form_id references form( form_id ),
	semester_id references semester( semester_id ),
	preference_number int,
	primary key( preference_id, course_id, course_name, form_id, semester_id )
) character set 'utf8';

