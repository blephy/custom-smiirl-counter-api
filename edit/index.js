var radios = document.getElementsByClassName('params');
var input = document.getElementById('input');
var submit = document.getElementById('submit');
var audio = document.getElementById('audio');
var pin = document.getElementsByClassName('pin');
var logger = document.getElementsByClassName('logger');

input.classList.add("show");
audio.autoplay = false;
audio.volume = 0.4;
audio.currentTime = 0;
audio.load();

input.onfocus = function() {
  input.dataset.oldplaceholder = input.getAttribute('placeholder');
  input.setAttribute('placeholder', '');
};
input.onblur = function() {
  input.setAttribute('placeholder', input.getAttribute('data-oldplaceholder'))
}
logger[0].addEventListener('mouseover', function() {
  pin[0].style.transform = 'translate3d(46px, -50%, 10px)';
  // pin[0].style.opacity = 0;
});
logger[0].addEventListener('mouseleave', function() {
  pin[0].style.transform = 'translate3d(0, -50%, 20px)';
});

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
