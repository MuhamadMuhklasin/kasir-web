$(function () {
    // set limit value for input
    if($(".limit-value").length > 0) {
       let container = $(".limit-value");
       let limit = Number(container.attr("data-limit"));

       let elLimit = "";
       elLimit += "<div class='pull-right'><p class='limit-indicator'>0 / "+limit+"</p></div>";
       elLimit += "<div class='clearfix'></div>";

       container.append(elLimit);  
        
       container.find(":input").keyup(function(e){
        $(this).attr("maxlength", limit);
        $(".limit-indicator").text($(this).val().length+" / "+limit);
       })
    }


    //Textarea auto growth
    autosize($('textarea.auto-growth'));

    //Datetimepicker plugin
    $('.datetimepicker').bootstrapMaterialDatePicker({
        format: 'dddd DD MMMM YYYY - HH:mm',
        clearButton: true,
        weekStart: 1
    });

    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'dddd DD MMMM YYYY',
        clearButton: true,
        weekStart: 1,
        time: false
    });

    $('.timepicker').bootstrapMaterialDatePicker({
        format: 'HH:mm',
        clearButton: true,
        date: false
    });

    //Bootstrap datepicker plugin
    $('#bs_datepicker_container input').datepicker({
        autoclose: true,
        container: '#bs_datepicker_container'
    });

    $('#bs_datepicker_component_container').datepicker({
        autoclose: true,
        container: '#bs_datepicker_component_container'
    });
    //
    $('#bs_datepicker_range_container').datepicker({
        autoclose: true,
        container: '#bs_datepicker_range_container'
    });
});