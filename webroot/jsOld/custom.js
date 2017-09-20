$(function () {
    $('input[name="date_from"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });

    $('input[name="date_from"]').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    });

    $('input[name="date_from"]').on('cancel.daterangepicker', function (ev, picker) {
        $(this).val('');
    });
    $('input#date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'YYYY-MM-DD'
        }
    });
    
});
$(document).ready(function () {
    $('#ending-reding, #starting-reding,#number-of-animals,#rupees-per-kilometer,#number-of-kilometers').blur(updateValue);
    $("#date").datepicker({dateFormat: 'Y-m-d'});

    $(document).on('change', '#district', function () {
        if ($(' option:selected', this).val() != '') {
            $('#pincode').val($(' option:selected', this).data('pincode'));
            $('#rupees-per-kilometer').val($(' option:selected', this).data('rate'));
        }
    });
    function updateValue() {
        var starting_reding = Number($('#starting-reding').val()) != '' ? Number($('#starting-reding').val()) : 0;
        var ending_reding = Number($('#ending-reding').val()) != '' ? Number($('#ending-reding').val()) : 0;
        var no_of_km = Number($('#number-of-kilometers').val()) != '' ? Number($('#number-of-kilometers').val()) : 0;
        var no_of_animal = Number($('#number-of-animals').val()) != '' ? Number($('#number-of-animals').val()) : 0;
        var rs_per_km = Number($('#rupees-per-kilometer').val()) != '' ? Number($('#rupees-per-kilometer').val()) : 0;
        if ((starting_reding > 0 && ending_reding > 0 && no_of_km > 0) || (starting_reding > 0 && ending_reding > 0)) {
            var no_of_km_value = (Number(ending_reding) - Number(starting_reding)).toFixed();
            var ending_reding_value = ending_reding;
            var starting_reding_value = starting_reding;
        } else if (starting_reding > 0 && no_of_km > 0) {
            var ending_reding_value = (Number(no_of_km) + Number(starting_reding)).toFixed();
            var no_of_km_value = no_of_km;
            var starting_reding_value = starting_reding;
        } else if (ending_reding > 0 && no_of_km > 0) {
            var ending_reding_value = ending_reding;
            var no_of_km_value = no_of_km;
            var starting_reding_value = (Number(ending_reding_value) - Number(no_of_km_value)).toFixed();
        } else {
            var ending_reding_value = ending_reding;
            var starting_reding_value = starting_reding;
            var no_of_km_value = no_of_km;
        }
        //console.log(no_of_km_value);
        var total_amount = (Number(no_of_km) * Number(no_of_animal) * Number(rs_per_km)).toFixed();
        $('#number-of-kilometers').val(no_of_km_value);
        $('#ending-reding').val(ending_reding_value);
        $('#starting-reding').val(starting_reding_value);
        $('#total-amount').val(total_amount);
    }
    
    $(document).on('click','.change-status',function(){
        var id=$(this).attr('data-id');
        $.ajax({
            url: WEBROOT_URL + "admin/admin-ajax/updateStatus",
            data: {id:id},
            type: 'post',
            dataType: 'json',
            beforeSend:function(){ $("#ajaxLoader").show(); },
            complete:function(){ $("#ajaxLoader").hide(); },
            success: function (response) {
                if (response != undefined && response != null && response['success'] != undefined) {
                    if(response['success']==1){
                        $('#change-status-'+id).text(response['data']);
                        var msg='<div class="message success" onclick="this.classList.add('+"'hidden'"+')">Status has been saved successfully.</div>';
                        $('.message').remove();
                        $('.invoiceDatas').find('h3').before().append(msg);
                    }
                }
            }
        });
    });
});