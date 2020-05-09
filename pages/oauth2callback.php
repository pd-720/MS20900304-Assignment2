<?php
    //Call the Google OAuth2 API client
    require_once dirname(getcwd(),1).'/vendor/autoload.php';

    //Import contents from client_secrets.json file containing the OAuth2 client details
    $client_secrets_file= dirname(getcwd(),1).'/resources/client/client_secrets.json';

    //Start the PHP session
    session_start();

    //Create Google_Client object
    $client = new Google_Client();

    //Import OAuth2 client details from client_secrets.json file
    $client->setAuthConfigFile($client_secrets_file);

    //Set redirectUri value
    $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/pages/oauth2callback.php');

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

    if (! isset($_GET['code'])) {
        //Create authorization URL to be sent to Google when redirecting for permissions
        $auth_url = $client->createAuthUrl();
        //Refresh the page to go to the initial page
        header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
    } else {
        //If the authorization is provided, set the access token for the session and redirect the URI to initial page
        $client->authenticate($_GET['code']);
        $_SESSION['access_token'] = $client->getAccessToken();
        $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/pages/index.php';
        header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    }

?>
