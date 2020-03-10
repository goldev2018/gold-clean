<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>


<input type="time" name="start" id="start" onchange="calculateTime()">
<input type="time" name="stop" id="stop" onchange="calculateTime()">
<input type="text" name="estimate" id="estimate" disabled="">

<script>
  function calculateTime() {
  // Declare the variables
var valuestart = document.getElementById("start").value,
    valuestop = document.getElementById("stop").value;

/* I left it the same as you had it */
var timeStart = new Date("01/01/2010 " + valuestart),
    timeEnd = new Date("01/01/2010 " + valuestop);


/* Determine the value of the variable via a conditional ternary operator */
var hourDiff = (((timeEnd.getHours() - timeStart.getHours()) > 0) ?
               (timeEnd - timeStart) / 3600000 + " Hours" :
               (((timeEnd.getMinutes() - timeStart.getMinutes()) > 0) ?
               (timeEnd.getMinutes() - timeStart.getMinutes()) + " Minutes" :
               (timeEnd.getSeconds() - timeStart.getSeconds()) + " Seconds"));

/* Alternatively, you can do this with an If/Else if/Else statement */
if ((timeEnd.getHours() - timeStart.getHours()) > 0) {
    hourDiff = (timeEnd - timeStart) / 3600000 + " Hours";  // 1 Hour = 3.6 * 10^6 ms
}
else if ((timeEnd.getMinutes() - timeStart.getMinutes()) > 0) {
    hourDiff = (timeEnd.getMinutes() - timeStart.getMinutes()) + " Minutes";
}
else {
    hourDiff = (timeEnd.getSeconds() - timeStart.getSeconds()) + " Seconds";
}


// Output the result
document.getElementById("estimate").value = hourDiff; /* I left the ID the same */
}
</script>