'use strict';

$(document).ready(function () {
    $('#tijdregistraties-tabel').DataTable({
        processing: true,
        ajax: function (d, cb) {
            fetch('./api/admin/tijdregistraties.php')
                .then(response => response.json())
                .then(data => cb(data));
        },
        language: {
            url: './assets/js/datatable/nl-NL.json'
        },
        columns: [
            {
                data: 'datum',
                render: function (data, type) {
                    if (data === null) {
                        return null;
                    }
                    return new Date(data).toLocaleDateString();
                }
            },
            {
                data: 'vertrokken',
                render: function (data, type) {
                    if (data === null) {
                        return null;
                    }
                    return new Date(data).toLocaleDateString();
                }
            },
            {data: 'voornaam'},
            {data: 'tussenvoegsels'},
            {data: 'achternaam'},
            {data: 'activiteit'}
        ]
    });
});
