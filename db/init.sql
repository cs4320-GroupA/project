/*
 *  init file for database tables
 *  cs4320 - group A
 *  March 17, 2015
 */

use tasub;

/*
 * user - base table for all users (TAs, Admins, Instructors)
 */
DROP TABLE IF EXISTS user;
create table user(
    user_id int not null auto_increment,
    username varchar(20) not null,
    password varchar(50) not null,
    salt varchar(30) not null,
    account_type varchar(15) references account_type(account_type_id),
    primary key(user_id)
) character set 'utf8';

/*
 * account type - to distinguish between TAs, instructors, and admins
 */
DROP TABLE IF EXISTS account_type;
create table account_type(
    account_type_id int not null auto_increment,
    account_type_name varchar(15) not null,
    primary key( account_type_id )
)character set 'utf8';

/*
 * form - application to be submitted by TA/PLA applicants
 */
DROP TABLE IF EXISTS form;
create table form(
    form_id int not null auto_increment,
    semester_id int references semester(semester_id),
    submission_date date not null,
    form_data int references form_data( form_data_id ),
    user_id int references user(user_id),
    signature varchar(50),
    signature_date varchar(10),
    primary key( form_id, semester_id )
)character set 'utf8';

/*
 * form_data - table that holds the input from the forms submitted by TA/PLA applicants
 */
DROP TABLE IF EXISTS form_data;
create table form_data(
    form_data_id int auto_increment,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    mizzou_email varchar(50) not null,
    student_id varchar(10) not null,
    assistant_type varchar(3) not null,
    expected_graduation varchar(50) not null,
    SPEAK_OPT_score float, 
    advisor varchar(50),
    gpa float not null,
    phone_number int,
    last_date_of_test varchar(20),
    grad_type varchar(4),
    other_work varchar(30),
    gato boolean,
    speak_assessment boolean,
    onita boolean,
    signature varchar(50),
    primary key( form_data_id )
)character set 'utf8';

/*
 * semester
 */
DROP TABLE IF EXISTS semester;
create table semester(
    semester_id int auto_increment,
    semester_title varchar(20),
    status int references status(status_id),
    primary key( semester_id )
)character set 'utf8';

/*
 * status - indicates progress of semester (?)
 */
DROP TABLE IF EXISTS status;
create table status(
    status_id int auto_increment,
    status_title varchar(20),
    primary key( status_id )
)character set 'utf8';

/*
 * course
 *
 */
DROP TABLE IF EXISTS course;
create table course(
    course_id int auto_increment,
    course_name varchar(50),
    semester varchar(20),
    instructor_id int references user(user_id),
    primary key( course_id, course_name )
)character set 'utf8';

/*
 * comments - instructor comments on previous preformance of TAs
 */
DROP TABLE IF EXISTS comments;
create table comments(
    comment_id int auto_increment,
    posted_by int references user( user_id ),
    posted_about int references user( user_id ),
    score float,
    description text,
    primary key( comment_id, posted_by, posted_about )
)character set 'utf8';

--
--  Many to many relationship tables...
--
 
/*
 * Form-data & course tables...
 */
DROP TABLE IF EXISTS previous_taken;
DROP TABLE IF EXISTS currently_teaching; 
create table currently_teaching(
    currently_teaching_id int auto_increment,
    course_id int references course( course_id ),
    course_name varchar(50) references course( course_name ),
    form_data_id int references form_data( form_data_id ),
    primary key( currently_teaching_id, course_id, course_name, form_data_id )
)character set 'utf8'; 

DROP TABLE IF EXISTS previous_taught; 
create table previous_taught(
    previous_taught_id int auto_increment,
    course_id int references course( course_id ),
    course_name varchar(50) references course( course_name ),
    form_data_id int references form_data(form_data_id),
    primary key( previous_taught_id, course_id, course_name, form_data_id )
)character set 'utf8';

DROP TABLE IF EXISTS desired_courses; 
create table desired_courses(
    desired_course_id int auto_increment,
    course_id int references course( course_id ),
    course_name varchar(50) references course( course_name ),
    form_data_id int references form_data( form_data_id ),
    grade float not null,
    primary key( desired_course_id, course_id, course_name, form_data_id )
)character set 'utf8'; 
 
/*
 *  form and course tables...
 */
DROP TABLE IF EXISTS assigned_courses; 
create table assigned_courses(
    assigned_id int auto_increment,
    course_id int references course( course_id ),
    course_name varchar(50) references course( course_name ),
    form_id int references form( form_id ),
    semester_id int references semester( semester_id ),
    primary key( assigned_id, course_id, course_name, form_id, semester_id )
) character set 'utf8'; 

DROP TABLE IF EXISTS course_preference; 
create table course_preference(
    preference_id int auto_increment,
    course_id int references course( course_id ),
    course_name varchar(50) references course( course_name ),
    form_id int references form( form_id ),
    semester_id int references semester( semester_id ),
    preference_number int,
    primary key( preference_id, course_id, course_name, form_id, semester_id )
) character set 'utf8';