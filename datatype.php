<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samrech-Web-Developer</title>
    
    <!-- custom css -->
    <link rel="stylesheet" href="./style1.css">
</head>
<body>

    <!-- header -->
    <header class="header">
        <a href="#" class="logo">Protfolio</a>

        <i class="bx bx-menu" id="menu-icon"></i>

        <nav class="navbar">
            <a href="index.php" class="">Home</a>
            <a href="string.php" class="active">string</a>
            <a href="#int">int</a>
            <a href="#portfolio">float</a>
            <a href="#contact">bool</a>
            <a href="#about">array</a>
            <a href="#services">object</a>
            <a href="#portfolio">null</a>
            <a href="#contact">resource</a>
        </nav>
    </header>

    <!-- home -->
    <section class="home" id="home">
        <div class="home-content">
            <?php
            echo "<h3>PHP supports the following data types:<h3>";
            ?>
            <ul>
                <li><b>String</b> (text values)</li>
                <li><b>int</b> (whole numer)</li>
                <li><b>float</b> (decimal number)</li>
                <li><b>bool</b> (true or false)</li>
                <li><b>array</b> (multiple values)</li>
                <li><b>object</b> (stores data as objects)</li>
                <li><b>null</b> (empty variable)</li>
                <li><b>resource</b> (references external resources)</li>
            </ul>
        </div>

        <div class="home-img">
            <img src="" alt="">
            
            <?php
            
                //echo "<br> Example1: <br>";
                //echo "$"; echo "x"; echo " = "; echo "5; <br>";
                //$x = 5;
                //echo "var_dump"; echo "($"; echo "x) <br>";
                //echo "=>Result: <br>";
                //var_dump($x);
                

                //echo "<br><br> Example2: <br>";
                //echo "$"; echo "x"; echo " = "; echo "'Hello world'; <br>";
                //$x = 'Hello world';
                //echo "var_dump"; echo "($"; echo "x) <br>";
                //echo "=>Result: <br>";
                //var_dump($x);
                

                //echo "<br><br> Example3: <br>";
                //echo "$"; echo "x"; echo " = "; echo "5985; <br>";
                //$x = '5985';
                //echo "var_dump"; echo "($"; echo "x) <br>";
                //echo "=>Result: <br>";
                //var_dump($x);
                
            ?>  
        </div>
    </section>

    <script src=></script>
</body>
</html>