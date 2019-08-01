$(function () {
    var question_type = $('#question_type').val();
    displayImageAudio(question_type);

    $(document).on('change', '#question_type', function (e) {
        question_type = $('#question_type').val();
        displayImageAudio(question_type);
    });

    function displayImageAudio(question_type)
    {
        switch (question_type) {
            case '1':
                $('#div_image').css('display', 'none');
                $('#div_audio').css('display', 'none');
                break;
            case '2':
                $('#div_image').css('display', 'block');
                $('#div_audio').css('display', 'none');
                break;
            case '3':
                $('#div_image').css('display', 'none');
                $('#div_audio').css('display', 'block');
                break;
        }
    }
});
