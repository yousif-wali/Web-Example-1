<!DOCTYPE html>
<html lang="en">
<head>
    <?php require "./../include/database.php"; include "./Head.php";?>
    <title>KADO - Post</title>
    <style>
         main{
            width:80vw;
            height:100vh;
            margin-left:auto;
            margin-right:auto;
            display:flex;
            justify-content: center;
            align-items: center;
            flex-direction:column;
        }
        form{
            width:40vw;
        }
        form > *{
            margin-top:1em !important;
        }
        main h4{
            width:35vw;
            text-align: left;
        }
    </style>
</head>
<body>
    <?php include "./Header.php";?>
    <main>
        <h4>Posting</h4>
        <form action="./include/validator.php" method="POST" enctype="multipart/form-data" class="border rounded p-2">
            <section class="form-floating">    
                <input class="form-control" type="text" id="title" name="title" required placeholder="Title"/>
                <label for="title">Title</label>
            </section>    

            <input  class="form-control" type="file" name="images[]" accept="image/*" multiple required/>
            <section class="form-floating">
                <input class="form-control" type="text" id="desc" name="desc" required placeholder="Description"/>
                <label for="desc">Description</label>
            </section>
            <button class="btn btn-primary form-control" name="post">Post</button>
            <?php
            if(isset($_COOKIE['post']) == true){
                echo "<p>Post was successful</p>";
            }
            ?>
        </form>
    </main>
</body>
</html>