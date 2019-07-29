$(function () {
    $('#list_questions_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: $('#route_getDatas').val(),
        columns: [
            { data: 'code', name: 'code' },
            { data: 'content', name: 'content' },
            { data: 'content_suggest', name: 'content_suggest' },
            { data: 'question_type', name: 'question_type' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action' },
        ]
    });
});
