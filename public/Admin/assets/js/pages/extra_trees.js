$(function () {
    var _token = $('input[name="_token"]').val();

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
                    console.log(data);
                },
                error: function (data) {
                    console.log('error: ' + data);
                }
            });
        },
    });

    $("#btnDeselectAll").click(function () {
        var labelConfirm = $(this).attr('data-labelConfirm');
        if (confirm(labelConfirm)) {
            $(".tree-checkbox-hierarchical").fancytree("getTree").visit(function (node) {
                node.setSelected(false);
            });

            return false;
        }
    });
});
