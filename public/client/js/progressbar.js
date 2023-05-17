$(document).ready(function() {
    $(window).scroll(function(){
        var scrollTop = document.documentElement.scrollTop;
        var height = $(document).height();
        if (scrollTop < 2) {
            var percent = 0;
        } else {
            var percent = ((scrollTop + $(window).height()) / height) * 100;
        }
        $('#progressbar').css('width', percent + '%');
    });
});