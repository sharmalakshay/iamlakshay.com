<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rate my LinkedIn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form action="https://www.linkedin.com/oauth/v2/authorization">
        <input type="hidden" name="response_type" value="code"/>
        <input type="hidden" name="client_id" value="77khx2xes8opld"/>
        <input type="hidden" name="redirect_uri" value="http://localhost/iamlakshay.com/ratemylinkedin/"/>
        <input type="hidden" name="scope" value="r_basicprofile r_emailaddress rw_company_admin w_share"/>
        <input type="submit"/>
    </form>
    <br>
</body>
</html>

<?php

    if(isset($_GET['code'])){

        $url = "https://www.linkedin.com/oauth/v2/accessToken";

        $context = stream_context_create(array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query(
                    array(
                        'grant_type' => 'authorization_code',
                        'code' => $_GET['code'],
                        'redirect_uri' => 'http://localhost/iamlakshay.com/ratemylinkedin/',
                        'client_id' => '77khx2xes8opld',
                        'client_secret' => 'QPfIfCc7VRhw1mCM'
                    )
                ),
                'timeout' => 60
            )
        ));

        $resp = json_decode(file_get_contents($url, FALSE, $context), true);

        $access_token = $resp['access_token'];

        if($access_token!=NULL){
            $url2 = "https://api.linkedin.com/v1/people/~:(id,first-name,last-name,maiden-name,formatted-name,phonetic-first-name,phonetic-last-name,formatted-phonetic-name,headline,location,industry,current-share,num-connections,num-connections-capped,summary,specialties,positions,picture-url,picture-urls::(original),site-standard-profile-request,api-standard-profile-request,public-profile-url,email-address)?format=json";

            $context2 = stream_context_create(array(
                'http' => array(
                    'header' => array(
                        'Host: api.linkedin.com',
                        'Connection: Keep-Alive',
                        'Authorization: Bearer '.$access_token,
                    )
                )
            ));

            $resp2 = file_get_contents($url2, FALSE, $context2);
            print_r($resp2);
            //$resp2 = json_decode(file_get_contents($url2, FALSE, $context2));

            /*foreach($resp2 as $key => $value){
                echo "$key = $value <br><br>";
            }
            */
        }

    }


?>
