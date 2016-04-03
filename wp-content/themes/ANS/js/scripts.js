$(document).ready(function(){
    
});

function over(a, b, c){
    var src = $(a).attr("src").replace(b, c);
    $(a).attr("src", src);   
}
