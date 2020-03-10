// simple picker date hired
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
// end simple picker date hired

// datepicker from to

  $( function() {
    var dateFormat = "mm/dd/yy",
      fromdate = $( "#fromdate" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1,
          beforeShowDay: nonWorkingDates
        })
        .on( "change", function() {
          ftodate.datepicker( "option", "minDate", getDate( this ) );
        }),
      ftodate = $( "#ftodate" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        beforeShowDay: nonWorkingDates
      })
      .on( "change", function() {
        fromdate.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );


      function nonWorkingDates(date){
        var day = date.getDay(), Sunday = 0, Monday = 1, Tuesday = 2, Wednesday = 3, Thursday = 4, Friday = 5, Saturday = 6;
        // var closedDates = [[7, 29, 2009], [8, 25, 2010]];
        var closedDays = [[Sunday]];
        for (var i = 0; i < closedDays.length; i++) {
            if (day == closedDays[i][0]) {
                return [false];
            }

        }

        // for (i = 0; i < closedDates.length; i++) {
        //     if (date.getMonth() == closedDates[i][0] - 1 &&
        //     date.getDate() == closedDates[i][1] &&
        //     date.getFullYear() == closedDates[i][2]) {
        //         return [false];
        //     }
        // }

        return [true];
    }
// end datepicker from to


// daterangpicker
  $('input[name="datetimes"]').daterangepicker({
    timePicker: true,
    minDate: 0,
    startDate: moment().startOf('hour'),
    endDate: moment().startOf('hour').add(24, 'hour'),
    locale: {
      format: 'M/DD/Y hh:mm A'
    }
  });
// end daterangpicker