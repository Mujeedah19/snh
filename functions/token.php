<?php
//to generate token
function generate_token(){
    $token = ""; // Work on token generation
        $alphabets = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q',
                    'R','S','T','U','V','W','X','Y','Z','G','H','I','J','K','L','M','N','O'];
        for($i = 0; $i < 26; $i++){
                $index= rand(0,count($alphabets)-1);
                $token .= $alphabets[$index];
        }  
        return $token;
}

function find_token($email = ''){
    
    $allUserTokens = scandir("db/tokens/"); //return @array (2 filled)
    $countAllUserTokens = count($allUserTokens);

    for ($counter = 0; $counter < $countAllUserTokens ; $counter++) {
        
        $currentTokenFile = $allUserTokens[$counter];

        if($currentTokenFile == $email . ".json"){
           
           $tokenContent = file_get_contents("db/tokens/".$currentTokenFile);

           $tokenObject = json_decode($tokenContent);
            return $tokenObject;

        }
    }

    return false;
}