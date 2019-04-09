

<div class="text" id="window">Ваш код:<?php
 $name = $_GET['mail'];
$pieces = explode(":", $name);
$nameE = $pieces[0];
$surname = $pieces[1];
require_once ("PhpImap/__autoload.php");
    lastmailbody($nameE,$surname);
function lastmailbody($login, $pass)
{
    define('MAIL_IMAP_SERVER', 'imap.mail.ru');
    define('MAIL_IMAP_SERVER_PORT', 993);

    define('MAIL_IMAP_PATH', '{' . MAIL_IMAP_SERVER . ':' . MAIL_IMAP_SERVER_PORT . '/imap/ssl}INBOX');
    $mailbox = new PhpImap\Mailbox(MAIL_IMAP_PATH, $login, $pass, __DIR__);
    $mailsIds = $mailbox->searchMailBox('ALL');
    if(!$mailsIds) {
        die('Mailbox is empty');
    }

// Get the first message and save its attachment(s) to disk:
    $mail = $mailbox->getRawMail(end($mailsIds));
//#<span style=".+">([\s\S]{5,5})</span>#su
   //print_r($mail);

    $pattern = '#<span style=".+">([\s\S]{5,5})</span>#su';
    preg_match($pattern, substr($mail,0), $matches, PREG_OFFSET_CAPTURE);
    $mailcode =  $matches[1][0];
   print_r($matches[1][0]);
  require_once('index.php');

}
?></div>