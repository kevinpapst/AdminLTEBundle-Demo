require('../vendor/kevinpapst/adminlte-bundle/Resources/assets/admin-lte');

// ------ for charts ------
const Chart = require('chart.js/dist/Chart.min');
global.Chart = Chart;

$(document).ready(
    function ()
    {
        $('[data-datepickerenable="on"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: "YYYY-MM-DD",
                firstDay: 1
            }
        });
    }
);
