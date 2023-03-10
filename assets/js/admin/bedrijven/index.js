'use strict';

$(document).ready(function () {
    $('#bedrijven-tabel').DataTable({
        processing: true,
        ajax: function (d, cb) {
            fetch('./api/admin/bedrijven.php')
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
                    return '<a href="./admin/bedrijven/bedrijf.php?id=' + data + '">' + data + '</a>';
                }
            },
            {data: 'naam'},
            {
                data: 'email',
                render: function (data, type) {
                    if (data === null) {
                        return null;
                    }
                    return '<a href="mailto:' + data + '">' + data + '</a>';
                }
            },
            {
                data: 'postcode',
                render: function (data, type) {
                    if (data === null) {
                        return null;
                    }
                    return '<a target="_blank" href="https://postcodebijadres.nl/' + data + '">' + data + '</a>';
                }
            },
            {
                data: 'inschrijf_datum',
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
