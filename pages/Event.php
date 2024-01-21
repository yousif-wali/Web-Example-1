<!DOCTYPE html>
<html lang="en">
<head>
    <?php require "./../include/database.php"; include "./Head.php";?>
    <title>KADO - Events</title>
    <style>
        main{
            width:60vw;
            margin-left:auto;
            margin-right:auto;   
        }
        .posts{
            width:100%;
            border:2px solid black;
            margin-top:1em;
            border-radius:5px;
            padding:1.5em;
        }
        .posts img{
            width:100%;
            aspect-ratio:16/9;
            object-fit: contain;
            border-radius:25px;
        }
        .posts h2{
            margin-left:1em;
            font-family:sans-serif;
        }
        .posts p[data-type="description"]{
            margin-left:0.5em;
            margin-top:1em;
            font-family:cursive;
        }
    </style>
</head>
<body>
    <?php include "./Header.php";?>
    <main>
        <?php 
        $event = new Event();
        $events = $event->getPosts();
        foreach($events as $item){
            $id = $item[0];
            $title = $item[1];
            $desc = $item[2];
            $time = $item[3];
            $image = $item[4];

            $temp_images = explode(",", $image);
            echo "<section class='posts'>            
            <h2>$title</h2>
            <section class='carousels' data-type='$id'>";
            foreach($temp_images as $i){
                if($i != ""){
                    echo "<img src='./src/images/Posts/$i' />";
                }           
            }
            echo "
            </section>
            <p class='float-end'>$time</p> 
            <p data-type='description'>$desc</p>
            </section>
            ";
        }
        ?>
    </main>
    <script src="./include//OwlCarousel/dist/owl.carousel.min.js"></script>
    <script>
        var carousels = document.getElementsByClassName("carousels");
        for(i = 0; i < carousels.length; i++){
            if(carousels[i].children.length > 1){
                elem = carousels[i].getAttribute("data-type");
                carousels[i].classList.add("owl-carousel");
                    $(document).ready(function(){
                        var owl = $(`[data-type=${elem}]`);
                            owl.owlCarousel({
                                items:1,
                                loop:true,
                                margin:10,
                                autoplay:true,
                                autoplayTimeout:5000,
                                autoplayHoverPause:false,
                            });
                        
                    }); 
            }
        }
</script>
</body>
</html>