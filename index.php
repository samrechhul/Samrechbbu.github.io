<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samrech-Web-Developer</title>

    <!-- box icons -->
    <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>

    <!-- custom css -->
    <link rel="stylesheet" href="./style.css">
</head>
<body>

    <!-- header -->
    <header class="header">
        <a href="#" class="logo">Protfolio</a>

        <i class="bx bx-menu" id="menu-icon"></i>

        <nav class="navbar">
            <a href="#home" class="active">Home</a>
            <a href="#about">About</a>
            <a href="#services">Services</a>
            <a href="#portfolio">Portfolio</a>
            <a href="#contact">Contact</a>
        </nav>
    </header>

    <!-- home -->
    <section class="home" id="home">
        <div class="home-content">
            <h3>Hello, It's Me</h3>
            <h1>Samrech Hul</h1>
            <h3>And I'm a <span>Frontend Developer</span></h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.Fugiat, ex?</p>
            <div class="social-media">
                <a href="#"><i class='bx bxl-facebook'></i></a>
                <a href="#"><i class='bx bxl-twitter'></i></a>
                <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                <a href="#"><i class='bx bxl-linkedin'></i></a>
            </div>
            <a href="#" class="btn">Download</a>
                <br><br>
                <br><br>
                <br><br>
                <br>
            <!-- footer -->
            <footer class="footer">

                <nav class="navbar">
                    <a href="datatype.php" class="active">Data Type</a>
                    <a href="exercise.php">Exercise</a>
                    <a href="#">Number</a>
                    <a href="#">Casting</a>
                   
                </nav>
            </footer>

        </div>

        <div class="home-img">
            <img src="./1.png" alt="">
        </div>

    </section>

    <!-- about -->
    <section class="about" id="about">
        <div class="about-img">
            <img src="./2.png" alt="">
        </div>

        <div class="about-content">
            <h2 class="heading">About <span>Me</span></h2>
            <h3>Frontend Developer</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt dicta doloremque incidunt iusto. Fuga quae nemo commodi, ut distinctio quas nisi molestiae aspernatur voluptates assumenda doloribus ducimus, fugiat nam laboriosam qui ex autem animi iste. Quo maxime voluptatibus illo necessitatibus quia sequi nulla, nesciunt earum quibusdam.</p>
            <a href="#" class="btn">Read More</a>
        </div>
    </section>

    <!-- services -->
    <section class="services" id="services">
        <h2 class="heading">Our <span>Services</span></h2>

            <div class="services-container">
                <div class="services-box">
                    <i class='bx bx-code-alt'></i>
                    <h3>Web Development</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor, minus facilis aperiam reiciendis distinctio quas suscipit nostrum excepturi a nobis!</p>
                    <a href="#" class="btn">Read More</a>
                </div>

                <div class="services-box">
                    <i class='bx bx-paint'></i>
                    <h3>Graphic Design</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor, minus facilis aperiam reiciendis distinctio quas suscipit nostrum excepturi a nobis!</p>
                    <a href="#" class="btn">Read More</a>
                </div>

                <div class="services-box">
                    <i class='bx bx-bar-chart-alt'></i>
                    <h3>Digital Marketing</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor, minus facilis aperiam reiciendis distinctio quas suscipit nostrum excepturi a nobis!</p>
                    <a href="#" class="btn">Read More</a>
                </div>
            </div>
    </section>

        <!-- protfolio -->
        <section class="portfolio" id="portfolio">
            <h2 class="heading">Latest <span>Project</span></h2>

            <div class="portfolio-container">
                <div class="portfolio-box">
                    <img src="./portfolio1.jpg" alt="">
                    <div class="portfolio-layer">
                        <h4>Web Design</h4>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, consequatur!</p>
                        <a href="#"><i class='bx bx-link-external'></i></a>
                    </div>
                </div>

                <div class="portfolio-box">
                    <img src="./portfolio2.jpg" alt="">
                    <div class="portfolio-layer">
                        <h4>Web Design</h4>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, consequatur!</p>
                        <a href="#"><i class='bx bx-link-external'></i></a>
                    </div>
                </div>

                <div class="portfolio-box">
                    <img src="./portfolio3.jpg" alt="">
                    <div class="portfolio-layer">
                        <h4>Web Design</h4>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, consequatur!</p>
                        <a href="#"><i class='bx bx-link-external'></i></a>
                    </div>
                </div>

                <div class="portfolio-box">
                    <img src="./portfolio4.jpg" alt="">
                    <div class="portfolio-layer">
                        <h4>Web Design</h4>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, consequatur!</p>
                        <a href="#"><i class='bx bx-link-external'></i></a>
                    </div>
                </div>

                <div class="portfolio-box">
                    <img src="./portfolio5.jpg" alt="">
                    <div class="portfolio-layer">
                        <h4>Web Design</h4>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, consequatur!</p>
                        <a href="#"><i class='bx bx-link-external'></i></a>
                    </div>
                </div>

                <div class="portfolio-box">
                    <img src="./portfolio6.jpg" alt="">
                    <div class="portfolio-layer">
                        <h4>Web Design</h4>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, consequatur!</p>
                        <a href="#"><i class='bx bx-link-external'></i></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- contact -->
          <section class="contact" id="contact">
            <h2 class="heading">Contact <span>Me!</span></h2>

            <form action="#">
                <div class="input-box">
                    <input type="text" placeholder="Full Name">
                    <input type="text" placeholder="Email Address">
                </div>
                <div class="input-box">
                    <input type="number" placeholder="Mobile Number">
                    <input type="text" placeholder="Email Subject">
                </div>
                <textarea name="" id="" cols="30" rows="5" placeholder="Your Message"></textarea>
                <input type="submit" value="Send Message" class="btn">
            </form>
          </section>

        <!-- footer -->
            <footer class="fonter">
                <div class="footer-text">
                    <p>Copyright &copy; 2024 by Samrech-Web | All Rights Reserved.</p>
                </div>

                <div class="footer-iconTop">
                    <a href="#home"><i class="bx bx-up-arrow-alt"></i></a>
                </div>
            </footer>

        <!-- script -->
        <script src="./main.js"></script>

</body>
</html>