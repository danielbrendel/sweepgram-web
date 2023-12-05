<h1 align="center">
    <img src="public/img/logo.png" width="128"/><br/>
    Instadelity
</h1>

<p align="center">
    Current version: <strong><code>1.0</code></strong>
</p>

<p align="center">
    <img src="https://img.shields.io/badge/language-php-orange" alt="language-php"/>
    <img src="https://img.shields.io/badge/license-MIT-blue" alt="license-mit"/>
    <img src="https://img.shields.io/badge/maintained-yes-green" alt="maintained-yes"/>
</p>

## Description
This tool can check who is not following you back on Instagram. Therefore you just need to download
your follower and following data from Instagram as JSON format and submit the ZIP archive. The tool
will then output a list of users that are not following you back.

## Instructions
First step is to clone or download the repository. After that you need to create your env file from the example file
```shell
copy .env.example .env
```
Now install all packages via Composer
```shell
composer install
```
Final step is to launch the web service
```shell
php asatru serve
```
You can now browse to http://localhost:8000/ in order to use the tool in your local environment.

## Requirements:
- PHP ^8.2
- Zip extension
- Composer