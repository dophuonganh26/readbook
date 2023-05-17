function markAllAsRead()
{
    $.ajax({
        url: '/mark-all-as-read',
        type: 'GET',
        success: function(response) {
            if(response.status == 200) {
                $(`.notification-count-${response.id}`).html(0);
                $(`.new-${response.id}`).hide();
                $(`.mark-as-read-${response.id}`).hide();
                for (var x of response.notifications) {
                    $(`#date-read-${x.id}`).html(x.date_read);
                }
                if (response.check < 1) {
                    $(`.mark-all-as-read-${response.id}`).hide();
                } else {
                    $(`.mark-all-as-read-${response.id}`).show();
                }
            }
        }
    });
}

function markAsRead(id)
{
    $.ajax({
        url: '/mark-as-read',
        type: 'GET',
        data: {
            'id': id
        },
        success: function(response) {
            if(response.status == 200) {
                $(`#new-${id}`).hide();
                $(`#mark-as-read-${id}`).hide();
                $(`#new-item-${id}`).hide();
                $(`#notification-mark-as-read-${id}`).hide();
                $(`#date-read-${id}`).html(response.date_read);
                $(`.notification-count-${response.id}`).html(response.count);
                if (response.check < 1) {
                    $(`.mark-all-as-read-${response.id}`).hide();
                } else {
                    $(`.mark-all-as-read-${response.id}`).show();
                }
            }
        }
    });
}

setInterval(function(){
    $.ajax({
        url: '/render',
        type: 'GET',
        success: function(response) {
            if(response.status == 200) {
                $(`.notification-count-${response.id}`).html(response.count);
                $(`#notification-table-${response.id}`).html(response.data);
                if (response.check < 1) {
                    $(`.mark-all-as-read-${response.id}`).hide();
                } else {
                    $(`.mark-all-as-read-${response.id}`).show();
                }
            }
        }
    });
}, 5000);
