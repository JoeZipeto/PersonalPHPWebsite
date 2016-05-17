<?php include("php/connMysqlDb.php");
include
("php/functions.php");
include(
"php/newsfeed.php");
$errors = array('name' => "", 'subject' => "", 'comments' => "", 'email'
=> "", 'validemail' => "", 'emailmailinglist'
=> ""); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Imagery A La Carte</title>
    <meta charset='utf-8'>
    <meta name='description' content='add a description here'>

    <link rel="stylesheet" type="text/css" href="/angular/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/angular/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">

    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="js/sarahwebsite.js"></script>

</head>

<body class="container-fluid">
<header class="page-header">
    <div class="row col-sm-offset-1">
        <div class="col-sm-2">
            <nav>
                <a href="https://www.facebook.com/pages/Imagery-%C3%A0-la-Carte/199760846788655">
                    <img src="images/fb-icons_01.png" alt="Link to Facebook page"> </a>
                <a href="https://twitter.com/SarahGopaul">
                    <img src="images/l-icons_01.png" alt="Link to linkedin page"> </a>
            </nav>
        </div>
        <div class="col-sm-6">
            <div id="maintitle">Imagery A La Carte</div>
        </div>
        <div class="col-sm-2">
            <h3>Column 3</h3>
        </div>
    </div>
</header>


<div id="middle" class="container-fluid">
    <div class="row col-sm-offset-0">
        <form class="col-sm-3" id="contactform" method="post"
              name="form1">
            <h2>Contact</h2>
            <label class="sr-only">Name *</label>
            <input type="text" id="personname" class="form-control"
                   required name="name" placeholder="Name"
                   onblur="checkname()" value="<?php echo empty($name) ? "
                " : $name ?>">
            <span class="error"> <?php echo $errors['name']; ?></span>
            <br>
            <label class="sr-only">Subject *</label>
            <input type="text" id="subject" class="form-control"
                   placeholder="Subject" name="subject"
                   onblur="checksubject()" value="<?php echo empty($subject) ? "
                " : $subject ?>">
            <span class="error"> <?php echo $errors['subject'] ?></span>
            <br>
            <label class="sr-only">E-mail Address *</label>
            <input type="email" id="contactemail" class="email form-control"
                   name="email" placeholder="E-mail Address"
                   onblur="checkemail()" value="<?php echo empty($email) ? "
                " : $email ?>">
                <span class="error">
					   		<?php echo $errors['email'] . " " . $errors['validemail']; ?>
					   </span>
            <br>
            <label class="sr-only">Comments *</label>
                <textarea id="comments" class="form-control"
                          name="comments" placeholder="Comments"
                          maxlength="1000" cols="31"
                          rows="6" onblur="checkcomments()"></textarea>
            <span class="error"><?php echo $errors['comments']; ?></span>
            <br>
            <input id="submit1" type="submit" name="Submit1"
                   class="button" onclick="submit()">
        </form>

        <div id="news" class="col-sm-5">
            <ul class="list-group">
                <li class="list-group-item top">
                    <a href="<?php echo $feed[0]['link']; ?>">
                        <img class="img" src="<?php echo $feed[0]['image']; ?>">
                    </a>
                    <span class="font">  <?php echo $feed[0]['title'] ?></span>
                    <span class="font1"> <?php echo $feed[0]['desc'] ?></span>
                </li>


                <li class="list-group-item top">
                    <a href="<?php echo $feed[1]['link']; ?>">
                        <img class="img" src="<?php echo $feed[1]['image']; ?>">
                    </a>
                    <span class="font"> <?php echo $feed[1]['title'] ?></span>
                    <br>
                    <span class="font1"> <?php echo $feed[1]['desc'] ?></span>
                </li>


                <li class="list-group-item top">
                    <a href="<?php echo $feed[2]['link']; ?>">
                        <img class="img" src="<?php echo $feed[2]['image']; ?>">
                    </a>
                    <span class="font"> <?php echo $feed[2]['title'] ?></span>
                    <br>
                    <span class="font1"> <?php echo $feed[2]['desc'] ?></span>
                </li>


                <li class="list-group-item top">
                    <a href="<?php echo $feed[3]['link']; ?>">
                        <img class="img" src="<?php echo $feed[3]['image']; ?>">
                    </a>
                    <span class="font"> <?php echo $feed[3]['title'] ?></span>
                    <br>
                    <span class="font1"> <?php echo $feed[3]['desc'] ?></span>
                </li>


                <li class="list-group-item top">
                    <a href="<?php echo $feed[4]['link']; ?>">
                        <img class="img" src="<?php echo $feed[4]['image']; ?>"></a>
                    <span class="font"> <?php echo $feed[4]['title'] ?></span>
                    <br>
                    <span class="font1"> <?php echo $feed[4]['desc'] ?></span>
                </li>

            </ul>
        </div>
        <div class="col-sm-2">
            <?php
            $sql = new mysqli();
            $mailinglistemail = (isset($_POST['mailinglistemail'])) ? htmlspecialchars($_POST['mailinglistemail']) : '';
            if (isset($_POST['Submitmailinglist'])) {
                if (empty($mailinglistemail)) {
                    $errors['emailmailinglist'] = "Required";
                } else {

                    $add = $sql->real_escape_string($mailinglistemail);
                    $query = $sql->query("SELECT * FROM mailinglist WHERE '$add' =  'email'");
                    if ($query) {
                        $errors['emailmailinglist'] = "You are already on the mailinglist";
                    } else {
                        $new = mysqli_query(
                            "INSERT INTO 'email'('email') VALUES('$add')");
                        $errors['emailmailinglist'] = "You are now on the mailing List";
                    }
                }
            } ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                  class="form-group" id="mailinglist">
                <h2 id="title"> Mailing List</h2>
                <div>
                    <input id="mailinglistemail" class="form-control"
                           name="mailinglistemail"
                           type="email" placeholder="Email"
                           size="51" onblur="checkemail()">
                        <span class="error" <?php echo $errors['emailmailinglist']; ?>> </span>
                </div>

                <input type="submit" name="Submitmailinglist"
                       value="Submit" class="button"
                       onclick="submit()" onblur="checkemail()">
            </form>
        </div>
    </div>
    <hr id="hrone">
    <footer class="container-fluid">
        <div class="row">
            <div class="col-sm-2">&copy; JZ</div>
            <nav class="col-sm-12" id="mainmenu">
                <a href="SarahsWebsite.php">Home</a>
                <a href="aboutme.html" target="_blank">About Me</a>
                <a href="archive.html" target="_blank">Archives</a>
                <a id="subscribe"> Subscribe</a>
                <a id="contactme">Contact Me</a>
            </nav>
        </div>
    </footer>
</body>

</html>