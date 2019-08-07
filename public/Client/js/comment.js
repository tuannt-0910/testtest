$(function () {
    var _token = $('input[name="_token"]').val();

    $(document).on('click', '.send_message', function () {
        var question_id = $(this).data('question_id');
        var url = $(this).attr('data-urlStore');
        var content = $('#modal_' + question_id + ' .content_message').val();
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
                            '</h6>' +
                            '<p>' + data.comment.content + '</p><hr>' +
                        '</div>';
                    $('#modal_' + question_id +' .messages').append(html);
                    $('.content_message').val('');
                },
                error: function (data) {
                    console.log('error: ' + data);
                }
            });
        }
    });
});
