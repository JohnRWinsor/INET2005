-- *********************************************************
-- Purpose: Populate the NSCC Schedule database
-- Author: David Kristiansen
-- Date: October 2015

-- NOTE: Run creNSCCSchedTbls.sql before running this script
-- *********************************************************

USE NSCCSchedule;
SET SQL_SAFE_UPDATES = 0;
START TRANSACTION;

-- Clear the tables' contents
-- TRUNCATE Course;
-- TRUNCATE Instructor;
-- TRUNCATE Room;
-- TRUNCATE Program;
DELETE FROM Course;
DELETE FROM Instructor;
DELETE FROM Room;
DELETE FROM Program;

-- Insert Programs
INSERT INTO Program (ProgramId,Code, Title) VALUES (1,'ITPR', 'IT Programming');

-- Insert Rooms
INSERT INTO Room (RoomId,Campus, Building, RoomNumber) VALUES (1,'Annapolis Valley Campus','COGS','RM114');
INSERT INTO Room (RoomId,Campus, Building, RoomNumber) VALUES (2,'Annapolis Valley Campus','COGS','RM115');

-- Insert Instructors
INSERT INTO Instructor (InstructorId,FirstName, LastName) VALUES (1,'Mr', 'Potatohead');
INSERT INTO Instructor (InstructorId,FirstName, LastName) VALUES (2,'Ms', 'Pacman');
INSERT INTO Instructor (InstructorId,FirstName, LastName) VALUES (3,'OK', 'Computer');
INSERT INTO Instructor (InstructorId,FirstName, LastName) VALUES (4,'Gary', 'Newman');
INSERT INTO Instructor (InstructorId,FirstName, LastName) VALUES (5,'Lux', 'Lether');
INSERT INTO Instructor (InstructorId,FirstName, LastName) VALUES (6,'Fran', 'Dresser');
INSERT INTO Instructor (InstructorId,FirstName, LastName) VALUES (7,'John', 'Madden');
INSERT INTO Instructor (InstructorId,FirstName, LastName) VALUES (8,'Phil', 'Spector');
INSERT INTO Instructor (InstructorId,FirstName, LastName) VALUES (9,'Shy', 'Guy');
INSERT INTO Instructor (InstructorId,FirstName, LastName) VALUES (10,'Sharla', 'Rolf-Hunter');
INSERT INTO Instructor (InstructorId,FirstName, LastName) VALUES (11,'Martha', 'Botswick');
INSERT INTO Instructor (InstructorId,FirstName, LastName) VALUES (12,'David', 'Kristiansen');

-- Insert Courses
INSERT INTO Course (CourseCode,CourseNum,Active,Room,Program,Instructor,Title) VALUES ('COMM','4700',0,NULL,1,NULL,'Proffesional Practices IV');
INSERT INTO Course (CourseCode,CourseNum,Active,Room,Program,Instructor,Title) VALUES ('PROG','2700',0,NULL,1,12,'Client Side Programming');
INSERT INTO Course (CourseCode,CourseNum,Active,Room,Program,Instructor,Title) VALUES ('PROG','2007',0,NULL,1,12,'Programmming II');
INSERT INTO Course (CourseCode,CourseNum,Active,Room,Program,Instructor,Title) VALUES ('PROG','1400',0,NULL,1,12,'Introduction to OOP');
INSERT INTO Course (CourseCode,CourseNum,Active,Room,Program,Instructor,Title) VALUES ('APPD','1001',0,NULL,1,NULL,'User Interface Design and Developement');
INSERT INTO Course (CourseCode,CourseNum,Active,Room,Program,Instructor,Title) VALUES ('MOBI','3002',1,2,1,12,'Mobile Application Development - Android');
INSERT INTO Course (CourseCode,CourseNum,Active,Room,Program,Instructor,Title) VALUES ('PROG','2200',1,2,1,12,'Advanced OOP');
INSERT INTO Course (CourseCode,CourseNum,Active,Room,Program,Instructor,Title) VALUES ('INET','2005',1,2,1,12,'Web Application Programming I');
INSERT INTO Course (CourseCode,CourseNum,Active,Room,Program,Instructor,Title) VALUES ('PROG','1700',1,1,1,10,'Logic and Programming');
INSERT INTO Course (CourseCode,CourseNum,Active,Room,Program,Instructor,Title) VALUES ('PROG','2100',1,2,1,10,'Programming C++');
INSERT INTO Course (CourseCode,CourseNum,Active,Room,Program,Instructor,Title) VALUES ('INFT','2100',1,2,1,10,'Project Management');
INSERT INTO Course (CourseCode,CourseNum,Active,Room,Program,Instructor,Title) VALUES ('COMM','3700',1,2,1,11,'Professional Practices for IT III');

UPDATE Course SET Description = 'This course is the final in a suite of four, and as such provides learners with the skills and knowledge to curate a personal, professional portfolio in readiness for employment in the IT industry . Learners will also regularly practice and prepare for numerous interview situations and scenarios by honing the skills and techniques previously acquired. New, essential competencies are introduced focused on diversity and inclusiveness in the workplace and the challenges surrounding ethical decision making processes.' 
WHERE CourseCode = 'COM' AND CourseNum = '4700';
UPDATE Course SET Description = 'This course builds on the concepts covered in Introduction to HTML by adding functionality to static web pages through client side programming and CSS pre-processors / libraries. A heavy focus is placed on developing without the use of large JS frameworks/libraries. Foundational data sending and retrieval will also be explored using JSON data formats.' 
WHERE CourseCode = 'PROG' AND CourseNum = '2700';
UPDATE Course SET Description = 'This course introduces students to the C programming language, focusing on the various uses of pointers, efficient memory management and interfacing with the standard C libraries. The course will also highlight the differences between the C language and other common programming languages that learners may be familiar with, in terms of syntax and coding practices.' 
WHERE CourseCode = 'PROG' AND CourseNum = '2007';
UPDATE Course SET Description = 'This course is an introduction to the essentials of object oriented programming (OOP). This course provides an explanation of the paradigm on which OOP is based, and how it affects programming strategies and solutions.' 
WHERE CourseCode = 'PROG' AND CourseNum = '1400';
UPDATE Course SET Description = 'This course provides an introduction to effective and usable interface design . Emphasis will be placed on designing user experiences that adhere to industry standards. Starting from project requirements, learners will design user interfaces and test for usability. Both desktop and web application interfaces will be explored.' 
WHERE CourseCode = 'APPD' AND CourseNum = '1001';
UPDATE Course SET Description = 'In this course students will develop mobile software applications that run on the Android platform.' 
WHERE CourseCode = 'MOBI' AND CourseNum = '3002';
UPDATE Course SET Description = 'Advanced object-oriented programming (OOP) builds on the student’s understanding of object-oriented concepts in a project-based learning environment. The course includes application of object-oriented design principles and the software design patterns upholding these principles. This course includes development of network-aware applications and uses approaches such as multi-threading and distributed application models.' 
WHERE CourseCode = 'PROG' AND CourseNum = '2200';
UPDATE Course SET Description = 'This course focuses on the planning, design and development of dynamic (data-aware) web pages using server-side scripting and database connectivity.' 
WHERE CourseCode = 'INET' AND CourseNum = '2005';
UPDATE Course SET Description = 'This course introduces the fundamentals of logic and computer programming and their role in the creation of software solutions for any problem. Logic is used to break down complex problems into manageable tasks to allow for comprehensive problem-solving using computer code. This course covers the process of creating logical designs and implementing them as programmatic code to build computer software programs.' 
WHERE CourseCode = 'PROG' AND CourseNum = '1700';
UPDATE Course SET Description = 'This course introduces learners to the C++ programming language, focusing on the use of pointers, memory management, generic programming and the Standard Template Library. Exploration of the language in a project context aims at reinforcing object-orient design principles; use of idioms design patterns; use of UML in design and documentation; and utilization of third-party libraries.' 
WHERE CourseCode = 'PROG' AND CourseNum = '2100';
UPDATE Course SET Description = 'This course covers the basic theory and skills that introduce the learners to the process of effective project management and the unique challenges of Information Technology (IT) projects and methodologies.' 
WHERE CourseCode = 'INFT' AND CourseNum = '2100';
UPDATE Course SET Description = 'This course develops the skills, attitudes, processes and habits required to successfully prepare for a variety of interview scenarios and the associated presentation techniques. Emphasis is on the development of a professional portfolio and the part that personal marketing plays in gaining successful, relevant employment. The course will also continue to build professional habits, methodologies and strategies to help graduates remain current and relevant in an ever evolving profession.' 
WHERE CourseCode = 'COMM' AND CourseNum = '3700';

commit;
SET SQL_SAFE_UPDATES = 1;