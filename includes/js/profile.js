$(document).ready(function(){
    console.log("here");
    
    $.getJSON("includes/json/recommends.json", function(data){
        // $('#reccomend').append("<p>");
        $.each(data.reccomends, function(){
            $('#reccomend').append("<p>");
            $('#reccomend').append(this.recc + "</p>");
        });
    });
});