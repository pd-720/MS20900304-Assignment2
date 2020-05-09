# SS-Assignment2-OAuth2 demonstration

**Subject:** Software Security - IE5042

**Assignment Name:** OAuth2 demonstration

**Description:** 	Demonstrate OAuth2 authorization flows using Google OAuth2 as authorization server and Google Drive as resource server 

**Name:** E.M.P.S. Dehideniya

**Student ID:** MS20900304

**Email:** [ms20900304@my.sliit.lk](ms20900304@my.sliit.lk) 

**Report:** [https://github.com/pd-720/MS20900304-Assignment2/blob/master/Assignment%20Details/MS20900304-SS-Assignment2-Report.docx](https://github.com/pd-720/MS20900304-Assignment2/blob/master/Assignment%20Details/MS20900304-SS-Assignment2-Report.docx)


## Setting up the Authorization and Resource Servers


Please refer the report contained in the following link to download the instructions on setting up Authorization and Resource Servers:

[https://github.com/pd-720/MS20900304-Assignment2/blob/master/Assignment%20Details/MS20900304-SS-Assignment2-Report.docx](https://github.com/pd-720/MS20900304-Assignment2/blob/master/Assignment%20Details/MS20900304-SS-Assignment2-Report.docx)


##  Setting up the GitHub Application Binary

This web application was developed using following:

- Ubuntu 19.10 
- PHP 7.3
- PhpStorm 2020.1
- Composer 1.10.6

### Download the contents as a ZIP file:
 
Navigate to 'Clone or Download' -> 'Download Zip'.

### Set up PHP environment in Ubuntu:

    sudo apt install php7.3 php7.3-common php7.3-opcache php7.3-cli php7.3-gd php7.3-curl php7.3-mysql

Use the following link for further information:

[https://linuxize.com/post/how-to-install-php-on-ubuntu-18-04/#installing-php-73-on-ubuntu-1804 
](https://linuxize.com/post/how-to-install-php-on-ubuntu-18-04/#installing-php-73-on-ubuntu-1804)

### Configure local PHP interpreter in PhpStorm:

Use the following link for further information:

[https://www.jetbrains.com/help/PhpStorm/configuring-local-interpreter.html](https://www.jetbrains.com/help/PhpStorm/configuring-local-interpreter.html)

### Install Composer dependency manager by using the terminal:

    sudo apt install composer

### Initialize Composer for the project:

Navigate to the project root folder.

Execute the following commands:
  
 
	php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"

### Create composer.phar file to adhere to Google API client:

    php composer.phar require google/apiclient:^2.0

**Note:** After completion, a folder named 'vendor' will be created.


### Update composer.phar file

    php composer.phar update

## Running the Web Application

Run the application by using the following commands: 

    echo "Close any open ports  for 8080:"
    fuser -k 8080/tcp
    echo "Run the native PHP server:"
    php -S localhost:8080 | firefox http://localhost:8080/login.php

**Note:** Save the command lines to a bash script and reuse.
