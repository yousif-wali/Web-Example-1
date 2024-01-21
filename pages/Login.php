<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./Head.php";?>
    <title>KADO - Login</title>
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
        <h4>Login</h4>
        <form action="./include/validator.php" method="POST" class="border rounded p-2">
            <section class="form-floating">
            <input class="form-control" type="text" name="username" id="username" placeholder="Username"/>
            <label for="username">Username</label>
            </section>

            <section class="form-floating">
            <input class="form-control" type="password" name="password" id="password" placeholder="Password"/>
            <label for="password">Password</label>
            </section>
            <button name="login" class="btn btn-primary form-control">Login</button>
            <section>
                <a href="./Signup">Need an account?</a>
            </section>
        </form>
    </main>
</body>
</html>