<?php
$activePage = 'courselist';
$pageName = 'Course List';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pageName;?></title>
        <link rel="stylesheet" href="./sections/style.css">
    </head>
    
    <body class="courselist-page">
    <?php include './sections/header.php' ?>
    <?php include './sections/nav.php' ?>

    <h2>Course List</h2>

<div class="course">
    <h3 class="course-title">PROG2200</h3>
    <h4 class="instructor-name">David Kristiansen</h4>
    <p class="course-description">Advanced object-oriented programming (OOP) builds on the student’s understanding of object-oriented
concepts in a project-based learning environment. The course includes application of object-oriented design
principles and the software design patterns upholding these principles. This course includes development of
network-aware applications and uses approaches such as multi-threading and distributed application models.</p>

    <h3 class="course-title">INET2005</h3>
    <h4 class="instructor-name">David Kristiansen</h4>
    <p class="course-description">This course focuses on the planning, design and development of dynamic (data-aware) web pages using
server-side scripting and database connectivity</p>

    <h3 class="course-title">PROG2100</h3>
    <h4 class="instructor-name">Sharla Rolfe-Hunter</h4>
    <p class="course-description">This course introduces learners to the C++ programming language, focusing on the use of pointers, memory
management, generic programming and the Standard Template Library. Exploration of the language in a
project context aims at reinforcing object-orient design principles; use of idioms design patterns; use of UML in
design and documentation; and utilization of third-party librarie</p>

    <h3 class="course-title">MOBI3002</h3>
    <h4 class="instructor-name">David Kristiansen</h4>
    <p class="course-description">In this course students will develop mobile software applications that run on the Android platform</p>

    <h3 class="course-title">INFT2100</h3>
    <h4 class="instructor-name">Sharla Rolfe-Hunter</h4>
    <p class="course-description">This course covers the basic theory and skills that introduce the learners to the process of effective project
management and the unique challenges of Information Technology (IT) projects and methodologies.</p>

    <h3 class="course-title">COMM3700</h3>
    <h4 class="instructor-name">Martha Bostwick</h4>
    <p class="course-description">This course develops the skills, attitudes, processes and habits required to successfully prepare for a variety
of interview scenarios and the associated presentation techniques. Emphasis is on the development of a
professional portfolio and the part that personal marketing plays in gaining successful, relevant employment.
The course will also continue to build professional habits, methodologies and strategies to help graduates
remain current and relevant in an ever evolving profession</p>
    
</div>


    </body>