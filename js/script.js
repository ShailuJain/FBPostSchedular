/*
* GLOBAL LEVEL SCRIPT
* */
var baseUrl = "http://localhost:8080/FBPostScheduler/";
document.addEventListener("DOMContentLoaded", function(event) {
    /**
     * This is the method which will be called when the document is ready
     * Basically what this function does is activates the list item clicked and adds the respect page to the document.
     */
    var ele = document.getElementsByClassName('li');
    /**
     * for loop will find all the elements with li and add click listener to them
     * basically it will change the state of list items in navbar in the DOM
     */
    for (var i = 0; i<ele.length; i++){
        ele.item(i).addEventListener("click", function(e){
            var activeEle = document.getElementsByClassName('li active').item(0);
            activeEle.classList.remove('active');
            e.target.classList.add("active");

            //This will request for a new page from the server and will load the html contents to the div with id content
            var call = function (req, ev) {
                if(req.readyState == 4 && req.status == 200){
                    document.getElementById("content").innerHTML = this.responseText;
                }
            };
            //It checks if the value is 1 it shows includes dashboard else it includes view-all-posts html contents
            var val = e.target.getAttribute('value');
            if(val == 1)
                ajaxGet(baseUrl + "includes/dashboard.php", call);
            else if(val == 2){
                ajaxGet(baseUrl + "includes/view-all-posts.php", call);
            }
        });
    }
    ajaxGet()

    /**
     * This part of code will run when the time has come to post an update on facebook
     */
    setTimeout(function () {
        
    }, )
});

/**
 *
 * @param url :url to which ajax call should be made.
 * @param callback :reference to the call back function which will be called the ajax request is completed and response is ready.
 */
function ajaxGet(url, callback){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = callback;

    //opens the url with GET method
    xhttp.open("GET",url);

    //sends the ajax request
    xhttp.send();
}