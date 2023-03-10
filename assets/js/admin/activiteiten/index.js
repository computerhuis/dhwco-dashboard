'use strict';

$(document).ready(function () {
    $('#activiteiten-tabel').DataTable({
        processing: true,
        ajax: function (d, cb) {
            fetch('./api/admin/activiteiten.php')
                .then(response => response.json())
                .then(data => cb(data));
        },
        language: {
            url: './assets/js/datatable/nl-NL.json'
        },
        columns: [
            {data: 'nr'},
            {data: 'naam'},
            {
                data: 'rapportage',
                render: function (data, type) {
                    if (data === null || data === false) {
                        return '<i class="bi bi-square"></i>';
                    }

                    return '<i class="bi bi-check2-square"></i>';
                }
            },
            {
                data: 'actief_vanaf',
                render: function (data, type) {
                    if (data === null) {
                        return null;
                    }
                    return new Date(data).toLocaleDateString();
                }
            },
            {
                data: 'actief_tot',
                render: function (data, type) {
                    if (data === null) {
                        return null;
                    }
                    return new Date(data).toLocaleDateString();
                }
            }
        ]
    });
});
