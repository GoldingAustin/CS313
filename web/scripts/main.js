/**
 * Created by austingolding on 1/14/17.
 */

$(window).on("load", function() {
    var show = document.getElementsByClassName("showPic");
    var sec = document.getElementsByClassName("sec");
    var pic = document.getElementsByClassName("pic");
    $(".sec").each(function(index){
       $(this).css('display', 'none');
    });
    for (var i = 0; i < show.length; i++) {
        show[i].addEventListener("mouseover", showEvent(sec[i], pic[i]));
        show[i].addEventListener("mouseout", hideEvent(sec[i], pic[i]));
    }
});


function showEvent(sec, pic) {
   return function() {
       sec.style.display = "block";
       pic.style.display = "none";
   }
}

function hideEvent(sec, pic) {
    return function() {
        sec.style.display = "none";
        pic.style.display = "block";
    }
}
