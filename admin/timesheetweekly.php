<?php include 'includes/config.php';
 ?>
<script type="text/javascript">
  function insert_Row()
{
var x=document.getElementById('sampleTable').insertRow(2);
var tspname = x.insertCell(0);
var tsjcode = x.insertCell(1);
var tsdesc = x.insertCell(2);
var tsMon = x.insertCell(3);
var tsTue = x.insertCell(4);
var tsWed = x.insertCell(5);
var tsThu = x.insertCell(6);
var tsFri = x.insertCell(7);
var tsSat = x.insertCell(8);
var tsTot = x.insertCell(9);
tspname.innerHTML="<input type='text' name='tspname[]'>";
tsjcode.innerHTML="<input type='text' name='tsjcode[]'>";
tsdesc.innerHTML=" <textarea name='leavereason' rows='2' cols='50' required></textarea>";
tsMon.innerHTML="<input type='number' name='num' id='tsMon[]' size='3'  min='.01' max='5' onblur='findTotal()'>";
tsTue.innerHTML="<input type='number' name='num' id='tsTue[]' size='3'  min='.01' max='5' onblur='findTotal()'>";
tsWed.innerHTML="<input type='number' name='num' id='tsWed[]' size='3'  min='.01' max='5' onblur='findTotal()'>";
tsThu.innerHTML="<input type='number' name='num' id='tsThu[]' size='3'  min='.01' max='5' onblur='findTotal()'>";
tsFri.innerHTML="<input type='number' name='num' id='tsFri[]' size='3'  min='.01' max='5' onblur='findTotal()'>";
tsSat.innerHTML="<input type='number' name='num' id='tsSat[]' size='3'  min='.01' max='5' onblur='findTotal()'>";
tsTot.innerHTML="";
}
</script>


<!-- datepicker -->
<?php include("timesheetold.php"); ?>
<!-- datepicker -->

<input type="button" onclick="insert_Row()" value="Add row">
<br><br>
<p>Name: <?php echo $sessfname." ".$sesslname; ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Week Start: <input type="text" name="weekstart" id="weekstart" size="20" required data-readonly ><br />Position: <?php echo $sessposition?>&emsp;&emsp; Week End:  <input type="text" name="weekend" id="weekend" size="20" required data-readonly ></p>
<p>&nbsp;</p>
<table style="height: 29px; width: 1017px;" border="1" id="sampleTable">
<tbody>
<tr style="height: 29px;">
<td style="width: 131px; text-align: center; height: 29px;" rowspan="2">
<p>Project Name</p>
</td>
<td style="width: 151px; text-align: center; height: 29px;" rowspan="2">Job Code<br />Job ID Phase ID</td>
<td style="width: 492px; text-align: center; height: 29px;" rowspan="2">
<p>Description</p>
</td>
<td style="width: 223px; text-align: center; height: 29px;" colspan="7"><p>Working Hours</p>
<!-- <table style="height: 21px; width: 357px; margin-left: auto; margin-right: auto;" border="1">
<tbody>
<tr style="height: 13px;">

</tr>
</tbody>
</table> -->
</td>
</tr>
<!-- <tr></tr>
<tr></tr> -->
<tr>
<td style="width: 44px; height: 13px;">Mon</td>
<td style="width: 42px; height: 13px;">Tue</td>
<td style="width: 45px; height: 13px;">Wed</td>
<td style="width: 44px; height: 13px;">Thu</td>
<td style="width: 40px; height: 13px;">Fri</td>
<td style="width: 43px; height: 13px;">Sat</td>
<td style="width: 53px; height: 13px;">Total</td>

</tr>

<!-- <script>
        var mon = 0;
        var tue = 0;
        var wed = 0;
        var thu = 0;
        var fri = 0;
        var sat = 0;
        var tot = 0;
        function calc(obj) {
            
            mon = Number(document.getElementById('mon').value);
            tue = Number(document.getElementById('tue').value);
            wed = Number(document.getElementById('wed').value);
            thu = Number(document.getElementById('thu').value);
            fri = Number(document.getElementById('fri').value);
            sat = Number(document.getElementById('sat').value);
            tot = mon + tue + wed + thu + fri + sat;
            document.getElementById('total').value = tot;
            document.getElementById('update').innerHTML = tot;
        }

    </script> -->

        <script type="text/javascript">
function findTotal(){
    var arr = document.getElementsByName('num');
    var tot=0;
    var qwe=0;
    for(var i=0;i<arr.length;i++){
        if(parseFloat(arr[i].value))
            tot += parseFloat(arr[i].value);

    }

    document.getElementById('total').value = tot;
}
</script>

<tr>
<td></td>
<td></td>
<td></td>
<td style="width: 44px; height: 13px;"></td>
<td style="width: 42px; height: 13px;"></td>
<td style="width: 45px; height: 13px;"></td>
<td style="width: 44px; height: 13px;"></td>
<td style="width: 40px; height: 13px;"></td>
<td style="width: 43px; height: 13px;"></td>
<td style="width: 20px; height: 13px;"><input type="text" id="total" name="total" value="0" required data-readonly  size="2" /></td>
</tr>





</tbody>
</table>
<p>&nbsp;</p>
<!-- <p>Employee Signature: ___________________________________ Date: ________________________</p>
<p>Manager Approved: ____________________________________ Date: ________________________</p> -->

<?php 

// echo(round(9.6, 0, PHP_ROUND_HALF_DOWN));

 ?>