![AV Development logo](/assets/icons/avd_logo.svg)

<br>

# AVD Portfolio Website

<!-- TOC -->
<details>
<summary>Table of Contents</summary>
  <ul>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
        <li><a href="#usage">Usage</a></li>
      </ul>
    </li>
  </ul>
</details>
<br>

<!-- ABOUT THE PROJECT -->

## About The Project

I am developing a portfolio site primarily to present my previous projects and use it for my future career. A potential customer or employer shall be able to get a first impression of my former work, including references and reviews of clients.
Furthermore, I want to offer my services being web design, development, branding, SEO (Search Engine Optimization) & SEA (Search Engine Advertising), CMS (Content Management System), and customer support.

<br>

### Built With

<br>

<img align="center" alt="HTML5" width="26px" src="https://raw.githubusercontent.com/github/explore/80688e429a7d4ef2fca1e82350fe8e3517d3494d/topics/html/html.png" />
<img align="center" alt="CSS3" width="26px" src="https://raw.githubusercontent.com/github/explore/80688e429a7d4ef2fca1e82350fe8e3517d3494d/topics/css/css.png" />
<img align="center" alt="JavaScript" width="26px" src="https://raw.githubusercontent.com/github/explore/80688e429a7d4ef2fca1e82350fe8e3517d3494d/topics/javascript/javascript.png" />
<img align="center" alt="PHP" width="26px" src="https://raw.githubusercontent.com/github/explore/80688e429a7d4ef2fca1e82350fe8e3517d3494d/topics/php/php.png" />
<img align="center" alt="MySQL" width="26px" src="https://raw.githubusercontent.com/github/explore/80688e429a7d4ef2fca1e82350fe8e3517d3494d/topics/mysql/mysql.png" />
<img align="center" alt="Visual Studio Code" width="26px" src="https://raw.githubusercontent.com/github/explore/80688e429a7d4ef2fca1e82350fe8e3517d3494d/topics/visual-studio-code/visual-studio-code.png" />
</p>

<br>

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED -->

## Getting Started

### Prerequisites

<br>

#### Windows instructions

<br>
1. **Install XAMPP** at [https://www.apachefriends.org/](https://www.apachefriends.org/)

2. On windows, PHP is most likely not installed.
   Check this in the command line with the command: `php -v`

3. If not installed **add PHP** from XAMPP to the command line:

   (if installed ignore this step)

   You can find step by step instructions here: [https://dinocajic.medium.com/add-xampp-php-to-environment-variables-in-windows-10-af20a765b0ce](https://dinocajic.medium.com/add-xampp-php-to-environment-variables-in-windows-10-af20a765b0ce)

4. **Install Composer** you can download an installer here: [https://getcomposer.org/doc/00-intro.md](https://getcomposer.org/doc/00-intro.md)

5. **Test Composer** in command line with the command: `composer`

<br>

#### OS X instructions

<br>
1. **Install** XAMPP at [https://www.apachefriends.org/](https://www.apachefriends.org/)

or

**MAMP** at [https://www.mamp.info](https://www.mamp.info)
(recommended for OS X)

2. Check whether and which **version of PHP** is available in the command line with the command: `php -v or php -version`

   Composer needs at least PHP 7.2.5, if you have at least PHP 7.2.5 skip the next step (step 3.).

3. **Install PHP** with homebrew
   Check if you already have homebrew in the command line with the command: `brew`

   If you don't already have homebrew you can find step by step instructions here: [https://mac.install.guide/homebrew/3.html](https://mac.install.guide/homebrew/3.html)

   Test if Homebrew was successfully installed in the command line with the command: `brew help`

   To add and install PHP with homebrew follow these instructions: [https://wpbeaches.com/updating-to-php-versions-7-4-and-8-on-macos-12-monterey/](https://wpbeaches.com/updating-to-php-versions-7-4-and-8-on-macos-12-monterey/)

4. **Install Composer** with [https://formulae.brew.sh/formula/composer](https://formulae.brew.sh/formula/composer)

5. **Add alias to Composer**, you can find intructions here [https://www.chrissy.dev/notes/install-composer-globally-on-mac-os/](https://www.chrissy.dev/notes/install-composer-globally-on-mac-os/) (from step 4.)

6. **Test** whether Composer has been installed in the command line with the command: `composer`

   You can exit the terminal and run tests in different folders.

<br>

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Installation

<br>

<!-- #### Install PHPMailer with Composer

<br>
PHPMailer is available on [Packagist](https://packagist.org/packages/phpmailer/phpmailer), and installation via Composer is the recommended way to install.

1. Create new folder "phpmailer" in "localhost"
2. Navigate to this folder using terminal/command line
3. Enter the following command in the command line: `composer require phpmailer/phpmailer`
4. Now look at the "phpmailer" folder. The following status should be found there:

![php mailer installed](/assets/images/rm_md_phpmailer_installed.png)

Note that the "vendor" folder and the "vendor/autoload.php" script are generated by Composer; they are not part of PHPMailer.

##### Alternative

<br>
Alternatively, if you're not using Composer, you can download PHPMailer as a zip file.

5. **Add PHPMailer** folder to the "admin" subfolder of the project.

6. Adjust **SMTP connection data** in "config.php" file in the "phpmailer" folder.

![config.php file](/assets/images/rm_md_config_php_file.png)

<br>

<p align="right">(<a href="#readme-top">back to top</a>)</p> -->

#### Import Database

<br>
1. Browse to your **phpMyAdmin URL** using your Internet Web Browser, and login using your root or dba user login.

2. From the main menu choose **Databases**

![create database](/assets/images/rm_md_create_db_ss.png)

3. In the create database field type in "portfolio_admin". Click Create.

4. Open "portfolio_admin" database

5. From the menu choose **Import**

![import database](/assets/images/rm_md_import_db_ss.png)

6. Choose the **"portfolio_admin_import.sql"** file and click **Go**

7. The `configuration.php` file in the **project root** contains unique setting and among other things also the database connection settings which if necessary can be adjusted.

<br>

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Usage

<br>
The content management system is only accessible to registered and logged-in users.

| Input field | Test user      |
| ----------- | -------------- |
| Username    | ally           |
| E-mail      | ally@gmail.com |
| Password    | Test-1234      |

<br>

<p align="right">(<a href="#readme-top">back to top</a>)</p>
