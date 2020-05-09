<?php

    //Call the Google OAuth2 API client
    require_once dirname(getcwd(),1).'/vendor/autoload.php';

    //Import contents from client_secrets.json file containing the OAuth2 client details
    $client_secrets_file= dirname(getcwd(),1).'/resources/client/client_secrets.json';

    //CSS style sheet
    echo '<link rel = "stylesheet" type = "text/css" href = "/resources/files/style.css" />';

    //Start the PHP session
    session_start();

    //Create Google_Client object
    $client = new Google_Client();

    //Import OAuth2 client details from client_secrets.json file
    $client->setAuthConfigFile($client_secrets_file);

    //Add scopes to ask for the user permissions
         //OAuth2 permissions
    $client->addScope(Google_Service_Oauth2::USERINFO_EMAIL);
    $client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);
       //Google Drive permissions
    $client->addScope(Google_Service_Drive::DRIVE_METADATA);

    // To get both an access and refresh token so that it can refresh the access token without user interaction.
    $client->setAccessType('offline');
    // Allows the web application to always receive a refresh token.
    $client->setApprovalPrompt('force');


if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {

        //Set the session token with access token
        $client->setAccessToken($_SESSION['access_token']);

        echo '<H1>Index page</H1>';

        //-------------User details------------------
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        $user_name = $google_account_info->name;
        $user_Email = $google_account_info->email;

        //User details printing
        echo '<p>' . 'You are logged in as: ' . '</p>';

        echo '<div class="tg-wrap">';
        echo '<table >';
            echo '<tr>';
                echo '<td><b>' . "Username:" . '</b></td>';
                echo '<td>' . $user_name . '</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td><b>' . "Email:" . '</b></td>';
                echo '<td>' . $user_Email . '</td>';
             echo '</tr>';
        echo '</table>';
        echo '</div>';

        //Logout page link
        echo '<br><a href="logout.php"> Click to Logout </a><br>';

        //-------------Print Token details------------------
        echo "<div class='div-vdmp'>";

        echo '<p><H2>Token details</H2></p>';
        $access_token = $client->getAccessToken();
        echo '<pre>'.json_encode($access_token,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES).'</pre>';

        echo "</div>";

        //-------------Print file list-----------------------
        echo '<div>';

        //Create Google_Service_Drive object
        $drive_service = new Google_Service_Drive($client);

        echo '<p><H2>' . 'Google Drive Contents:-' . '</H2></p>';

        //Array to determine file parameters taken from the Google_Service_Drive Object
        $file_params = array(
            'pageSize' => 100,
            'fields' => 'nextPageToken,files(name,createdTime,fileExtension,mimeType)'
        );
        //Extract the list of files (and folders)
        $item_list = $drive_service->files->listFiles($file_params)->getFiles();
        //Get the item count
        $all_item_count = count($item_list);

        //Item count output
        echo '<Strong>Number of Items (files and folders) in Drive:- </strong>' . $all_item_count . '<br>';
        echo '<br>';

        //Print the items list in Google Drive
        if ($all_item_count == 0) {
            echo "No files found ..." . '<br>';
        } else {

            /* ----Determining file parameters in table---- */
            //values taken from the $file_params array
            $array_fields_val = '';
            foreach ($file_params as $key => $val) {
                $array_fields_val = $val;
            }
            //remove files and brackets
            $file_attr_m = str_replace(array('(', ')', ' '), '', str_replace('files', '', $array_fields_val));

            //generate array
            $array_file_params = explode(',', $file_attr_m);

            //remove 'nextPageToken' parameter
            unset($array_file_params[0]);

            //Print the item list
            echo '<div class="tg-wrap">';
            echo '<table class="tg">';

               echo '<thead>';

                        echo '<tr>';
                        echo '<th class="tg-lboi">'.'<b>' . '#' . '</b>'.'</th>';
                        echo '<th class="tg-lboi">'.'<b>' . 'File Name' . '</b>'.'</th>';
                        echo '<th class="tg-lboi">'.'<b>' . 'Created Time' . '</b>'.'</th>';
                        echo '<th class="tg-lboi">'.'<b>' . 'Extension' . '</b>'.'</th>';
                        echo '<th class="tg-lboi">'.'<b>' . 'mime type' . '</b>'.'</th>';
                        echo '</tr>';

                echo '<thead>';
                echo '<tbody>';
                $i=0;
                    foreach ($item_list as $file) {
                        echo '<tr>';
                        echo '<td class="tg-0pky">' . ++$i . '</td>';
                        echo '<td class="tg-0pky">' . $file->getName() . '</td>';
                        echo '<td class="tg-0pky">' . $file->getCreatedTime() . '</td>';
                        echo '<td class="tg-0pky">' . $file->getFileExtension() . '</td>';
                        echo '<td class="tg-0pky">' . $file->getMimeType() . '</td>';
                        echo '</tr>';
                    }
                echo '</tbody>';
            echo '</table>';
            echo '</div>';

        }
    } else {
        //If the user is not logged in, redirect the user to the call back URL
        $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/pages/oauth2callback.php';
        header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    }
?>

