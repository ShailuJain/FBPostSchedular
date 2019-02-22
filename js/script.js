/*
* GLOBAL LEVEL SCRIPT
* */
var currInterval = null;
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
            var call = function () {
                if(this.readyState == 4 && this.status == 200){
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
});

/**
 * This function is called when the schedule button is clicked, it makes ajax calls for setting the time interval and opening the share dialog provided by facebook api.
 */
function schedule(){
    //If the interval is already set then clear that interval and set it again.
    if(currInterval!=null)
        clearInterval(currInterval);

    //set the session by giving ajax call to the set_time_session so that it will set the session, so it can be retrieved when needed
    var postAjax = new XMLHttpRequest();
    postAjax.open("POST", baseUrl + "includes/set_time_session.php");
    postAjax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    postAjax.send("schedule_btn=true&time_interval="+document.getElementById('time_interval').value);


    //This is main logic for opening the dialog provided by the facebook api to share the post as photo or text to the feed.
    currInterval = setInterval(function () {
        ajaxGet(baseUrl + "includes/schedule.php?random_post=true",function () {
        if(this.readyState == 4 && this.status == 200){
            //receives the response from the server which will the type of post and photo of the post.
            var text = JSON.parse(this.responseText);

            // if the type of post is status then open different dialog.
            if(text.type == "STATUS"){
                FB.ui({
                    display: 'popup',
                    method: 'feed',
                    message: text.post,
                }, function (response) {
                    console.log(response);
                });
            }
            // if the type of post is photo then open share dialog.
            else if(text.type == "PHOTO"){
                FB.ui({
                    display: 'popup',
                    method: 'share',
                    quote: 'Having Fun',
                    href: text.post,
                }, function (response) {
                    console.log(response);
                });
            }
        }
    });
        //setting the interval by converting it into hours.
    }, document.getElementById('time_interval').value*1000*60*60);
}

/**
 *
 * @param url :url to which ajax call should be made.
 * @param callback :reference to the call back function which will be called the ajax request is completed and response is ready.
 */
function ajaxGet(url, callback){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = callback;

    //opens the url with GET method
    xhttp.open("GET",url,true);

    //sends the ajax request
    xhttp.send();
}

/**
 * This function will be called when fb sdk will load.
 */
window.fbAsyncInit = function() {
    FB.init({
        appId            : '399058003984625',
        autoLogAppEvents : true,
        xfbml            : false,
        version          : 'v3.2'
    });
};