<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samrech-Web-Developer</title>
    
    <!-- custom css -->
    <link rel="stylesheet" href="./string.css">
</head>
<body>

    <!-- header -->
    <header class="header">
        <a href="#" class="logo">Lesson PHP</a>

        <i class="bx bx-menu" id="menu-icon"></i>

        <nav class="navbar">
            <a href="index.php" class="">Home</a>
            <a href="string.php" class="active">string</a>
            <a href="#int">int</a>
            <a href="#float">float</a>
            <a href="#bool">bool</a>
            <a href="#array">array</a>
            <a href="#object">object</a>
            <a href="#null">null</a>
            <a href="#resource">resource</a>
        </nav>
    </header>

    <!-- home -->
    <section class="home" id="home">
        <div class="home-content">
            <h3>String (text values) : បន្ដុំនៃតួអក្សរ </h3><br>
            <div class="home-img">
            <img src="./pcstring.png" alt="">
            </div>
        </div>
        <a href="https://www.w3schools.com/php/phptryit.asp?filename=tryphp_var_dump" class="btn">Practice </a>
        
    </section>
    
    <!-- int -->
    <section class="int" id="int">
        <div class="about-img">
            <h3>Int (whole numbers) : លេខជាចំនួនគត់ </h3><br>
            <img src="./pcint.png" alt="">
        </div>
        <a href="https://www.w3schools.com/php/phptryit.asp?filename=tryphp_datatypes_integer" class="btn">Practice </a>
        <div class="about-content">
           
        </div>
    </section>
    
    <!-- float -->
    <section class="float" id="float">
        <div class="float-img">
            <h3>Float (decimal numbers) : លេខជាចំនួនទសភាគ </h3><br>
            <img src="./pcfloat.png" alt="">
        <a href="https://www.w3schools.com/php/phptryit.asp?filename=tryphp_datatypes_float" class="btn">Practice </a>
        </div>
        <div class="about-content">
           
        </div>
    </section>

    <!-- bool -->
    <section class="bool" id="bool">
        <div class="bool-img">
            <h3>Bool (true or false) : តម្លៃពិសេសគឺ true ឬ fals </h3><br>
            <img src="./pcbool.png" alt="">
        </div>
        <a href="https://www.w3schools.com/php/phptryit.asp?filename=tryphp_datatypes_integer" class="btn">Practice </a>
        <div class="about-content">
           
        </div>
    </section>

    
    <!-- array -->
    <section class="array" id="array">
        <div class="home-content">
            <h3>Array (multiple values) : ផ្ទុកតម្លៃច្រើន</h3><br>
            <div class="array-img">
            <img src="./pcarray.png" alt="">
            </div>
        </div>
        <a href="https://www.w3schools.com/php/phptryit.asp?filename=tryphp_datatypes_array" class="btn">Practice </a>
        
    </section>
    
    <!-- object -->
    <section class="object" id="object">
        <div class="home-content">
            <h3>Object (stores data as objects) : កម្មវិធីតម្រង់ទិសវត្ថុ </h3><br>
            <div class="array-img">
            <img src="./pcobject.png" alt="">
            </div>
        </div>
        <a href="https://www.w3schools.com/php/phptryit.asp?filename=tryphp_datatypes_object_var_dump" class="btn">Practice </a>
        
    </section>
    
    <!-- home -->
    <section class="null" id="null">
        <div class="home-content"> 
            <h3>Null (empty variable) : អថេរគ្មានតម្លៃ</h3><br>
            <div class="null-img">
            <img src="./pcnull1.png" alt="" class="n1img">
             <!--<img src="./pcnull2.png" alt="" class="n2img">-->
            </div>
             <a href="https://www.w3schools.com/php/phptryit.asp?filename=tryphp_numbers2" class="btn">Practice </a>
        </div>

        <div class="null2-img">
            <img src="./pcnull2.png" alt="">
        </div>

    </section>

    
    <!-- resource -->
    <section class="resource" id="resource">
        <div class="home-content">
            <h3>Resource (references exteral resources) : ភ្ជាប់ជាមួយធនធានខាងក្រៅ</h3><br>
            <div class="array-img">
            <img src="./pcre.png" alt="">
            </div>
        </div>
        <a href="https://www.w3schools.com/php/exercise.asp?x=xrcise_datatypes1" class="btn">Exercise</a>
        
    </section>

    <!-- script -->
    <script src="./main.js"></script>
</body>
</html>