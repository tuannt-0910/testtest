$(function () {
    $('#list_test_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: $('#route_getDatas').val(),
        columns: [
            { data: 'name', name: 'name' },
            { data: 'code', name: 'code' },
            { data: 'category.name', name: 'category.name' },
            { data: 'created_user.username', name: 'created_user.username' },
            { data: 'execute_time', name: 'execute_time' },
            { data: 'total_question', name: 'total_question' },
            { data: 'free', name: 'free' },
            { data: 'publish', name: 'publish' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action' },
        ]
    });
});