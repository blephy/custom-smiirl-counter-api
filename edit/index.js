var radios = document.getElementsByClassName('params');
var html_input = document.getElementById('html_input');
var input = document.getElementById('input');
var submit = document.getElementById('submit');

input.focus();

function changeHTML(array) {
  html_input.innerHTML = array[0];
  submit.value = array[1];
  if (array[2]) {
    input.style.display = 'block';
    input.focus();
    input.value == 0 ? input.value = '' : null;
  } else {
    input.style.display = 'none';
    submit.focus();
    input.value = 0;
  }
}
