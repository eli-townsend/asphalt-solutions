<link rel="stylesheet" href="css/foundation.css" />
<link rel="stylesheet" href="css/app.css" />
<?php

if(isset($_POST['email'])) {



    $email_to = "ENTER YOUR EMAIL HERE";

    $email_subject = "Asphalt Solution - Contact Form";





    function died($error) {

        echo "We are very sorry, but there were error(s) found with the form you submitted. ";

        echo "These errors appear below.<br /><br />";

        echo $error."<br /><br />";

        echo "Please go back and fix these errors.<br /><br />";

        die();

    }




    if(!isset($_POST['full_name']) ||

        !isset($_POST['email']) ||

        !isset($_POST['comments'])) {

        died('We are sorry, but there appears to be a problem with the form you submitted.');

    }



    $full_name = $_POST['full_name']; // required

    $email_from = $_POST['email']; // required

    $comments = $_POST['comments']; // required



    $error_message = "";

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {

    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';

  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$full_name)) {

    $error_message .= 'The Name you entered does not appear to be valid.<br />';

  }

  if(strlen($comments) < 2) {

    $error_message .= 'The message you entered do not appear to be valid.<br />';

  }

  if(strlen($error_message) > 0) {

    died($error_message);

  }

    $email_message = "Form details below.\n\n";



    function clean_string($string) {

      $bad = array("content-type","bcc:","to:","cc:","href");

      return str_replace($bad,"",$string);

    }



    $email_message .= "Name: ".clean_string($full_name)."\n";

    $email_message .= "Email: ".clean_string($email_from)."\n";

    $email_message .= "Message: ".clean_string($comments)."\n";





// create email headers

$headers = 'From: '.$email_from."\r\n".

'Reply-To: '.$email_from."\r\n" .

'X-Mailer: PHP/' . phpversion();

@mail($email_to, $email_subject, $email_message, $headers);

?>

 <img src="images/unsplash1.jpg" id="bg" alt="">

 <div class="row">
        	<div class="large-12 small-12 columns text-center">
            	Thank you for your message. We will get back to you as so as physically possible....which is pretty fast!<br />
 					 <a class="small button radius" href="index.html">Go Back Home</a>
 			</div>
 </div>

<?php

}

?>
