'use strict';

$(document).ready(function () {
    $('#computers-tabel').DataTable({
        processing: true,
        ajax: function (d, cb) {
            fetch('./api/admin/computers.php')
                .then(response => response.json())
                .then(data => cb(data));
        },
        language: {
            url: './assets/js/datatable/nl-NL.json'
        },
        columns: [
            {
                data: 'nr',
                render: function (data, type) {
                    if (data === null) {
                        return null;
                    }
                    return '<a href="./admin/computers/computer.php?id=' + data + '">' + data + '</a>';
                }
            },
            {data: 'fabrikant'},
            {data: 'model'},
            {data: 'type'},
            {
                data: 'inboek_datum',
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
