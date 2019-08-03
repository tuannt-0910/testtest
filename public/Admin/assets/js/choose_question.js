$(function () {
    var selected_questions = [];

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
                data.map((question) => {
                    var html = '<tr><td class="text-center">' + question.code + '</td>' +
                                    '<td class="text-center">' + question.content + '</td>' +
                                    '<td><button class="btn btn-link searched_question" data-question_id="' + question.id +
                                        '" data-code="' + question.code + '">' +
                                        '<i class="icon-move-right"></i></td></button>' +
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
        if (!checkQuestionExists(selected_questions, question_id)) {
            selected_questions[question_id] = question_id;

            var code = $(this).data('code');
            var html = '<tr id="selected_question_' + question_id + '">' +
                '<td class="text-center">' + code + '</td>' +
                '<i class="icon-move-right"></i></td>' +
                '<td><button class="btn btn-link remove_rearched_question" data-question_id="' + question_id + '" ' +
                'data-remove_id="selected_question_' + question_id + '">' +
                '<input type="hidden" name="seleted_questions[]" value="' + question_id + '">' +
                '<i class="icon-bin"></i></button></td>' +
                '</tr>';

            $('#list_selected_questions').append(html);
        }
    });

    $(document).on('click', '.remove_rearched_question', function (e) {
        e.preventDefault();
        var remove_id = $(this).data('remove_id');
        var question_id = $(this).data('question_id');

        $('#' + remove_id).remove();
        delete selected_questions[question_id];
    });

    function checkQuestionExists($array, $itemCheck)
    {
        if ($array[$itemCheck]) {
            return true;
        }

        return false;
    }
});
