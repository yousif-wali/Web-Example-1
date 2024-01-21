<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./Head.php";?>
    <title>KADO - Signup</title>
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
        <h4>Sign up</h4>
        <form action='./include/validator.php' method="POST" class="border rounded p-2">
            <section class="form-floating">
                <input class="form-control" type="text" name="fullname" id="fullname" required placeholder="Full Name"/>
                <label for="fullname">Full Name</label>
            </section>
            <section class="form-floating">
                <input class="form-control" type="email" name="email" id="email" required placeholder="Email"/>
                <label for="email">Email</label>
            </section>
            <section class="form-floating">
                <input class="form-control" type="text" name="username" id="username" required placeholder=" Username"/>
                <label for="username">Username</label>
            </section>

            <section class="form-floating">
                <input class="form-control" type="password" name="password" id="password" required placeholder="Password"/>
                <label for="password">Password</label>
            </section>

            <section class="form-floating">
                <input class="form-control" type="password" name="confirm" id="confirm_password" required placeholder="Confirm Password"/>
                <label for="confirm_password">Confirm Password</label>
            </section>
            <button class="btn btn-primary form-control" name="signup">Sign up</button>
            <a href="./Login">Already have an account?</a>
        </form>
    </main>
</body>
</html>