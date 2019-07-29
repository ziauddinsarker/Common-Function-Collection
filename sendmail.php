<?php
$this_mail = mail('ziauddin.sarker@gmail.com','This is sendbox mail from xampp','This is sendbox mail content','From:m-ziauddin@jellyfish-g.co.jp');

if($this_mail) echo 'sent!';
else echo error_message;
?>


<?php
$from = "m-ziauddin@jellyfish-g.co.jp";
$to = "ziauddin.sarker@gmail.com";
$subject = "Simple test for mail function";
$body = "How are svn_f";
$message = "This is a test to check if php mail function sends out the email";
$headers = "From:" . $from;
if (mail($to, $subject, $body, $headers)) {
   echo("
      Message successfully sent!
   ");
} else {
   echo("
      Message delivery failed...
   ");
}
?>