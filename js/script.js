/*
* GLOBAL LEVEL SCRIPT
* */
var baseUrl = "http://localhost:8080/FBPostScheduler/";
document.addEventListener("DOMContentLoaded", function(event) {
    /**
     * This is the method which will be called when thw document is ready
     * Basically what this function does is activates the list item clicked and adds the respect page to the document.
     */
    var ele = document.getElementsByClassName('li');
    for (var i = 0; i<ele.length; i++){
        ele.item(i).addEventListener("click", function(e){
            var activeEle = document.getElementsByClassName('li active').item(0);
            activeEle.classList.remove('active');
            e.target.classList.add("active");
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if(this.readyState == 4 && this.status == 200){
                    document.getElementById("content").innerHTML = this.responseText;
                }
            };
            var val = e.target.getAttribute('value');
            if(val == 1)
                xhttp.open("GET",baseUrl + "includes/dashboard.php");
            else if(val == 2){
                xhttp.open("GET",baseUrl + "includes/view-all-posts.php");
            }
            xhttp.send();
        });
    }
});