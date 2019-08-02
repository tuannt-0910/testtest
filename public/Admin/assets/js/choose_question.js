$(function () {
    $(document).on('keyup', '#keyword_search', function () {
        var keyword = $('#keyword_search').val();
        var url = $('#keyword_search').attr('data-urlSearch');
        $.ajax({
            type: 'GET',
            url: url,
            cache: false,
            data: {keyword : keyword},
            success: function (data) {
                $('#list_questions').html('');
                data.map((question, key) => {
                    var html = '<tr><td class="text-center">' + question.code + '</td>' +
                                    '<td class="text-center">' + question.content + '</td>' +
                                    '<td><button class="btn btn-link searched_question" data-question_id="' + question.id +
                                        '" data-code="' + question.code + '">' +
                                        '<i class="icon-move-right"></i></td></button>'
                                '</tr>';

                    $('#list_questions').append(html);
                });
            },
            error: function (data) {
                console.log('error: ' + data);
            }
        });
    });

    $(document).on('click', '.searched_question', function (e) {
        e.preventDefault();
        var question_id = $(this).data('question_id');
        var code = $(this).data('code');
        var html = '<tr><td class="text-center">' + code + '</td>' +
            '<i class="icon-move-right"></i></td>' +
            '<td><button class="btn btn-link"><i class="icon-bin"></i></button></td>' +
        '</tr>';

        $('#list_selected_questions').append(html);
    })
});
