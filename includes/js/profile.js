

$(document).ready(function(){
    
    $.getJSON("includes/json/recommends.json", function(data){
        $.each(data.reccomends, function(){
            $('#recomm').append("<p>");
            $('#recomm').append(this.recc + "</p>");
        });
    });
});
