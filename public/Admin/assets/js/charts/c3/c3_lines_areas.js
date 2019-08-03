$(function () {
    var id = '#c3-area-chart';
    var chart = $(id);
    var column_x = chart.data('column_x') || [];
    var label_x = chart.data('label_x') || 'x';
    var label_y = chart.data('label_y') || 'y';
    var testes = chart.data('testes') || [];
    var tested = chart.data('tested') || [];
    var color_tests = chart.data('color_tests') || '#E53935';
    var color_tested = chart.data('color_tested') || '#3949AB';
    var height = chart.data('height') || 400;
    var tick_rotate = chart.data('tick_rotate') || 90;

    c3.generate({
        bindto: id,
        size: { height: height },
        point: {
            r: 4
        },
        color: {
            pattern: [color_tests, color_tested],
        },
        data: {
            x : 'x',
            columns: [
                column_x,
                testes,
                tested,
            ],
            types: {
                data1: 'area-spline',
                data2: 'area-spline'
            },
        },
        axis: {
            x: {
                label: label_x,
                type: 'category',
                tick: {
                    rotate: -tick_rotate
                },
                height: 80
            },
            y: {
                label: label_y
            },
        },
        zoom: {
            enabled: true
        },
        grid: {
            y: {
                show: true
            },
        },
    });
});
