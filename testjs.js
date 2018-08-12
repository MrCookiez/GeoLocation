//======== Shortcut for document.getElementById ========
var byId = function(id) {
  return document.getElementById(id);
};
// API URL - STAND ALONE FILE
var api = "http://teovragkos.com/geolocation/data.php";

//Request function (The results will be displayed in console)
function replaceText() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", api, true);
  //Specify the type of content of the requested page to be json
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.onreadystatechange = function() {
    //If the operation is not complete then show loading text
    if (xhr.readyState < 4) {
      console.log("LOADING..");
    }
    //If request is success
    if (xhr.readyState == 4 && xhr.status == 200) {
      var json = JSON.parse(xhr.responseText);

      for (var i in json) {
        //Check request results at console
        console.log(json[i]);
      }
    }
  };
  xhr.send();
}

//Make the request using the above function
replaceText();
