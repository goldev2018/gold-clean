<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
Date: <input type="text" id="datepicker" placeholder="mm/dd/Y">

<script type="text/javascript">
  $(function() {

//   $('#datepicker').datepicker({
//     onSelect: function(dateText, inst) { 
//         window.location = 'http://mysite/events/Pages/default.aspx?dt=' + dateText;
//     }
// });

    $("#datepicker").datepicker({
        firstDay: 0,
        beforeShowDay: function (date) {

            var sunday = new Date();
            sunday.setHours(0,0,0,0);

            var d = new Date();
            var n = d.getDay();
            
            sunday.setDate(sunday.getDate() - (sunday.getDay() || 1));
            var saturday = new Date(sunday.getTime());
            
            saturday.setDate(sunday.getDate() + n);

            
            if (date > sunday && date <= saturday) {
              return [true, ''];
            }
            else {
              return [false, ''];
            }
        },
        onSelect: function(dateText, inst) { 
                window.location = 'forms.php?id=timesheetdaily&date=' + dateText;
            }
    });
});

  $(document).ready(function(){
        $('#datepicker').datepicker('show');
     });
</script>
