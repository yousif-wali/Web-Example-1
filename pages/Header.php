<style>
    @import url('https://fonts.googleapis.com/css2?family=Dosis:wght@300&family=Rajdhani&display=swap');
    header{
        height:50px;
        width:98%;
        margin-left:1%;
        position:fixed;
        top:0;
        z-index:99999;
        font-family: 'Dosis', sans-serif;
    }
    header img{
        height:40px;
        aspect-ratio: 1/1;
        cursor:pointer;
    }
</style>
<header class="ps-3 pe-3 d-flex justify-content-between align-items-center rounded bg-primary">
    <section>
        <ul>
            <li class="d-inline pe-2"><a class="text-white text-decoration-none" href="./Home">Home</a></li>
            <li class="d-inline pe-2"><a class="text-white text-decoration-none" href="./Event">Events</a></li>
            <li class="d-inline pe-2"><a class="text-white text-decoration-none" href="./Contact">Contact Us</a></li>
            <?php
            session_start();
            if((isset($_SESSION['Admin']) && $_SESSION['Admin'] != 0) && (basename($_SERVER['PHP_SELF'], ".php") == "Event" || basename($_SERVER['PHP_SELF'], ".php") == "Post")){
                echo '<li class="d-inline pe-2"><a class="text-white text-decoration-none" href="./Post">Post</a></li>';
            }
            ?>
        </ul>
    </section>
    <section>
        <?php 
        if(isset($_SESSION['Username'])){
            $username = $_SESSION['Username'];
            echo "<p title='Logout' style='cursor:pointer;' onclick='window.location.href = `./Logout`'>$username</p>";
        }else{
            echo '<img onclick="window.location.href = `./Login`" src="./src/images/maleProfile.png"/>';
        }
        ?>
    </section>
</header>