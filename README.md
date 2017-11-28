# simple-smiirl-counter
Simple and fast integration of the perso / custom [Smiirl](http://www.smiirl.com/fr/) counter.
This repo let you **show custom number** in your custom smiirl counter, and add **simple possibility to edit the number** with a basic user interface ([folder edit](edit/)).

- **Print out your custom number over JSON format for you Smiirl Counter**
- **Custom number can be change thanks to a User Interface**
- **User Interface can easily be configured with the API**
- **All editing actions are logged in [edit.log](log/edit.log).**
- **Editing history can be printed**

**Editing's history is printed without the need of database like MySQL.**

This repository is in operation at [dbcrenovation.fr](//dbcrenovation.fr/smiirl/)

![Screenshot edit smiirl counter interface](screenshot.png)

## Requirements
- [Nginx](https://nginx.org/en/) or [Apache](https://httpd.apache.org/)
- PHP 7+

## Smiirl Documentation
Please, you maybe need to read the [official documentation of Smiirl](http://static.smiirl.com/wp-content/uploads/2017/05/guide-custom-sup.pdf).

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
You can customise actions. See `$_ACTIONS` in [config/client.php](config/client.php).

**Default actions are :**
- Action `plus` : Add the input number value to the existing number.
- Action `minus` : Remove the input number value to existing number
- Action `erase` : Erase the existing number by the input number value.
- Action `reset` : Reset existing number to zero.

**Add a new action :**
- Add your action configuration to `$_ACTIONS` array :
  - `active`, active the action or not.
  - `radio_html`, HTML Output in front of the html's radio.
  - `input_html`, HTML Output in front of the html's input when the radio is selected.
  - `display_input`, Display or not the form's input if the action is selected.
  - `submit_html`, HTML value of the submit button when the radio is selected.
```
'new_action_name' => [
  'active' => true,
  'radio_html' => 'Custom text',
  'input_html' => 'Add value and multiply by 100',
  'display_input' => true,
  'submit_html' => 'Do it !'
]
```

- Add your mathematical operation to [config/actions.math.php](config/actions.math.php) :
  - `$reel_value[$FILE->key()]`, is the current value of the counter before the action is done.
  - `$_POST[$FILE->key()]`, is the value of the form's input.
  - `$new_value`, is the resulting value of the operation.
```
// This new action called new_action_name add the input value to counter and multiply it by 100
case 'new_action_name':
  $new_value = ( $reel_value[$FILE->key()] + $_POST[$FILE->key()] ) * 100;
  break;
```

### Customise User Interface
Just learn CSS language and edit [edit/index.css](edit/index.css)

### API
You can construct your home made solution. Documentation in progress ...

## Installation
- Just upload files in your apache or nginx server where you specify `$_PROJECT_FOLDER`.
```
Exemple :
If you uploaded the project to 'http://your-domaine-name.com/Smiirl/'
your $_PROJECT_FOLDER need to be : $_PROJECT_FOLDER = '/Smiirl'
```

- Go to your [Smiirl Account](https://my.smiirl.com/login) and specify your configuration.
```
Exemple :
If you follow the exemple bellow, specify http://your-domaine-name.com/Smiirl/ as URL in your Smiirl Account
```

- (Optional) Protect the editing action with php (restrictive IP or cookie) or with .htpasswd (Ask Google)
- Enjoy !

## Editing the number value of your Smiirl Counter
Go to 'http://your-domaine-name.com/Smiirl/edit' if you follow the exemple bellow.
