<?php
require_once "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>
    <!doctype html>
    <html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="to">Email:</label>
                        <input type="email" class="form-control" name="to" id="to" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="enter subject">
                    </div>
                    <div class="form-group">
                        <label for="content">Enter email body here:</label>
                        <textarea class="form-control" name="content" id="content" rows="3"></textarea>
                    </div>
                    <input type="submit" name="send" class="btn btn-primary" value="Send Email">
                </form>
            </div> <!-- end form block -->
            <div class="col-md-4"></div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
    </html>
<?php
if(isset($_POST['send'])){
    if(!empty($_POST['to']) && !empty($_POST['content']) && !empty($_POST['subject'])  ){
        $data['content'] = $_POST['content'];
        $data['to'] = $_POST['to'];
        $data['subject'] = $_POST['subject'];

        $result = sendMail($data);
        if(!$result): ?>
            <div class="alert alert-danger" role="alert">
                Neišskrido balandis :-(.
        <?php else:?>
            <div class="alert alert-success" role="alert">
                Laiškas sėkimingai iškeliavo. Maladiec!
            </div>

        <?php endif; ?>

        <?php
    }
}
function sendMail(Array $data){
    $mail = new PHPMailer(true);
    try {

        $mail->isSMTP();
        $mail->Host = 'smtp.elasticemail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'masuliukas@gmail.com';
        $mail->Password = 'd3838cfe-2548-4346-8cdf-72feafce22bb';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 2525;


        //is kur laiskas
        $mail->setFrom('masuliukas@gmail.com');

        //Kam laiskas
        $mail->addAddress($data['to']);
        //Kam atsakyti
        $mail->addReplyTo('noreply@noreply.re', 'No reply');
        //Content
        $mail->isHTML(true);
        $mail->AltBody = 'Cia nera htmlo, nes ne visi EMAIL klientai ji palaiko';

        $mail->Subject = $data['subject'];
        $mail->Body    = $data['content'];

        //send mail
        $mail->send();
        return true;

    } catch (Exception $e) {
        return false;
    }
}