# custom-smiirl-counter-api
Simple and fast integration of the perso / custom [Smiirl](http://www.smiirl.com/en/) counter.
This repo let you **show custom number** in your [custom smiirl counter](http://www.smiirl.com/en/counter/custom), and add **simple possibility to edit the number** with a basic user interface ([folder edit](edit/)).


<p align="center">
<img src="http://cdn.smiirl.com/img/counter/custom/slideshow/5D-top-md@2.jpg" alt="Custom 7 number Smiirl Counter" width="80%" height="auto" />
</p>


---
## Features
- **Print out your custom number** in _JSON format_ for you Smiirl Counter.
- _Custom number_ **can be edited** thanks to a User Interface.
- **Included** _1 responsive template_.
- **Included** _6 default actions_.
- _User Interface_ **can easily be configured** with the API in order to write your template with ease.
- **Add your custom action and mathematical operation** setup with ease.
- _Editing history_ **can be printed**.
- All editing actions **are logged in [log/actions.log](log/actions.log)**.
- **No MySQL database** needed.

## Demo
<p align="center">
<img src="https://github.com/blephy/custom-smiirl-counter-api/blob/master/screenshot.png" alt="User Interface of this project"/>
<br>
<p align="center">
<img src="https://github.com/blephy/custom-smiirl-counter-api/blob/master/screenshot-log-pannel.png" alt="User Interface of this project with the log pannel"/>
<br>
<p align="center">
<img src="https://github.com/blephy/custom-smiirl-counter-api/blob/master/screenshot-responsive-mobile.jpg" width="50%" height="50%" alt="Mobile User Interface of this project with the log pannel"/>
<br>
<a href="//allandolle.fr/custom-smiirl-counter-api" title="Demo Custom Smiirl Counter API">Demo API</a>
<br>
<a href="//allandolle.fr/custom-smiirl-counter-api/edit" title="Demo user interface to edit custom smiirl number">Demo User Interface</a>
</p>

## Requirements
- [Nginx](https://nginx.org/en/) or [Apache](https://httpd.apache.org/)
- PHP 7+

## Smiirl Documentation
Please, you maybe need to read the [official documentation of Smiirl](http://static.smiirl.com/wp-content/uploads/2017/07/guide-custom-en.pdf).

## Configuration
### Basic
Edit the [config/client.php](config/client.php) file as you want.

**You can just edit `$_PROJECT_FOLDER` and you are good to go**

- `$_PROJECT_FOLDER` : absolute path of the folder which contain this project on your remote server
- `$_PATH_JSON_FILE` : the path to .json file relative to `$_PROJECT_FOLDER`
- `$_PATH_LOG_FILE` : the path to .log file relative to `$_PROJECT_FOLDER`
- `$_KEY_NAME` : the name of the key relative to the number in your .json file
- `$_ACTIVE_EASTER_EGGS` : Active easter eggs after submitting new number value
- `$_DEFAULT_INPUT_VALUE` : The default input value of the form
- `$_HTML_COUNT` : The output HTML in top of counter's number
- `$_ACTIONS` : You can here change or create custom actions

### Customise actions
You can customise actions. See `$_ACTIONS` in [config/client.php](config/client.php) :

- **Default actions are :**
  - Action `AJOUTER` : Add the input number value to the existing number.
  - Action `ENLEVER` : Remove the input number value to the existing number
  - Action `ECRASER` : Erase the existing number by the input number value.
  - Action `AJOUTE_POURCENT` : Add input % to the existing number.
  - Action `ENLEVE_POURCENT` : Remove input % to the existing number.
  - Action `RESET` : Reset existing number to zero.

- **Add a new action :**
  Add your action configuration to `$_ACTIONS` array :
  - `ACTIVE` : active the action or not.
  - `HTML_RADIO` : HTML Output in front of the html's radio.
  - `HTML_INPUT` : HTML Output in front of the html's input when the radio is selected.
  - `DISPLAY_INPUT` : Display or not the form's input if the action is selected.
  - `HTML_SUBMIT` : HTML value of the submit button when the radio is selected.
  - `MATH` : An operation function with 2 parameters (old value counter and new input value). Please note that your callback function must have 2 parameters, the first (`$old` in the exemple below) is the current value of the counter and the second (`$new` in the exemple below) is the form's input value.
```php
'MY_NEW_ACTION' => [
  ACTIVE => true,
  HTML_RADIO => 'Custom text',
  HTML_INPUT => 'Add value and multiply by 100',
  DISPLAY_INPUT => true,
  HTML_SUBMIT => 'Do it !',
  MATH => function ($old, $new) {
    return ($old + $new) * 100;
  }
]
```

### Customise User Interface
Just learn CSS language and edit [edit/index.css](edit/index.css)

### API
You can construct your home made solution. **You need to add this php code on every top** of your
.php files (don't forget to edit the include directive with the right path):
```php
// Exemple of include
// Edit this include path with your directive directory
include_once 'app/simple-smiirl-counter.php';

use SSmiirl\SimpleSmiirlCounter as SSmiirl;

$SSmiirl = new SSmiirl;
```

**Legend :**
- :maple_leaf: --> [Configuration file](app/config/client.php)

| SSmiirl method | Params | Return | Description and exemple |
| :---: | :---: | :---: | :--- |
| `initSmiirlApiPage()` | none | [json] | Init functions and class needed to your api custom page. Return the json data after reading .json file [:maple_leaf:](app/config/client.php)`$_PATH_JSON_FILE`.<br>**Exemple :**<br>`echo $SSmiirl->initSmiirlApiPage();` |
| `initEditPage()` | none | null | Init the function needed to your edit custom page. Listen `$_POST[]`, Read and write json file [:maple_leaf:](app/config/client.php)`$_PATH_JSON_FILE`, read and write log file [:maple_leaf:](app/config/client.php)`$_PATH_LOG_FILE`.<br>**Exemple :**<br>` $SSmiirl->initEditPage();` |

<p align="center" style="font-weight: bold;">... IN PROGRESS ...</p>

## Installation
- Just upload files in your apache or nginx server where you specify `$_PROJECT_FOLDER`.
> Exemple :
> If you uploaded the project to _http://your-domaine-name.com/Smiirl/_
> your `$_PROJECT_FOLDER` need to be : `$_PROJECT_FOLDER = '/Smiirl'`

- Don't forget to edit file permission of `app/log/actions.log` and `app/json/number.json` to 775 `chmod 755 $file` on your server in order to write in those files.

- Go to your [Smiirl Account](https://my.smiirl.com/login) and specify your configuration.
> Exemple :
> If you follow the exemple above, specify _http://your-domaine-name.com/Smiirl/_ as URL in your Smiirl Account

- (Optional) Protect the editing action with php (restrictive IP / cookie / account session ...) or with .htpasswd (Ask Google)
- Enjoy !

## How to go to the user interface to edit the number value of your Smiirl Counter
To access the edit user interface, add `/edit` to your smiirl URL :
> Exemple :
> If you follow the installation exemple, Go to _http://your-domaine-name.com/Smiirl/edit_
