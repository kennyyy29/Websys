<?php
// Personal Details
$name = "John Kenneth Bagotsay"; 
$role = "Web Designer"; 
$phone = "0931839572"; 
$email = "kinnethbagotsay@gmail.com"; 
$linkedin = "linkedin.com/in/johnkennethbagotsay"; 
$github = "github.com/jkennyy"; 
$address = "Estanza, Bolinao, Pangasinan"; 
$dob = "November 29, 2003"; 
$gender = "Male";
$nationality = "Filipino";

// Summary
$summary = "Creative and detail-oriented Web Designer with a strong foundation 
in front-end development and user experience design. Passionate about creating 
visually appealing, functional, and user-friendly websites. Eager to apply 
design and coding skills to deliver high-quality digital solutions.";
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $name; ?> - Resume</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #fff;
        }

        /* HEADER */
        .header {
            display: flex;
            background: #0073b1;
            color: #fff;
            padding: 20px;
        }

        .header img {
            width: 130px;
            height: 150px;
            margin-right: 20px;
            object-fit: cover;
        }

        .header .left {
            flex: 1;
            display: flex;
            align-items: center;
        }
        .header .left .info {
            margin-left: 20px;
        }
        .header .left h1 {
            margin: 0;
            font-size: 24px;
        }
        .header .left h3 {
            margin: 5px 0 15px;
            font-size: 16px;
            font-weight: normal;
        }
        .header .left p {
            margin: 3px 0;
            font-size: 14px;
        }

        .header .right {
            flex: 1;
            padding-left: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .header .right p {
            margin: 4px 0;
            font-size: 14px;
        }

        /* CONTENT */
        .content {
            padding: 20px 40px;
        }

        /* indent for summary aligned with right column */
        .summary {
            margin-left: 150px; /* aligns text with Address column */
            max-width: 700px;
            font-size: 14px;
            line-height: 1.6;
        }

        /* Section Headings with stretched black line */
        .section-title {
            font-size: 18px;
            color: #000;
            margin-top: 25px;
            margin-bottom: 15px;
            font-weight: bold;
            border-bottom: 2px solid #000;
            padding-bottom: 4px;
            margin-left: 150px; /* keeps title aligned */
            width: calc(100% - 150px); /* line stretches full width from left edge of image */
            position: relative;
        }
        .section-title::before {
            content: "";
            position: absolute;
            left: -150px; /* extend line to start at left edge of profile picture */
            bottom: -2px;
            width: 150px;
            height: 2px;
            background: #000;
        }

        /* Education / Experience / Skills as table */
        .edu-item, .exp-item, .skill-item {
            display: grid;
            grid-template-columns: 150px auto;
            margin-bottom: 15px;
            margin-left: 150px; /* align with section line */
        }
        .edu-item .date, .exp-item .date {
            font-weight: bold;
            font-size: 14px;
        }
        .edu-item .details, .exp-item .details, .skill-item .details {
            font-size: 14px;
        }
        .edu-item .details b, .exp-item .details b {
            font-size: 15px;
        }
        .edu-item ul, .exp-item ul, .skill-item ul {
            margin: 5px 0 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>

<!-- HEADER -->
<div class="header">
    <div class="left">
        <img src="image.jpg" alt="Profile Picture">
        <div class="info">
            <h1><?php echo $name; ?></h1>
            <h3><?php echo $role; ?></h3>
            <p><b>Phone:</b> <?php echo $phone; ?></p>
            <p><b>Email:</b> <?php echo $email; ?></p>
            <p><b>LinkedIn:</b> <?php echo $linkedin; ?></p>
            <p><b>GitHub:</b> <?php echo $github; ?></p>
        </div>
    </div>
    <div class="right">
        <p><b>Address:</b> <?php echo $address; ?></p>
        <p><b>Date of Birth:</b> <?php echo $dob; ?></p>
        <p><b>Gender:</b> <?php echo $gender; ?></p>
        <p><b>Nationality:</b> <?php echo $nationality; ?></p>
    </div>
</div>

<!-- CONTENT -->
<div class="content">

    <!-- Summary -->
    <p class="summary"><?php echo $summary; ?></p>

    <!-- Education -->
    <div class="section-title">Education</div>
    <div class="edu-item">
        <div class="date">2020 – 2022</div>
        <div class="details">
            <b>Senior High School – Bolinao Integrated School</b><br>
            Academic Strand: ICT
            <ul>
                <li>Member, ICT Club</li>
            </ul>
        </div>
    </div>

    <div class="edu-item">
        <div class="date">2025 – Present</div>
        <div class="details">
            <b>Bachelor of Science in Information Technology</b><br>
            Pangasinan State University
        </div>
    </div>

    <!-- Experience -->
    <div class="section-title">Experience</div>
    <div class="exp-item">
        <div class="date">2025 – Present</div>
        <div class="details">
            <b>Freelance Web Designer</b>
            <ul>
                <li>Created user-friendly layouts with HTML, CSS, and JavaScript.</li>
            </ul>
        </div>
    </div>  

    <!-- Skills -->
    <div class="section-title">Skills</div>
    <div class="skill-item">
        <div class="date"></div>
        <div class="details">
            <ul>
                <li>HTML, CSS, JavaScript</li>
                <li>UI/UX Prototyping</li>
            </ul>
        </div>
    </div>

</div>

</body>
</html>
