<?php
function generateOTP($n, $env_path, $e_path)
{
    $Generator = "135792468";

    $OTP = "";
    $n = 4; //number of digits

    for ($i = 1; $i <= $n; $i++) {
      $OTP .= substr($Generator,(rand()%(strlen($Generator))),1);
    }
    sendOTP($OTP, $env_path, $e_path);
    return array($OTP,time());
}

function sendOTP($OTP, $env, $e_path){
  $to = ($_SESSION['email_address']);
  $firstName =$_SESSION["first_name"];
  $subject = 'iNominate - One-Time Password';
  echo 'To: ' . $to;
  $message = '
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>Set up a new password for iNominate</title>
      <style type="text/css" rel="stylesheet" media="all">
      /* Base ------------------------------ */

      *:not(br):not(tr):not(html) {
        font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        box-sizing: border-box;
      }

      body {
        width: 100% !important;
        height: 100%;
        margin: 0;
        line-height: 1.4;
        background-color: #F2F4F6;
        color: #74787E;
        -webkit-text-size-adjust: none;
      }

      p,
      ul,
      ol,
      blockquote {
        line-height: 1.4;
        text-align: left;
      }

      a {
        color: #3869D4;
      }

      a img {
        border: none;
      }

      td {
        word-break: break-word;
      }
      /* Layout ------------------------------ */

      .email-wrapper {
        width: 100%;
        margin: 0;
        padding: 0;
        -premailer-width: 100%;
        -premailer-cellpadding: 0;
        -premailer-cellspacing: 0;
        background-color: #F2F4F6;
      }

      .email-content {
        width: 100%;
        margin: 0;
        padding: 0;
        -premailer-width: 100%;
        -premailer-cellpadding: 0;
        -premailer-cellspacing: 0;
      }
      /* Masthead ----------------------- */

      .email-masthead {
        padding: 25px 0;
        text-align: center;
      }

      .email-masthead_logo {
        width: 94px;
      }

      .email-masthead_name {
        font-size: 16px;
        font-weight: bold;
        color: #bbbfc3;
        text-decoration: none;
        text-shadow: 0 1px 0 white;
      }
      /* Body ------------------------------ */

      .email-body {
        width: 100%;
        margin: 0;
        padding: 0;
        -premailer-width: 100%;
        -premailer-cellpadding: 0;
        -premailer-cellspacing: 0;
        border-top: 1px solid #EDEFF2;
        border-bottom: 1px solid #EDEFF2;
        background-color: #FFFFFF;
      }

      .email-body_inner {
        width: 570px;
        margin: 0 auto;
        padding: 0;
        -premailer-width: 570px;
        -premailer-cellpadding: 0;
        -premailer-cellspacing: 0;
        background-color: #FFFFFF;
      }

      .email-footer {
        width: 570px;
        margin: 0 auto;
        padding: 0;
        -premailer-width: 570px;
        -premailer-cellpadding: 0;
        -premailer-cellspacing: 0;
        text-align: center;
      }

      .email-footer p {
        color: #AEAEAE;
      }

      .body-action {
        width: 100%;
        margin: 30px auto;
        padding: 0;
        -premailer-width: 100%;
        -premailer-cellpadding: 0;
        -premailer-cellspacing: 0;
        text-align: center;
      }

      .body-sub {
        margin-top: 25px;
        padding-top: 25px;
        border-top: 1px solid #EDEFF2;
      }

      .content-cell {
        padding: 35px;
      }

      .preheader {
        display: none !important;
        visibility: hidden;
        mso-hide: all;
        font-size: 1px;
        line-height: 1px;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
      }
      /* Attribute list ------------------------------ */

      .attributes {
        margin: 0 0 21px;
      }

      .attributes_content {
        background-color: #EDEFF2;
        padding: 16px;
      }

      .attributes_item {
        padding: 0;
      }
      /* Related Items ------------------------------ */

      .related {
        width: 100%;
        margin: 0;
        padding: 25px 0 0 0;
        -premailer-width: 100%;
        -premailer-cellpadding: 0;
        -premailer-cellspacing: 0;
      }

      .related_item {
        padding: 10px 0;
        color: #74787E;
        font-size: 15px;
        line-height: 18px;
      }

      .related_item-title {
        display: block;
        margin: .5em 0 0;
      }

      .related_item-thumb {
        display: block;
        padding-bottom: 10px;
      }

      .related_heading {
        border-top: 1px solid #EDEFF2;
        text-align: center;
        padding: 25px 0 10px;
      }
      /* Discount Code ------------------------------ */

      .discount {
        width: 100%;
        margin: 0;
        padding: 24px;
        -premailer-width: 100%;
        -premailer-cellpadding: 0;
        -premailer-cellspacing: 0;
        background-color: #EDEFF2;
        border: 2px dashed #9BA2AB;
      }

      .discount_heading {
        text-align: center;
      }

      .discount_body {
        text-align: center;
        font-size: 15px;
      }
      /* Social Icons ------------------------------ */

      .social {
        width: auto;
      }

      .social td {
        padding: 0;
        width: auto;
      }

      .social_icon {
        height: 20px;
        margin: 0 8px 10px 8px;
        padding: 0;
      }
      /* Data table ------------------------------ */

      .purchase {
        width: 100%;
        margin: 0;
        padding: 35px 0;
        -premailer-width: 100%;
        -premailer-cellpadding: 0;
        -premailer-cellspacing: 0;
      }

      .purchase_content {
        width: 100%;
        margin: 0;
        padding: 25px 0 0 0;
        -premailer-width: 100%;
        -premailer-cellpadding: 0;
        -premailer-cellspacing: 0;
      }

      .purchase_item {
        padding: 10px 0;
        color: #74787E;
        font-size: 15px;
        line-height: 18px;
      }

      .purchase_heading {
        padding-bottom: 8px;
        border-bottom: 1px solid #EDEFF2;
      }

      .purchase_heading p {
        margin: 0;
        color: #9BA2AB;
        font-size: 12px;
      }

      .purchase_footer {
        padding-top: 15px;
        border-top: 1px solid #EDEFF2;
      }

      .purchase_total {
        margin: 0;
        text-align: right;
        font-weight: bold;
        color: #2F3133;
      }

      .purchase_total--label {
        padding: 0 15px 0 0;
      }
      /* Utilities ------------------------------ */

      .align-right {
        text-align: right;
      }

      .align-left {
        text-align: left;
      }

      .align-center {
        text-align: center;
      }
      /*Media Queries ------------------------------ */

      @media only screen and (max-width: 600px) {
        .email-body_inner,
        .email-footer {
          width: 100% !important;
        }
      }

      @media only screen and (max-width: 500px) {
        .button {
          width: 100% !important;
        }
      }
      /* Buttons ------------------------------ */

      .button {
        background-color: #3869D4;
        border-top: 10px solid #3869D4;
        border-right: 18px solid #3869D4;
        border-bottom: 10px solid #3869D4;
        border-left: 18px solid #3869D4;
        display: inline-block;
        color: #FFF;
        text-decoration: none;
        border-radius: 3px;
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
        -webkit-text-size-adjust: none;
      }

      .button--green {
        background-color: #22BC66;
        border-top: 10px solid #22BC66;
        border-right: 18px solid #22BC66;
        border-bottom: 10px solid #22BC66;
        border-left: 18px solid #22BC66;
      }

      .button--red {
        background-color: #FF6136;
        border-top: 10px solid #FF6136;
        border-right: 18px solid #FF6136;
        border-bottom: 10px solid #FF6136;
        border-left: 18px solid #FF6136;
      }
      /* Type ------------------------------ */

      h1 {
        margin-top: 0;
        color: #2F3133;
        font-size: 19px;
        font-weight: bold;
        text-align: left;
      }

      h2 {
        margin-top: 0;
        color: #2F3133;
        font-size: 16px;
        font-weight: bold;
        text-align: left;
      }

      h3 {
        margin-top: 0;
        color: #2F3133;
        font-size: 14px;
        font-weight: bold;
        text-align: left;
      }

      p {
        margin-top: 0;
        color: #74787E;
        font-size: 16px;
        line-height: 1.5em;
        text-align: left;
      }

      p.sub {
        font-size: 12px;
      }

      p.center {
        text-align: center;
      }
      </style>
    </head>
    <body>
      <span class="preheader">Use this link to reset your password. The link is only valid for 24 hours.</span>
      <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center">
            <table class="email-content" width="100%" cellpadding="0" cellspacing="0">
              <tr>
                <td class="email-masthead">
                  <a href="'.$env.'index.php" class="email-masthead_name">
          iNominate
        </a>
                </td>
              </tr>
              <!-- Email Body -->
              <tr>
                <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
                  <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
                    <!-- Body content -->
                    <tr>
                      <td class="content-cell">
                        <h1>Hi '.$firstName.',</h1>
                        <p>You recently requested to reset your password for your iNominate account. Use the button below to reset it. <strong>This password reset is only valid for the next 24 hours.</strong></p>
                        <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td align="center">
                                    <table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>
                                        '.$OTP.'
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                       </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </body>
  </html>
             ';
   $headers  = 'MIME-Version: 1.0' . "\r\n";
   $headers = 'Content-type: text/html; charset=utf-8' . "\r\n";
   $headers .= 'From: Mailer <inominate18@gmail.com>' . "\r\n";
   $headers .= 'X-Mailer: PHP/' . phpversion();
   try{
        //$email_response =  sendEmail($to, $subject, $message);
       $email_response = $e_path == 0 ? mail($to, $subject, $message, $headers) : sendEmail($to, $subject, $message);

       // if(!mail($to, $subject, $message, $headers)){
       if(!$email_response || $email_response != 202){
         echo "Error !!";
        } else{
         //echo "Email Sent !!";
       }
  } catch(Exception $e){
      echo $e->getMessage();
  }
}

?>