<?php
$welcome = isset($_SESSION["name"])? "welcome ".$_SESSION["name"]:"";


?>
    <html>
        <head>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


        </head>
        <body style="padding:50px">
            <h3>Contact Us Form</h3>
            <form action="index.php" method="post" >
                <div class="form-group">
                    <center><h5><?php echo $welcome; ?></h5>  </center>
                    <center><h5><?php echo $error; ?></h5>  </center>
                    <label for="exampleInputEmail1">Name</label>
                    <input type="input" class="form-control" name="name" value="<?php echo remeber_variable("name"); ?>"  aria-describedby="emailHelp" placeholder="Enter name">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="input" class="form-control" name="email" value="<?php echo remeber_variable("email"); ?>"     placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <input  type="submit" value="Go" class="btn btn-primary"/>
            </form>
        </body>
    </html>