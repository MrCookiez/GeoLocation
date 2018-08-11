//MAIN

//======== Shortcut for document.getElementById ========
var byId = function(id) {
  return document.getElementById(id);
};
// API URL - STAND ALONE FILE
var api = "http://teovragkos.com/geolocation/data.php";

function replaceText() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", api, true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.onreadystatechange = function() {
    if (xhr.readyState < 4) {
      byId("main").innerHTML = "Loading..";
    }
    //If request is success
    if (xhr.readyState == 4 && xhr.status == 200) {
      var json = JSON.parse(xhr.responseText);
      //Clear main div content
      byId("main").innerHTML = "";

      for (var i in json) {
        //Check request results at console
        console.log(json[i]);
      }
    }
  };
  xhr.send();
}

//On page Load < ---- *** IMPORTANT *** ---- >
$(document).ready(function() {
  $("#main").html(replaceText);
});
