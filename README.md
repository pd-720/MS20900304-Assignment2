# SS-Assignment2-OAuth2 demonstration

**Subject:** Software Security - IE5042

**Assignment Name:** OAuth2 demonstration

**Description:**  Demonstrate OAuth2 authorization flows using Google OAuth2 as authorization server and Google Drive as resource server 

**Name:** E.M.P.S. Dehideniya

**Student ID:** MS20900304

**Email:** [ms20900304@my.sliit.lk](ms20900304@my.sliit.lk) 

**GitHub link for downloading contents:** [https://github.com/pd-720/MS20900304-Assignment2/archive/master.zip](https://github.com/pd-720/MS20900304-Assignment2/archive/master.zip)

**Report link:** [https://github.com/pd-720/MS20900304-Assignment2/raw/master/Assignment%20Details/MS20900304-SS-Assignment2-Report.pdf](https://github.com/pd-720/MS20900304-Assignment2/raw/master/Assignment%20Details/MS20900304-SS-Assignment2-Report.pdf)


##  Environment details

This web application was developed and tested using following technologies:

- Ubuntu 19.10 
- PHP 7.3
- PhpStorm 2020.1
- Composer 1.10.6
- Google OAuth2
- Google Drive 


## Deploy and Run the Web Application 

## GitHub repository contents
 
Navigate to 'Clone or Download' -> 'Download Zip' or use the following link:

[https://github.com/pd-720/MS20900304-Assignment2/archive/master.zip](https://github.com/pd-720/MS20900304-Assignment2/archive/master.zip)

Extract the contents of the downloaded file and navigate to the project folder.

## Setting up the Authorization Server and Resource Server

Please refer **Section 2 - Configure Authorization Server and Resource Server** of the report contained in the following path of the downloaded ZIP file:

*Assignment Details/MS20900304-SS-Assignment2-Report.pdf*

### Replace OAuth2 client ID information:

Based on the downloaded OAuth2 client ID json file in the **Section 2.1.2.3 - Generate OAuth Client ID json file** of the report, replace the contents of the client_secrets.json located in the following path: 

*<project_root_folder>/resources/client/client_secrets.json*

### Set up PHP environment in Ubuntu:

Execute the following command in a terminal:

    sudo apt install php7.3 php7.3-common php7.3-opcache php7.3-cli php7.3-gd php7.3-curl php7.3-mysql

Use the following link for further information:

[https://linuxize.com/post/how-to-install-php-on-ubuntu-18-04/#installing-php-73-on-ubuntu-1804 
](https://linuxize.com/post/how-to-install-php-on-ubuntu-18-04/#installing-php-73-on-ubuntu-1804)


### Install Composer dependency manager by using the terminal:

Execute the following command in terminal to install Composer:

    sudo apt install composer

### Initialize Composer for the project:

Open a terminal in the project root folder and execute the following commands: 
 
	php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"

**Note**: Use the following link for further information:

[https://linuxize.com/post/how-to-install-php-on-ubuntu-18-04/#installing-php-73-on-ubuntu-1804](https://linuxize.com/post/how-to-install-php-on-ubuntu-18-04/#installing-php-73-on-ubuntu-1804)


### Create composer.phar file to adhere to Google API client:

Execute the following command to import Google API client and resolve dependencies:

    php composer.phar require google/apiclient:^2.0

**Note:** After completion, a folder named 'vendor' will be created.

### Update composer.phar file

Execute the following command to update the composer.phar file, after making any changes:

    php composer.phar update
    
## Running the Web Application

Run the application by using the following command: 

    php -S localhost:8080 | firefox http://localhost:8080/login.php
