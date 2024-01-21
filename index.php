<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./pages/Head.php";?>
    <title>KADO - Kurdish American Development Organization</title>
    <style>
        @import "./src/styles/main.css";
        @import url('https://fonts.googleapis.com/css2?family=Dosis:wght@300&family=Rajdhani&display=swap');
    </style>
</head>
<body>
    <?php include "./pages/Header.php";?>
    <main>
        <section class="d-flex align-items-center justify-content-center w-100">
            <img style="width:100%; aspect-ratio:16/9; filter:blur(6px);position:absolute; z-index:-2" src="./src/images/background.jpg"/>
            <img style="width:90%; margin:0 auto; aspect-ratio:16/9; z-index:-1; border-radius:5px; " src="./src/images/background.jpg"/>
            <h1 style="position:absolute; left:10%; z-index:1; font-family: 'Rajdhani', sans-serif; color:blue;" id="header">KADO</h1>
            <section style="position:absolute; right:5%; width:30%; height:50px; background-color:transparent; z-index:2;">&nbsp;</section>
        </section>
        <section data-type="body">
            <section data-type="memories">
                <div class="owl-carousel">
                    <img src="./src/images/1.jpg"/>
                    <img src="./src/images/2.jpg"/>
                    <img src="./src/images/3.jpg"/>
                    <img src="./src/images/4.jpg"/>
                    <img src="./src/images/5.jpg"/>
                </div>
            </section>
            <section data-type="memo">
                <h1>empowering voices through the arts and movement</h1>
                <p>By providing children with a nurturing and responsive environment to discover, learn, grow, and realize their potential, the children in our care are empowered with school and life readiness skills from the get-go.</p>
            </section>
        </section>
    </main>
    <script src="./src/scripts/main.js"></script>
    <script src="./include//OwlCarousel/dist/owl.carousel.min.js"></script>
    <script>
    $(document).ready(function(){
        var owl = $('.owl-carousel');
            owl.owlCarousel({
                items:2,
                loop:true,
                margin:10,
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:false,
                responsiveClass:true,
                responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
            });
    });
</script>
</body>
</html>