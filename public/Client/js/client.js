$(function () {
    var test_id = $('#clockDiv').data('test_id');
    var execute_time = $('#clockDiv').data('execute_time');

    var timeinterval;
    var duration = localStorage.getItem('duration_test_' + test_id) || 0;
    var time_in_minutes = execute_time - duration / 60;

    function time_remaining(endtime)
    {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        return {'total': t, 'days': days, 'hours': hours, 'minutes': minutes, 'seconds': seconds};
    }

    function run_clock(id, endtime)
    {
        var clock = document.getElementById(id);

        function update_clock()
        {
            var t = time_remaining(endtime);
            clock.innerHTML = '<h4 class="text-center"><i class="icon-timer"></i>Duration</h4>' +
                '<h5 class="m-0 text-center font-weight-bold">' + t.minutes + ': ' + t.seconds + '</h5>';

            if (t.total <= 0) {
                time_out();
            } else {
                duration++;
            }
            localStorage.setItem('duration_test_' + test_id, duration);
        }

        update_clock(); // run function once at first to avoid delay
        var timeinterval = setInterval(update_clock, 1000);

        return timeinterval;
    }

    $(window).on('load', function () {
        var current_time = Date.parse(new Date());
        var deadline = new Date(current_time + time_in_minutes * 60 * 1000);
        timeinterval = run_clock('clockDiv', deadline);
    });

    function stopRunClock()
    {
        clearInterval(timeinterval);
    }

    $(document).on('click', '#submit_form', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Submit!'
        }).then((result) => {
            if (result.value) {
                submit_form();
            }
        });
    });

    function submit_form()
    {
        stopRunClock();
        $('#duration').val(duration);
        localStorage.removeItem('duration_test_' + test_id);
        document.getElementById("form_test").submit();
    }

    function time_out()
    {
        stopRunClock();
        $('#duration').val(duration);
        Swal.fire({
            position: 'center',
            type: 'success',
            title: 'Timeout',
            showConfirmButton: false,
            timer: 2000
        });
        setTimeout(function () {
            submit_form();
        }, 2000);
    }

    window.onscroll = function () {
        myFunction()
    };
    var header = document.getElementById("myHeader");
    function myFunction()
    {
        if (window.pageYOffset > 100) {
            $('.feature-1').css({'top': '200px', 'z-index': '200', 'transition':'1s'});
        } else {
            $('.feature-1').css({'top': '360px', 'z-index': '200'});
        }
    }
});
