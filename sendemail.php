      <?php

         $fullname = $_POST['fullname'];
         $position = $_POST['position'];
         $linkcv = $_POST['linkcv'];
         $coverletter = $_POST['coverletter'];

         $to = "gold.architects@seglobal.ph";
         $subject = "Submitted Application";
         
         $message = "<b>Fullname:</b>".$fullname."<br>";
         $message .= "<b>Position:</b>".$position."<br>";
         $message .= "<b>Link to CV:</b>".$linkcv."<br>";
         $message .= "<b>Cover Letter:</b>".$coverletter."<br>";
         
         $header = "From:goldph@goldphilippines.com \r\n";
         $header .= "Cc:gold@goldphilippines.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
      ?>