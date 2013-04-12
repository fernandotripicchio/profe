$(document).ready(function() {
    //setTimeout("ReloadPage()", 500000); 
    
    $("#datepickerDesde" ).datepicker({
                  changeMonth: true,
                  changeYear: true,
                  dateformat: 'dd/mm/yy',
                  firstDay: 1
    });
    $("#datepickerDesde" ).datepicker($.datepicker.regional['es']);
   
    
});