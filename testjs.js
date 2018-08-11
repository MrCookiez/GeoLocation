//MAIN

//======== Shortcut for document.getElementById ========
var byId = function(id) {
  return document.getElementById(id);
};

var api = "https://florinafood.gr/endouble2/data.php";

function replaceText() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", api, true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.onreadystatechange = function() {
    if (xhr.readyState < 4) {
      byId("main").innerHTML = "Loading..";
    }

    if (xhr.readyState == 4 && xhr.status == 200) {
      var json = JSON.parse(xhr.responseText);
      byId("main").innerHTML = "";

      for (var i in json) {
        console.log(json[i]);
      }

      //target.innerHTML = json.Anytime.name;
    }
  };
  xhr.send();
}

//On page Load < ---- *** IMPORTANT *** ---- >
$(document).ready(function() {
  $("#main").html(replaceText);
});
