<?php

/*
Plugin Name: Validate Mail
Description: Плагин для проверки корректного ввода Email адреса
Version: 1.0
Author: Gisich Yulian
*/

function validateMail_validateMail(){
    ?>
    <script>
        function send(){
            let email = document.getElementById("email").value
            document.getElementById("error").textContent = ""

            if(validateEmail(email)){
                document.getElementById("error").textContent = ""
                document.getElementById("btn").type = 'submit'
            }else{
                document.getElementById("error").textContent = "is not valid"
            }
        }

        function validateEmail(email) {
            var re = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
            return re.test(String(email).toLowerCase());
        }
    </script>
    <?php
}

add_action('wp_footer','validateMail_validateMail');