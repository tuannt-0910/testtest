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
                    var html = '<div class="message_{{ $comment->id }}">' +
                            '<h6 class="text-semibold">' + data.user.username + ' -' +
                                '<span class="content-group-sm text-muted">' + data.created_at + '</span>' +
                                '<a href="' +  + '" type="button" class="close"><i class="icon-bin2"></i></a>' +
                            '</h6>' +
                            '<p>' + data.content + '</p><hr>' +
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

                },
                error: function (data) {
                    console.log('error: ' + data);
                }
            });
        }
    });
});
