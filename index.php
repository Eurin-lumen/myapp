<?php

// Include database configuration file
include_once 'config/database.php';

// Include model files
include_once 'models/User.php';
include_once 'models/Course.php';
include_once 'models/Subject.php';
include_once 'models/Lesson.php';

// Initialize model objects
$user = new User();
$course = new Course();
$subject = new Subject();
$lesson = new Lesson();