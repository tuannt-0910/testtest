$(function () {
    var _token = $('input[name="_token"]').val();
    toastr.options.closeButton = true;
    toastr.options.closeHtml = '<button><i class="icon-bin"></i></button>';

    $(".tree-checkbox-hierarchical").fancytree({
        checkbox: true,
        selectMode: 3,
        select: function (event, data) {
            // Get a list of all selected nodes, and convert to a key array:
            var selectedTestIds = $.map(data.tree.getSelectedNodes(), function (node) {
                if (node.children == null) {
                    return node.data.test_id;
                }
            });

            selectedTestIds = JSON.stringify(selectedTestIds);
            var url = $(this).attr('data-urlSetRole');
            $.ajax({
                type: 'POST',
                url: url,
                cache: false,
                data: {_token : _token, selectedTestIds : selectedTestIds},
                success: function (data) {
                    if (data.status) {
                        toastr.success(data.message, data.title);
                    } else {
                        console.log('error: ' + data);
                        toastr.error(data.message, data.title);
                    }
                },
                error: function (data) {
                    console.log('error: ' + data);
                    toastr.error(data.message, data.title);
                }
            });
        },
    });
});
