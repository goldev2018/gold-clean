  $("#slider-range").slider({
    range: true,
    min: 0,
    max: 1440,
    step: 01,
    values: [600, 720],
    slide: function (e, ui) {
        var hours1 = Math.floor(ui.values[0] / 60);
        var minutes1 = ui.values[0] - (hours1 * 60);

        if (hours1.length == 1) hours1 = '0' + hours1;
        if (minutes1.length == 1) minutes1 = '0' + minutes1;
        if (minutes1 == 0) minutes1 = '00';
        if (hours1 >= 12) {
            if (hours1 == 12) {
                hours1 = hours1;
                minutes1 = minutes1 + " PM";
            } else {
                hours1 = hours1 - 12;
                minutes1 = minutes1 + " PM";
            }
        } else {
            hours1 = hours1;
            minutes1 = minutes1 + " AM";
        }
        if (hours1 == 0) {
            hours1 = 12;
            minutes1 = minutes1;
        }



        $('.slider-time').html(hours1 + ':' + minutes1);
        var total1 = hours1 + ':' + minutes1;
        document.getElementById("from").value = total1;

        var hours2 = Math.floor(ui.values[1] / 60);
        var minutes2 = ui.values[1] - (hours2 * 60);

        if (hours2.length == 1) hours2 = '0' + hours2;
        if (minutes2.length == 1) minutes2 = '0' + minutes2;
        if (minutes2 == 0) minutes2 = '00';
        if (hours2 >= 12) {
            if (hours2 == 12) {
                hours2 = hours2;
                minutes2 = minutes2 + " PM";
            } else if (hours2 == 24) {
                hours2 = 11;
                minutes2 = "59 PM";
            } else {
                hours2 = hours2 - 12;
                minutes2 = minutes2 + " PM";
            }
        } else {
            hours2 = hours2;
            minutes2 = minutes2 + " AM";
        }

        $('.slider-time2').html(hours2 + ':' + minutes2);
        var total2 = hours2 + ':' + minutes2;
        document.getElementById("to").value = total2;

            // Converttimeformat();

    }
});

// ----get time difference


//   function Converttimeformat() {
// // var time = $("#starttime").val();
// var time = document.getElementById('from').value;
// var hrs = Number(time.match(/^(\d+)/)[1]);
// var mnts = Number(time.match(/:(\d+)/)[1]);
// var format = time.match(/\s(.*)$/)[1];
// if (format == "PM" && hrs < 12) hrs = hrs + 12;
// if (format == "AM" && hrs == 12) hrs = hrs - 12;
// var hours =hrs.toString();
// var minutes = mnts.toString();
// if (hrs < 10) hours = "0" + hours;
// if (mnts < 10) minutes = "0" + minutes;
// //alert(hours + ":" + minutes);

//  var date1 = new Date();
// date1.setHours(hours );
// date1.setMinutes(minutes);
// //alert(date1);

// var time = document.getElementById('to').value;
// var hrs = Number(time.match(/^(\d+)/)[1]);
// var mnts = Number(time.match(/:(\d+)/)[1]);
// var format = time.match(/\s(.*)$/)[1];
// if (format == "PM" && hrs < 12) hrs = hrs + 12;
// if (format == "AM" && hrs == 12) hrs = hrs - 12;
// var hours = hrs.toString();
// var minutes = mnts.toString();
// if (hrs < 10) hours = "0" + hours;
// if (mnts < 10) minutes = "0" + minutes;
// //alert(hours+ ":" + minutes);
// var date2 = new Date();
// date2.setHours(hours );
// date2.setMinutes(minutes);
// //alert(date2);

// var diff = date2.getTime() - date1.getTime();

// var hours = Math.floor(diff / (1000 * 60 * 60));
// diff -= hours * (1000 * 60 * 60);

// var mins = Math.floor(diff / (1000 * 60));
// diff -= mins * (1000 * 60);
// alert( hours + " hours : " + mins + " minutes : " );

// }


// ---- end get time difference