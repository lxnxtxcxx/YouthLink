<?php include '../../connection/connection.php' ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>YouthLink</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link rel="stylesheet" href="./styles.css">
        <link rel="stylesheet" href="../../stylesheet.css">
    </head>
    <body>
        <?php include '../../header.php'; ?>
  
        <div class="wrapper">
            <div class="jumbotron-wrapper">
                <img src="../../assets/images/try1.png" alt="" />
                <div class="jumbotron-text">
                    <h1>Welcome to YouthLink</h1>
                    <p>
                        Web-based Events Management System for Lipa Archdiocesan Youth
                        Ministry - Formation Team
                    </p>
                </div>
            </div>
            <div class="carousel-wrapper">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../../assets/images/carousel1.jpg" class="d-block w-100" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="../../assets/images/carousel2.jpg" class="d-block w-100" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="../../assets/images/carousel3.jpg" class="d-block w-100" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="../../assets/images/carousel4.jpg" class="d-block w-100" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="../../assets/images/carousel5.jpg" class="d-block w-100" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="../../assets/images/carousel6.jpg" class="d-block w-100" alt="">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p>© 2023 YouthLink. All rights reserved.</p>
            </div>
        </footer>

        <script>
            window.addEventListener('scroll', animateOnScroll);

            function animateOnScroll() {
                var fadeInElements = document.getElementsByClassName('fade-in');

                for (var i = 0; i < fadeInElements.length; i++) {
                    var element = fadeInElements[i];
                    var positionFromTop = element.getBoundingClientRect().top;
                    var windowHeight = window.innerHeight;

                    if (positionFromTop - windowHeight <= 0) {
                        element.classList.remove('fade-in-show');
                        void element.offsetWidth;
                        element.classList.add('fade-in-show');
                    }
                }
            }

            animateOnScroll();

            function adjustLayout() {
                var windowWidth = window.innerWidth;

                if (windowWidth < 768) {

                    var cards = document.getElementsByClassName('card');
                    for (var i = 0; i < cards.length; i++) {
                    cards[i].classList.add('flex-column');
                    }
                } else {

                    var cards = document.getElementsByClassName('card');
                    for (var i = 0; i < cards.length; i++) {
                    cards[i].classList.remove('flex-column');
                    }
                }
            }

            adjustLayout();
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function (e) {
                        e.preventDefault();

                        document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                        });
                    });
                });
        </script>
    </body>
</html>
