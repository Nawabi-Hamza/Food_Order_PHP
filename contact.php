<?php include "./partial/menu.php"; ?>

<div class="container">
    <div class="row py-5">
        <div class="col-md-6">
            <h2 class="my-3">Contact Us</h2>
            <form action="" class="form-control" method="POST">
                <?php
                    use PHPMailer\PHPMailer\PHPMailer;
                    use PHPMailer\PHPMailer\Exception;
                    require "phpMailer/src/Exception.php";
                    require "phpMailer/src/PHPMailer.php";
                    require "phpMailer/src/SMTP.php";
                
                    if(isset($_POST['submit'])){
                        $mail = new PHPMailer(true);
                        $mail -> isSMTP();
                        $mail -> Host = "smtp.gmail.com";
                        $mail -> SMTPAuth = true;
                        $mail -> Username = "hamza.nawabi119@gmail.com"; // from which email send
                        $mail -> Password = "hgxt cbmf xjeq erkm"; // from
                        $mail -> SMTPSecure = "ssl";
                        $mail -> Port = 465;
                
                        $mail -> setFrom("hamza.nawabi119@gmail.com"); // from which email send
                        $mail -> FromName = $_POST['username'];
                        $mail -> addAddress("h.nawabi007@gmail.com"); // send to email
                        $mail -> isHTML(true);
                        $mail -> Subject = $_POST["email"];
                        // Start Body Email
                        $mail -> Body = "<h3>Phone: ".$_POST['phone']."</h3>"
                                        ."<h3>Email: ".$_POST['email']."</h3>"
                                        ."<p style='font-size:18px;'>Message: ".$_POST['message']."</p>";
                        // End Body Email
                        
                        $mail -> send();
                        if(!$mail->send()){
                            echo "<div class='alert alert-danger m-2'>somthing went wrong ...</div>";
                        }else{
                            echo "<div class='alert alert-success m-2'>your email send successfuly...</div>";
                        }
                        $mail -> smtpClose();
                
                    }
                ?>
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" name="username" placeholder="E.g. Hamza Nawabi" required>
                <label for="name" class="form-label">Your Phone:</label>
                <input type="text" class="form-control" name="phone" placeholder="E.g. +93766..." required>
                <label for="name" class="form-label">Your Email:</label>
                <input type="text" class="form-control" name="email" placeholder="E.g. hamza.nawabi119@gmail.com" required>
                <label for="name" class="form-label">Name:</label>
                <textarea id="" rows="8" class="form-control" name="message" placeholder="E.g. your message..." required></textarea>
                <button class="btn-primary py-1 px-4 my-3 border-none form-control" type="submit" name="submit">Send</button>
            </form>
        </div>
        <div class="col-md-6">
            <h2 class="my-3">Our Location</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d490.49594619190043!2d11.908161032874085!3d57.71197566108053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x464f8caf0b684237%3A0x6172c7fe341bf248!2s7%20tastes%20Indiska%20mat%20och%20Pizzeria%20Gigante.!5e1!3m2!1sen!2s!4v1698248597903!5m2!1sen!2s" width="100%" height="520" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>


<?php include "./partial/footer.php"; ?>