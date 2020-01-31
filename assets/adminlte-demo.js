require('../vendor/kevinpapst/adminlte-bundle/Resources/assets/admin-lte');

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
