# simple-smiirl-counter
Simple and fast integration of the perso / custom [Smiirl](http://www.smiirl.com/fr/) counter.
This repo let you **show custom number** in your custom smiirl counter, and add **simple possibility to edit the number** with a basic user interface ([folder edit](edit/)).

**Edit actions are logged in** [edit.log](log/edit.log).

**Possible Edit actions are :**
- Add number from existing value
- Remove number from existing value
- Erase number with new value
- Reset number to zero

This repository is in operation at [dbcrenovation.fr](//dbcrenovation.fr/smiirl/)

![Screenshot edit smiirl counter interface](screenshot.png)

## Requirements
- [Nginx](https://nginx.org/en/) or [Apache](https://httpd.apache.org/)
- PHP 7+

## Smiirl Documentation
Please, you maybe need to read the [official documentation of Smiirl](http://static.smiirl.com/wp-content/uploads/2017/05/guide-custom-sup.pdf).

## Configuration
Edit the [config/client.php](config/client.php) file as you want
**You can just edit $_ROOT_URL and $_PROJECT_FOLDER and you are good to go**

``` php
$_ROOT_URL // your domaine name with protocol and extension
$_PROJECT_FOLDER // absolute path of the folder which contain this project on your remote server
$_PATH_JSON_FILE // the path to .json file relative to $_PROJECT_FOLDER
$_PATH_LOG_FILE // the path to .log file relative to $_PROJECT_FOLDER
$_KEY_NAME // the name of the key relative to the number in your .json file
$_ACTIVE_EASTER_EGGS // Active easter eggs after submitting new number value
```

## Installation
- Just upload files where you want in your apache or nginx server (in `$_PROJECT_FOLDER`). Exemple like here : 'http://your-domaine-name.com/Smiirl/' (in a 'Smiirl' folder, so your `$_PROJECT_FOLDER = '/Smiirl'` )
```
class/
config/
edit/
log/
template/
index.php
number.json (or the file name you choose)
.htaccess
```
- Go to your [Smiirl Account](https://my.smiirl.com/login) and specify your configuration to smiirl (If you follow the exemple bellow, specify http://your-domaine-name.com/Smiirl/ as URL)
- Protect the editing action with php or with .htpasswd (Ask Google)
- Enjoy !

## Editing the number value of your Smiirl Counter
Go to 'http://your-domaine-name.com/Smiirl/edit' if you follow the exemple bellow.
