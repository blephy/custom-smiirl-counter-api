var radios = document.getElementsByClassName('params');
var phrase = document.getElementById('phrase');
var valeur = document.getElementById('valeur');
var submit = document.getElementById('submit');

valeur.focus();

document.onclick = function() {
  for (var i = 0; i < radios.length; i++) {
      if (radios[i].checked) {
        var value = radios[i].value;
      }
  }
  switch (value) {
    case 'plus':
      phrase.innerHTML = 'CA à ajouter : ';
      valeur.style.display = 'block';
      submit.value = 'Ajouter';
      valeur.focus();
      break;
    case 'minus':
      phrase.innerHTML = 'CA à enlever : ';
      valeur.style.display = 'block';
      submit.value = 'Enlever';
      valeur.focus();
      break;
    case 'erase':
      phrase.innerHTML = 'Changer la valeur en : ';
      valeur.style.display = 'block';
      submit.value = 'Redéfinir';
      valeur.focus();
      break;
    case 'reset':
      phrase.innerHTML = 'Votre compteur sera remis à zero : ';
      valeur.style.display = 'none';
      valeur.value = 0;
      submit.value = 'Reset';
  }
}
