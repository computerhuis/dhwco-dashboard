'use strict';

$(document).ready(function () {
    $('#postcodes-tabel').DataTable({
        processing: true,
        ajax: function (d, cb) {
            fetch('./api/admin/postcodes.php')
                .then(response => response.json())
                .then(data => cb(data));
        },
        language: {
            url: './assets/js/datatable/nl-NL.json'
        },
        columns: [
            {
                data: 'code',
                render: function (data, type, row) {
                    console.log(type)
                    if (data === null) {
                        return null;
                    }
                    return '<a target="_blank" href="' + row['url'] + '">' + data + '</a>';
                }
            },
            {data: 'huisnummer_min'},
            {data: 'huisnummer_max'},
            {data: 'straat'},
            {data: 'buurt'},
            {data: 'wijk'},
            {data: 'plaats'},
            {data: 'provincie'}
        ]
    });
});
