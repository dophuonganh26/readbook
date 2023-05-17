function remove_background(story_id) {
    for (let count = 1;count <= 5;count++) {
        $('#'+story_id+'-'+count).css('color','#ccc');
    }
}
// hover chuột đánh giá sao
$(document).on('mouseenter','.rating', function(){
    var index = $(this).data('index');
    var story_id = $(this).data('story_id');
    remove_background(story_id);
    for (let count = 1;count <= index;count++) {
        $('#'+story_id+'-'+count).css('color','#ffcc00');
    }
});
// nhả chuột không đánh giá
$(document).on('mouseleave','.rating', function(){
    var story_id = $(this).data('story_id');
    var rating = $(this).data('rating');
    remove_background(story_id);
    for (let count = 1;count <= rating;count++) {
        $('#'+story_id+'-'+count).css('color','#ffcc00');
    }
});
// click đánh giá sao
$(document).on('click','.rating', function(){
    var index = $(this).data('index');
    var story_id = $(this).data('story_id');
    $.ajax({
        type:'POST',
        url:'/rating',
        data: {
            index:index,
            story_id:story_id
        },
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success:function(res){
           if (res.status == 200) {
                swal({
                    title: "Success",
                    text: "Cảm ơn bạn đã đánh giá",
                    type: "success"
                }).then(function() {
                    window.location = window.location.href;
                });
           } else {
                swal({
                    title: "Error",
                    text: "Vui lòng đăng nhập trước khi đánh giá",
                    type: "error"
                }).then(function() {
                    window.location = "/auth/login";
                });
           }
        }
    });
});