function addWishlist(storyId)
{
    $.ajax({
        url: '/add-wishlist',
        type: 'GET',
        data: {
            'storyId': storyId
        },
        success: function(response) {
            if (response.status == 200) {
                swal({ title: 'Thêm tủ truyện thành công', type: 'success' });
            }
        }
    });
}

$(document).ready(function() {
    $('#content-chapter > *').css('font-size', '16px');
    $('#content-chapter > * > span').css('font-size', '16px');
    $('#author_container').hide();
    $('#parent_category_select').change(function() {
        if ($(this).val() == 1) {
            $('#author_input').prop('required', false);
            $('#author_input').val('');
            $('#author_container').hide();
        } else {
            $('#author_input').prop('required', true);
            $('#author_container').show();
        }
    });
    $('.share-btn').on('click', function(e) {
        e.preventDefault();
        var url = $(this).data('url');
        var fb = document.createElement('a');
        fb.setAttribute('href', 'http://facebook.com/sharer/sharer.php?u=' + encodeURIComponent(url));
        fb.setAttribute('target', '_blank');
        fb.click();
    });
    $('#font-size-chapter').change(function() {
        var fontSize = $(this).val();
        $('#content-chapter > *').css('font-size', fontSize + 'px');
        $('#content-chapter > * > span').css('font-size', fontSize + 'px');
    });
});
