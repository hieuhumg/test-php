/*
Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
*/
$(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
            $filters = $panel.find('.filters input'),
            $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });


    // $('.date').hide();
    // $('#btn').click(function () {
    //     $('.date').show(300);
    // })
    $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
    $( "#datepicker2" ).datepicker({ dateFormat: 'dd-mm-yy' });
    $( "#datepicker" ).datepicker();
    $( "#datepicker2" ).datepicker();
    $.datepicker.parseDate( "yy-mm-dd", "2007-01-26" );
});