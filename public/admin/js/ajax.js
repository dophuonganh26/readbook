$(document).ready(function() {
    $('#class_select').change(function() {
        var classId = $(this).val();
        if (classId  == '') {
            $("#subject_select").html('');
            return ;
        }
        $.ajax({
            url: '/ajax-class',
            type: 'GET',
            data: {
                'classId': classId
            },
            success: function(response) {
                if(response.status == 200) {
                    var html = '';
                    if (Array.isArray(classId)) {
                        for (var subject of response.subjects) {
                            html += `<option value='${subject.id}'>${subject.title} - ${subject.class_title}</option>`;
                        }
                    } else {
                        for (var subject of response.subjects) {
                            html += `<option value='${subject.id}'>${subject.title}</option>`;
                        }
                    }
                    html += '</option>';
                    $("#subject_select").html(html);
                }
            }
        });
    });
});