var radios = document.getElementsByClassName('params');
var input = document.getElementById('input');
var submit = document.getElementById('submit');
var audio = document.getElementById('audio');

input.classList.add("show");
audio.autoplay = false;
audio.volume = 1;
audio.currentTime = 0;
audio.load();

input.onfocus = function() {
  input.dataset.oldplaceholder = input.getAttribute('placeholder');
  input.setAttribute('placeholder', '');
};
input.onblur = function() {
  input.setAttribute('placeholder', input.getAttribute('data-oldplaceholder'))
}

function autoType(element, typingSpeed, delay) {
  var selector = element;
  var text = element.value.trim().split('');
  var amntOfChars = text.length;
  var newString = "";
  setTimeout(function() {
    selector.value = '';
    for (var i = 0; i < amntOfChars; i++) {
      (function(i, char) {
        setTimeout(function() {
          newString += char;
          selector.value = newString;
        }, i * typingSpeed);
      })(i + 1, text[i]);
    }
  }, delay);
}

function changeHTML(array) {
  input.setAttribute("placeholder", array[0]);
  submit.value = array[1];
  autoType(submit, 20, 0);
  if (array[2]) {
    input.classList.add("show");
    // input.focus();
    input.value == 0 ? input.value = '' : null;
  } else {
    input.classList.remove("show");
    // submit.focus();
    setTimeout(function() {
      return input.value = 0;
    }, 400);
  }
}
