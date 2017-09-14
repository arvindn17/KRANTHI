/*$(function() {
            $('.fdate').datetimepicker({format: 'YYYY-MM-DD', maxDate: new Date, pickTime: false}).off('focus')
                .click(function () {
                    $(this).data("DateTimePicker").show();
                });
            $('.edate').datetimepicker({format: 'YYYY-MM-DD', maxDate: new Date, pickTime: false}).off('focus')
                .click(function () {
                    $(this).data("DateTimePicker").show();
                });
            $(".fdate").on("dp.change", function (e) {
                $('.edate').data("DateTimePicker").setMinDate(e.date);
            });
            $(".edate").on("dp.change", function (e) {
                $('.fdate').data("DateTimePicker").setMaxDate(e.date);
            });
        });
        */
       
       $(function() {
    $('input[name="date_from"]').daterangepicker();
});