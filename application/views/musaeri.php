<html>

<head>
    <title>
        Musaeri
    </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            position: relative;
        }

        .header img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
        }

        .header h1 {
            margin: 10px 0 5px 0;
            font-size: 36px;
        }

        .header .social-icons {
            margin-top: 10px;
        }

        .header .social-icons a {
            color: #333;
            text-decoration: none;
            margin: 0 10px;
            font-size: 24px;
        }

        .header .social-icons a:hover {
            color: #4CAF50;
        }

        .profile,
        .contact,
        .hobbies,
        .education,
        .work-experience,
        .skills {
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 20px;
            margin-bottom: 10px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }

        .profile p,
        .contact p,
        .hobbies p,
        .education p,
        .work-experience p {
            margin: 5px 0;
        }

        .skills .skill {
            margin: 5px 0;
        }

        .skills .skill-name {
            display: inline-block;
            width: 100px;
        }

        .skills .skill-bar {
            display: inline-block;
            width: 200px;
            height: 20px;
            background-color: #ddd;
            border-radius: 10px;
            overflow: hidden;
            vertical-align: middle;
        }

        .skills .skill-bar div {
            height: 100%;
            border-radius: 10px;
        }

        .skills .skill-bar .skill-1 {
            width: 70%;
            background-color: #4CAF50;
        }

        .skills .skill-bar .skill-2 {
            width: 75%;
            background-color: #2196F3;
        }

        .skills .skill-bar .skill-3 {
            width: 100%;
            background-color: #f44336;
        }

        .skills .skill-bar .skill-4 {
            width: 90%;
            background-color: #ff9800;
        }

        .login-button {
            text-align: right;
            margin-top: 20px;
        }

        .login-button button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-button button:hover {
            background-color: #45a049;
        }

        .contact .social-icons {
            margin-top: 10px;
        }

        .contact .social-icons a {
            color: #333;
            text-decoration: none;
            margin-right: 10px;
        }

        .contact .social-icons a:hover {
            color: #4CAF50;
        }

        .contact .contact-info {
            display: flex;
            align-items: center;
            margin: 5px 0;
        }

        .contact .contact-info i {
            margin-right: 10px;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 90%;
            max-width: 400px;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .password-container {
            position: relative;
        }

        .password-container input[type="password"],
        .password-container input[type="text"] {
            width: calc(100% - 30px);
            padding-right: 30px;
        }

        .password-container .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }

        .image-slider {
            display: flex;
            overflow: hidden;
            width: 100%;
            margin-top: 20px;
            border-radius: 10px;
        }

        .image-slider img {
            width: 150px;
            height: 100px;
            border-radius: 10px;
            margin-right: 10px;
        }

        @keyframes slide {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .slider-wrapper {
            display: flex;
            animation: slide 10s linear infinite;
        }

        @media (max-width: 600px) {
            .header h1 {
                font-size: 28px;
            }

            .skills .skill-name {
                width: 80px;
            }

            .skills .skill-bar {
                width: 150px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="image-slider">
            <div class="slider-wrapper">
                <img alt="Image 1" height="100" src="<?= base_url('assets/images/iklan/pngwing.com (5).png') ?>" width="150" />
                <img alt="Image 2" height="100" src="<?= base_url('assets/images/iklan/pngwing.com (6).png') ?>" width="150" />
                <img alt="Image 3" height="100" src="<?= base_url('assets/images/iklan/pngwing.com (7).png') ?>" width="150" />
                <img alt="Image 4" height="100" src="https://storage.googleapis.com/a1aa/image/vjy6CKL26BqLMFOVivpyyLg3fKgeYejmuw2CijOLsdoiYWYnA.jpg" width="150" />
                <img alt="Image 5" height="100" src="https://storage.googleapis.com/a1aa/image/lNAEJJz6eQwxeUovfAUgXecuFYqQKBHV4LxEdelKkw0FiZhdC.jpg" width="150" />
                <img alt="Image 6" height="100" src="https://storage.googleapis.com/a1aa/image/YITUDtgNheTAXiMCBgRcl2wJ08TVUae3snfakPJ94fEowswOB.jpg" width="150" />
                <!-- Repeat images to create a continuous loop effect -->
                <img alt="Image 1" height="100" src="https://storage.googleapis.com/a1aa/image/2RAmVOYItC7nIBh1r5fedMU7feQRVfAquVO8zCDemlYUDzC7E.jpg" width="150" />
                <img alt="Image 2" height="100" src="https://storage.googleapis.com/a1aa/image/6tO06Wn8hwoqCJHc5JnVxjIZk8kGondvf1d6zVkmHQEHmF2JA.jpg" width="150" />
                <img alt="Image 3" height="100" src="https://storage.googleapis.com/a1aa/image/IA8MlvT1VQZfWyrZnrp0ecLmLZxXix8u0qdLX9pHkBKMMLsTA.jpg" width="150" />
                <img alt="Image 4" height="100" src="https://storage.googleapis.com/a1aa/image/vjy6CKL26BqLMFOVivpyyLg3fKgeYejmuw2CijOLsdoiYWYnA.jpg" width="150" />
                <img alt="Image 5" height="100" src="https://storage.googleapis.com/a1aa/image/lNAEJJz6eQwxeUovfAUgXecuFYqQKBHV4LxEdelKkw0FiZhdC.jpg" width="150" />
                <img alt="Image 6" height="100" src="https://storage.googleapis.com/a1aa/image/YITUDtgNheTAXiMCBgRcl2wJ08TVUae3snfakPJ94fEowswOB.jpg" width="150" />
            </div>
        </div>
        <div class="login-button">
            <!-- <button id="loginBtn">
                Login
            </button> -->
            <a href="<?= base_url('Authorization') ?>" type="button" class="login-button">Login</a>
        </div>
        <div class="header">
            <img alt="Profile Picture" height="150" src="<?= base_url('assets/images/musaeri.png') ?>" width="150" />
            <h1>
                Musaeri
            </h1>
            <div class="social-icons">
                <a href="https://www.youtube.com" target="_blank">
                    <i class="fab fa-youtube">
                    </i>
                </a>
                <a href="https://www.facebook.com" target="_blank">
                    <i class="fab fa-facebook">
                    </i>
                </a>
                <a href="https://www.instagram.com" target="_blank">
                    <i class="fab fa-instagram">
                    </i>
                </a>
                <a href="https://www.linkedin.com" target="_blank">
                    <i class="fab fa-linkedin">
                    </i>
                </a>
            </div>
        </div>
        <!-- <div class="profile">
            <div class="section-title">
                PROFILE
            </div>
            <p>
                Want to put your own image in the circle? It's easy! Select the image and do a right mouse click. Select "Fill" from the shortcut menu. Choose "Picture..." from the list. Navigate your picture to the appropriate picture. Click okay to insert your selected picture.
            </p>
            <p>
                If the picture has been inserted, select it again. Go to the Picture Tools Format menu. Click on the down arrow below "Crop" and select "Fill" from the list. This will adjust your image. You can also use the sizing handles to crop your image to place it appropriately.
            </p>
        </div> -->
        <div class="contact">
            <div class="section-title">
                CONTACT
            </div>
            <div class="contact-info">
                <i class="fas fa-phone">
                </i>
                <p>
                    Phone: +62812-1000-3701
                </p>
            </div>
            <div class="contact-info">
                <i class="fas fa-globe">
                </i>
                <p>
                    Website: https://musaeri.my.id
                </p>
            </div>
            <div class="contact-info">
                <i class="fas fa-envelope">
                </i>
                <p>
                    Email: my@musaeri.my.id
                </p>
            </div>

        </div>
        <!-- <div class="hobbies">
            <div class="section-title">
                HOBBIES
            </div>
            <p>
                Hobby #1
            </p>
            <p>
                Hobby #2
            </p>
            <p>
                Hobby #3
            </p>
            <p>
                Hobby #4
            </p>
        </div> -->
        <!-- <div class="education">
            <div class="section-title">
                EDUCATION
            </div>
            <p>
                [School Name]
            </p>
            <p>
                [Dates From] - [To]
            </p>
            <p>
                [It's okay to brag about your GPA, awards, and honors. Feel free to summarize your coursework too.]
            </p>
            <p>
                [School Name]
            </p>
            <p>
                [Dates From] - [To]
            </p>
            <p>
                [It's okay to brag about your GPA, awards, and honors. Feel free to summarize your coursework too.]
            </p>
        </div> -->
        <div class="work-experience">
            <div class="section-title">
                WORK EXPERIENCE
            </div>
            <p>
                [Company Name] [Job Title]
            </p>
            <p>
                [Dates From] - [To]
            </p>
            <p>
                [Describe your responsibilities and achievements in terms of impact and results. Use examples but keep it short.]
            </p>
            <p>
                [Company Name] [Job Title]
            </p>
            <p>
                [Dates From] - [To]
            </p>
            <p>
                [Describe your responsibilities and achievements in terms of impact and results. Use examples but keep it short.]
            </p>
            <p>
                [Company Name] [Job Title]
            </p>
            <p>
                [Dates From] - [To]
            </p>
            <p>
                [Describe your responsibilities and achievements in terms of impact and results. Use examples but keep it short.]
            </p>
        </div>
        <div class="skills">
            <div class="section-title">
                SKILLS
            </div>
            <div class="skill">
                <span class="skill-name">
                    Skill #1
                </span>
                <div class="skill-bar">
                    <div class="skill-1">
                    </div>
                </div>
            </div>
            <div class="skill">
                <span class="skill-name">
                    Skill #2
                </span>
                <div class="skill-bar">
                    <div class="skill-2">
                    </div>
                </div>
            </div>
            <div class="skill">
                <span class="skill-name">
                    Skill #3
                </span>
                <div class="skill-bar">
                    <div class="skill-3">
                    </div>
                </div>
            </div>
            <div class="skill">
                <span class="skill-name">
                    Skill #4
                </span>
                <div class="skill-bar">
                    <div class="skill-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- The Modal -->
    <div class="modal" id="loginModal">
        <div class="modal-content">
            <span class="close">
                ×
            </span>
            <h2>
                Login
            </h2>
            <form>
                <label for="username">
                    Username:
                </label>
                <input id="username" name="username" type="text" />
                <br />
                <br />
                <label for="password">
                    Password:
                </label>
                <div class="password-container">
                    <input id="password" name="password" type="password" />
                    <i class="fas fa-eye toggle-password" onclick="togglePassword()">
                    </i>
                </div>
                <br />
                <br />
                <button type="submit">
                    Submit
                </button>
            </form>
        </div>
    </div>
    <div class="footer">
        ©
        <span id="year">
        </span>
        All rights reserved.
    </div>
    <script>
        // Get the modal
        var modal = document.getElementById("loginModal");

        // Get the button that opens the modal
        var btn = document.getElementById("loginBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Toggle password visibility
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var toggleIcon = document.querySelector(".toggle-password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }

        // Set the current year in the footer
        document.getElementById("year").textContent = new Date().getFullYear();
    </script>
</body>

</html>