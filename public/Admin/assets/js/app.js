import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');
// Pusher.logToConsole = true;

window.Echo = new Echo({
    broadcaster: 'pusher',
    authEndpoint : 'http://localhost/testtest/public/broadcasting/auth',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: true,
    forceTLS: true
});

$(function () {
    var userId = $('#userId').val();

    $(document).ready(function () {
        var notifications = [];
        var limit_notify = $('#limitNotify').val();

        const NOTIFICATION_TYPES = {
            newTest: 'App\\Notifications\\UserTested'
        };

        if(userId) {
            //get start notify
            $.get('/testtest/public/admin/notifications', function (data) {
                addNotifications(data);
            });

            //add notify
            function addNotifications(newNotifications) {
                notifications = [...notifications, ...newNotifications];
                $('#count_notifications').text(notifications.length);

                // show only last 5 notifications
                if (notifications.length >= limit_notify) {
                    notifications.slice(0, limit_notify);
                }
                showNotifications(notifications);
            }

            //show notifications
            function showNotifications (notifications) {
                if(notifications.length) {
                    var htmlElements = notifications.map(function (notification) {
                        return makeNotification(notification);
                    });
                    $('#list_notifications').html(htmlElements.join(''));
                } else {
                    $('#list_notifications').html('<li class="dropdown-header">No notifications</li>');
                }
            }

            //make each notification
            function makeNotification (notification) {
                if (notification.type == NOTIFICATION_TYPES.newTest) {
                    return renderHTML(
                        notification.data.link_history,
                        notification.data.user_name,
                        notification.data.test_name,
                        notification.created_at
                    );
                }
            }

            function renderHTML (link, username, action_text, create_at) {
                return '<li class="media">' +
                    '<div class="media-left"><i class="icon-new"></i></div>' +
                        '<div class="media-body">' +
                        '<span class="media-heading">' +
                            '<span class="text-semibold">' + username + '</a> ' +
                            '<span class="text-muted">just</span> ' +
                            '<a href="' + link + '" class="text-semibold">' + action_text + '</a>' +
                        '</span><br />' +
                        '<span class="text-muted">' + create_at + '</span>' +
                    '</div>' +
                    '</li>'
            }

            // listen even notify
            window.Echo.private('App.User.' + userId)
                .notification((notification) => {
                    console.log(notification);
                    addNotifications([notification]);
                });
        }
    });
});
