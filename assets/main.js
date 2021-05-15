autosize(document.getElementById("textarea"));
hljs.highlightAll();

var myInput = document.getElementById("textarea");
if(myInput.addEventListener ) {
    myInput.addEventListener('keydown',this.keyHandler,false);
} else if(myInput.attachEvent ) {
    myInput.attachEvent('onkeydown',this.keyHandler); /* damn IE hack */
}

function keyHandler(e) {
    var TABKEY = 9;
    if(e.keyCode == TABKEY) {
        this.value += "    ";
        if(e.preventDefault) {
            e.preventDefault();
        }
        return false;
    }
}

var textAreaID = "textarea";
var content = document.getElementById(textAreaID).innerHTML.split("\n");
var newContent = [];

for (var i = 0; i < content.length; i++) {
  newContent.push((i + 1) + "\n");
}

document.getElementById("linenos").innerHTML = newContent.join("");

function copyToClipboard(text) {
    var dummy = document.createElement("textarea");
    document.body.appendChild(dummy);
    dummy.value = text;
    dummy.select();
    document.execCommand("copy");
    document.body.removeChild(dummy);
}

function buttonInformation(text) {
  var infoBox = document.getElementById("btnInfoBox");
  infoBox.style.display = "block";
  infoBox.innerHTML = text;
}

function hideButtonInformation() {
  var infoBox = document.getElementById("btnInfoBox");
  infoBox.style.display = "none";
}

function copyToClipboard(text) {
    var dummy = document.createElement("textarea");
    document.body.appendChild(dummy);
    dummy.value = text;
    dummy.select();
    document.execCommand("copy");
    document.body.removeChild(dummy);
}

function shareHaste() {
  var url = window.location.href;
  copyToClipboard(url);
  buttonInformation("Copied link");
  //alert("Copied haste link to clipboard.");
}

function newHaste() {
  var url = window.location.protocol + "//" + window.location.hostname;
  window.location.href = url + "/new";
}

function createHaste() {
  var hasteText = document.getElementById('textarea').value;
  hasteText = hasteText.replace(/(?:\r\n|\r|\n)/g, "<br>");
  var url = window.location.protocol + "//" + window.location.hostname;

  if (hasteText == "" || hasteText == null) {
    alert("You cant create an empty haste.")
    return;
  }

  var settings = {
    "url": url + "/new",
    "method": "POST",
    "timeout": 0,
    "headers": {
      "api-key": "jju5ghlajdfbg",
      "text": hasteText
    },
  };

  $.ajax(settings).done(function (response) {
    //console.log(response);
    window.location.href=response[0]["link"];
  });
}
