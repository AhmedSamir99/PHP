<?php require("../index.php") ?>
<html>
    <head>
        <title> contact form </title>


    </head>

    <body>
        
        <h3> Contact Form </h3>
        <div id="after_submit">
                <?php echo $error ?>
        </div>
        <form id="contact_form" action="#" method="POST" enctype="multipart/form-data">

            <div class="row">
                <label class="required" for="name">Your name:</label><br />
                <input id="name" class="input" name="name" type="text" value="" size="30" /><br />

            </div>
            <div class="row">
                <label class="required" for="email">Your email:</label><br />
                <input id="email" class="input" name="email" type="text" value="" size="30" /><br />

            </div>
            <div class="row">
                <label class="required" for="message">Your message:</label><br />
                <textarea id="message" class="input" name="message" rows="7" cols="30"></textarea><br />

            </div>

            <input id="submit" type="submit"/>
            <input id="clear" name="clear" type="reset" value="clear form" />

        </form>
    </body>

</html>