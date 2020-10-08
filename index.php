<?php
include("includes/config.inc.php");
$errors = array('firstname'=>'', 'lastname'=>'', 'email'=>'', 'textarea'=>'');
$firstname = $lastname = $email = $textarea = '';


if(isset($_POST['submit'])) {	
	$firstname= $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$textarea = $_POST['textarea'];
		
	if(empty($firstname) || empty($lastname) || empty($email)|| empty($textarea)) {			
		

		if(isset($_POST['submit'])){
			if(empty($_POST['firstname'])){
				$errors['firstname'] = 'Firstname is required! <br />';
			}
			else{
				$firstname = $_POST['firstname'];
				if(!preg_match('/^[a-zA-Z\s]+$/', $firstname)){
					$errors['firstname'] = 'The name must contain only spaces and letters!';
				}
			}
			if(empty($_POST['lastname'])){
				$errors['lastname'] = 'Lastname is required! <br />';
			}
			else{
				$lastname = $_POST['lastname'];
				if(!preg_match('/^[a-zA-Z\s]+$/', $lastname)){
					$errors['lastname'] = 'The lastname must contain only spaces and letters!';
				}
			}
			if(empty($_POST['email'])){
				$errors['email'] = 'Email is required! <br />';
			}
			else{
				$email = $_POST['email'];
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$errors['email'] = 'Email must be a valid email address';
				}
			}
			if(empty($_POST['textarea'])){
				$errors['textarea'] = 'A message is required! <br />';
			}
			else{
				$textarea = $_POST['textarea'];
			}
        }
        
	} else { 
		$result = mysqli_query($conn, "INSERT INTO contacts(contact_firstname,contact_lastname,contact_email,contact_msg) VALUES('$firstname','$lastname','$email','$textarea')");
		header("Location: index.php?success");
	}
}
?>


<html>
<head>
    <meta charset="utf-8">
    <title>Personal Portfolio Website</title>
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" href="icon.png">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
    <!--Main Section-->
    <section id="main">
        <nav>
            <a href="#main" class="logo">Portfolio</a>
            <div class="toggle"></div>
            <ul class="menu">
                <li><a href="index.php#main">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
        <div class="name">
            <p>Hello There!</p>
            <h1>I'm Rinor Sylejmani</h1>
            <p class="details">A student of Computer Science and also a Cisco Certified Network Asocciate,
                in this Portfolio you can find my skills and qualifications </p>
            <a href="#about" class="about-btn">Get to Know Me</a>


        </div>
    </section>
    <!--About Section-->
    <section id="about">
        <div class="about-text">
            <h1>About Me</h1>
            <h2>Computer Scientist Student</h2>
            <p>My name is Rinor Sylejmani, a CSE student and a Cisco Certified Network Associate,
                 I'm 21 years old and currently unemployed.
                 Started as an intern in the best outsourcing company in Kosovo called Starlabs

                 </p>
            <button> View More </button>
        </div>
        <div class="about-img">
            <img alt="model" src="img/profile-img.jpg" />
        </div>


    </section>
    <!--Skills Section-->
    <section id="skills">
        <div class="heading">
            <h1>Skills</h1>
            <p>Here you can check about my skills</p>
        </div>
        <div class="box-container">
            <div class="skills-box">
                <div class="box-img">
                    <div class="skill-type">Front-End</div>
                    <img src="img/web-dev.jpg">
                </div>
                <div class="box-text">
                    <a href="#">Intermediate skills in Front-End technologies like HTML5, CSS3, JS and a little bit JQuery,
                         all these skills gained as a self-taught and from University </a>
                </div>
            </div>
            <div class="skills-box">
                <div class="box-img">
                    <div class="skill-type">Back-End</div>
                    <img src="img/web-dev1.jpg">
                </div>
                <div class="box-text">
                    <a href="#">Intermediate skills as a Back-End developer,
                        Knowledge for PHP, MySQL and as a begginer in Laravel framework</a>
                </div>
            </div>
            <div class="skills-box">
                <div class="box-img">
                    <div class="skill-type">Networking</div>
                    <img src="img/web-dev2.jpg">
                </div>
                <div class="box-text">
                    <a href="#">Proficient skills in network engineering,
                        Strong knowledge of routing protocols like OSPF,EIGRP,RIP etc. And also in
                        Layer 2 Switching.
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!--Contact Section-->
    <div class="contact-section" id="contact">
        <h1>Contact Me</h1>

        <div class="underline"></div>

        <form class="form-contact" action = "index.php#contact" method = "POST">
            <input type="text" class="input-text" name="firstname" placeholder="Firstname" value = "<?php echo $firstname ?>">
            <div class="error"><?php echo $errors['firstname']; ?></div>
            <input type="text" class="input-text" name="lastname" placeholder="Lastname" value = "<?php echo $lastname ?>">
            <div class="error"><?php echo $errors['lastname']; ?></div>
            <input type="email" class="input-text" name="email" placeholder="E-mail" value = "<?php echo $email ?>">
            <div class="error"><?php echo $errors['email']; ?></div>
            <textarea name="textarea" class="input-text" placeholder="Enter your text here!" value = "<?php echo $textarea ?>"></textarea>
            <div class="error"><?php echo $errors['textarea']; ?></div>
            <input type="submit" name="submit" class="form-btn" value="Send Message">
        </form>
    </div>


    <!--Footer Section-->
    <footer class="bg-dark">
        <p>Copyright &copy; 2020 All rights reserved.</p>
      </footer>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/3aa507f02d.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

</body>

</html>

