(function () {
    'use strict';

    // Tabs
    document.querySelectorAll('.tab-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.tab-btn').forEach(function (b) {
                b.classList.remove('active');
            });
            this.classList.add('active');

            var tab = this.getAttribute('data-tab');

            document.querySelectorAll('.tab-content').forEach(function (c) {
                c.classList.remove('active');
            });
            document.getElementById(tab).classList.add('active');
        });
    });

    // Send Message
    var btn = document.getElementById('send-btn');

    if (btn) {
        var isSending = false;

        btn.onclick = function (e) {
            e.preventDefault();
            if (isSending) return;

            isSending = true;

            var loader = document.getElementById('loader');
            var text = document.getElementById('btn-text');

            loader.style.display = 'inline';
            text.style.display = 'none';

            fetch(botsmsg_ajax.ajax_url, {
                method: 'POST',
                body: new URLSearchParams({
                    action: 'sn_send_manual',
                    phone: document.getElementById('phone').value,
                    message: document.getElementById('msg').value,
                    nonce: document.getElementById('botsmsg_nonce').value
                })
            })
            .then(function (res) { return res.json(); })
            .then(function (data) {
                alert(data.success ? 'Message Sent' : 'Error: ' + data.data);
            })
            .finally(function () {
                isSending = false;
                loader.style.display = 'none';
                text.style.display = 'inline';
            });
        };
    }
})();
