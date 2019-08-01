$(function () {
    var _token = $('input[name="_token"]').val();

    $(document).on('click', '#send_message', function () {
        var content = $('#content_message').val();
        var question_id = $('#send_message').data('question_id');
        var url = $('#send_message').attr('data-urlStore');
        if (content) {
            $.ajax({
                type: 'POST',
                url: url,
                cache: false,
                data: {_token : _token, content : content, question_id : question_id},
                success: function (data) {
                    var html = '<div id="message_' + data.comment.id + '">' +
                            '<h6 class="text-semibold">' + data.comment.user.username + ' -' +
                                '<span class="content-group-sm text-muted">' + data.comment.created_at + '</span>' +
                                '<button data-urlDestroy="' + data.urlDestroy + '" data-id_message="message_' + data.comment.id + '"' +
                                    'type="button" class="close btn btn-link message_destroy"><i class="icon-bin2"></i></button>' +
                            '</h6>' +
                            '<p>' + data.comment.content + '</p><hr>' +
                        '</div>';
                    $('#messages').append(html);
                    $('#content_message').val('');
                },
                error: function (data) {
                    console.log('error: ' + data);
                }
            });
        }
    });

    $(document).on('click', '.message_destroy', function () {
        var url = $(this).attr('data-urlDestroy');
        var id_message = $(this).attr('data-id_message');
        $.ajax({
            type: 'DELETE',
            url: url,
            cache: false,
            data: {_token : _token},
            success: function (data) {
                if (data) {
                    $('#' + id_message).remove();
                }
            },
            error: function (data) {
                console.log('error: ' + data);
            }
        });
    });
});
