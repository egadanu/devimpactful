<?php
if(isset($_POST['captcha']) && !empty($_POST['captcha'])):
        //your site secret key
        $secret = '6LcItRMgAAAAAMN6TUA6ix2xNAu4-6z3iO2fElie';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['captcha']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success):
            //captacha validated successfully.
            $email = !empty($_POST['email'])?$_POST['email']:'';
            $password = !empty($_POST['password'])?$_POST['password']:'';
            echo "success";
        else:
            echo "fail";
        endif;
    else:
         echo 'fail';
    endif;
?>