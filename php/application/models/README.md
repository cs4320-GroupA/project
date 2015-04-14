## Retrieve Model:
####    1. getFormByID function : 
  returns form input (from both the form and form_data tables) when supplied a unique form ID
        
**input** : formID ( int )

**output**: an associative array consisting of...
- *form_id* - unique form id, from form table (int)
- *semester_id* - id number of semester, from semester table (int)
- *submission_date* - date of form submission, from form table (date, ex "2014-12-20")
- *user_id* - id of user on the website, form/user_id tables (int)
- *first_name* - f name of applicant, form_data table (varchar(50))
- *last_name* - l name of applicant, form_data table (varchar(50))
- *mizzou_email* - contact email, form_data table (varchar(50))
- *student_id* - mizzou student ID num, form_data table (varchar(10))
- *assistant_type* - TA/PLA, form_data table (varchar(3)
- *expected_graduation* - date of graduation, form_data table (varchar(50))
- *SPEAK_OPT_score* - test score, form_data table (float)
- *advisor* - from form_data table (varchar(50))
- *gpa* - from form_data table (float)
- *phone_number* - from form_data table (int)
- *last_date_of_test* - most recent SPEAK/OPT test date, from form_data table (date, ex "2014-12-20")

####    2. getFormByUSER function : 
   (same idea as getFormByID) returns form input (from both the form and form_data tables) when supplied a unique user ID (website ID)

**input** : userID ( int )

**output**: an associative array consisting of...
- *form_id* - unique form id, from form table (int)
- *semester_id* - id number of semester, from semester table (int)
- *submission_date* - date of form submission, from form table (date, ex "2014-12-20")
- *user_id* - id of user on the website, form/user_id tables (int)
- *first_name* - f name of applicant, form_data table (varchar(50))
- *last_name* - l name of applicant, form_data table (varchar(50))
- *mizzou_email* - contact email, form_data table (varchar(50))
- *student_id* - mizzou student ID num, form_data table (varchar(10))
- *assistant_type* - TA/PLA, form_data table (varchar(3)
- *expected_graduation* - date of graduation, form_data table (varchar(50))
- *SPEAK_OPT_score* - test score, form_data table (float)
- *advisor* - from form_data table (varchar(50))
- *gpa* - from form_data table (float)
- *phone_number* - from form_data table (int)
- *last_date_of_test* - most recent SPEAK/OPT test date, from form_data table (date, ex "2014-12-20")   
**OR**
- -1 if query failure

---

## Submit_Model:

####    1. Submit_form function : 

adds inputted form data into form and form_data tables in database

**input**:
        
- *$fname* - first name of applicant (varchar(50))
- *$lname* - last name of applicant (varchar(50))
- *$email* - contact email (varchar(50))
- *$studentID* - student ID of applicant (varchar(10))
- *$asstType* - position applied for, ex. TA/PLA (varchar(3))
- *$expected_grad* - date of graduation (varchar(50))
- *$speakOPTscore* - test score (float)
- *$lastTestDate* - last date of test (date, ex "2014-12-20")
- *$advisor* - advisor name (varchar(50))
- *$gpa* - (float)
- *$phone* - (int)
- *$semester_ID* - unique semester ID in relation to semester table (int)
- *$user_id* - website user ID (int)
- *$sub_date* - date of submission (date, ex "2014-12-20") 

**output**:

- *-1* if query failed
- *1* if query success
