<!DOCTYPE html>
<html lang="en">
<head>
    <?php require "./../include/database.php"; include "./Head.php";?>
    <title>KADO - Contact</title>
    <style>
        main{
            width:90vw;
            margin-left: auto;
            margin-right: auto;
            padding: 2em;
        }
form{
    width:40vw;
    margin:0 auto;
}
/* Style inputs */
input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
textarea{
    min-height:50px;
}
    </style>
</head>
<body>
    <?php include "./Header.php";?>
    <main class="bg-dark text-white">
        <section class="row">
            <section class="col-lg-6 col-md-6 col-sm-12">
                <p>Location</p>
                <iframe class="rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14222.351282793503!2d-96.73959430266697!3d46.84975371542586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52c8ceda80fa3f19%3A0xd13b006924781057!2sMinnesota%20State%20Community%20and%20Technical%20College%20(M%20State)%20Moorhead!5e0!3m2!1sen!2sus!4v1676948962688!5m2!1sen!2sus" style="border:0; width:100%; aspect-ratio:16/9;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </section>
            <section class="col-lg-6 col-md-6 col-sm-12">
                <p>Hours</p>
                <p>Mon-Fri => 12:00-18:00</p>
            </section>
        </section>
        <hr/>
        <h3 style="width:40vw; margin:0 auto;">Contact</h3>
                <form action="./include/validator.php" method="POST">
                    <section>
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Your name...">
                    </section>
                    <section>
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" placeholder="Email...">
                    </section>
                    <section>
                        <label for="subject">Subject</label>
                        <textarea id="subject" name="subject" placeholder="Write something..." style="height:170px"></textarea>                 
                    </section>
                    <input type="submit" name="contact" value="Submit">
                </form>
                <?php
                if(isset($_COOKIE['mail']) && $_COOKIE['mail'] == "sent"){
                    echo "Mail sent, we will repond shortly";
                }
                ?>
    </main>
</body>
</html>