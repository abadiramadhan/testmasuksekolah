<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script>
                window.history.forward();
                function noBacklog() {
                window.onbeforeunload = function () {
//                alert("You Can't Back Page");
                };
                }
    </script>

</head>

<body class="gray-bg" onload="noBacklog();"
          onpageshow="if (event.persisted) noBack();" onunload="">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <h3>Welcome to SISTEM</h3>
            <p>Login in. To see it in action.</p>
            <form class="m-t" role="form" action="periksa" method="post">
                <div class="form-group">
                    <input type="username" class="form-control" placeholder="Username" required=" id="username" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="" id="password" title="8 Character Password. Use Uppercase, Lowercase and Numeric" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" name="password" maxlength="20">
                </div>
                <input type="submit" class="btn btn-primary block full-width m-b" name="login" value="Login" id="simpan">
            </form>
            <p class="m-t"> <small>Inspinia ; SISTEM &copy; 2018</small> </p>
        </div>              
   <!--  </div> -->

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>


