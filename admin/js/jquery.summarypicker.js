/*
 * Requires jquery ui
 */
 
 
(function($){
	var $calroot;

    function selectCurrentWeek() {
        window.setTimeout(function () {
            var t = $calroot.find('.ui-datepicker-current-day a');//.addClass('ui-state-active');
			t= t.closest('tr');
			t.find('td>a').addClass('ui-state-active');//.parent().addClass('ui-state-active');
        }, 1);
		
    }
	function onSelect(dateText, inst) { 
        var date = $(this).datepicker('getDate');


        startDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() +1);
        var sn = startDate.getDay();
		var sdays = new Array("Sun","Mon","Tue","Wen","Thi","Fri","Sat");


        endDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 6);
        var en = endDate.getDay();
		var edays = new Array("Sun","Mon","Tue","Wen","Thi","Fri","Sat");


        var dateFormat = inst.settings.dateFormat || $.datepicker._defaults.dateFormat;
		$calroot.trigger('weekselected',{
			start:startDate,
			end:endDate,
			weekOf:startDate
		});
        selectCurrentWeek();

        var str = $.datepicker.formatDate('mm/dd/yy', startDate);
        str = str + " " + sdays[sn];
		// alert(str);

        var etr = $.datepicker.formatDate('mm/dd/yy', endDate);
        etr = etr + " " + edays[en];
		// alert(etr);
		// var weekdatepick = str + " - " + etr;
		// alert(weekdatepick);
		// document.getElementById("weekpicks").value = weekdatepick;
		// var hiddenvalue = $.datepicker.formatDate('yy-mm-dd', startDate);
  //       document.getElementById("weeknum").value = hiddenvalue;
		// alert(hiddenvalue);



		var hiddenvalue1 = $.datepicker.formatDate('M-dd-yy', startDate);
        document.getElementById("weekstart").value = hiddenvalue1;
		var hiddenvalue2 = $.datepicker.formatDate('M-dd-yy', endDate);
        document.getElementById("weekend").value = hiddenvalue2;

        // document.getElementById("inputGroupSelect04").style.visibility = "visible";
        var element = document.getElementById("inputGroupSelect04");
     //    element.classList.remove("hidebutton");
   		// element.classList.add("showbutton");

   		document.getElementById("submit").click();
		
    }
	var reqOpt = {
		onSelect:onSelect,
		showOtherMonths: true,
        selectOtherMonths: true
	};
    $.fn.weekpicker = function(options){
		var $this = this;
		$calroot = $this;
		
		$this.datepicker(reqOpt);
		//events
		$dprow = $this.find('.ui-datepicker');
		
		$dprow.on('mousemove','tr', function() { 
			$(this).find('td a').addClass('ui-state-hover'); 
		});
		$dprow.on('mouseleave','tr', function() { 
			$(this).find('td a').removeClass('ui-state-hover'); 
		});
	};
})(jQuery);


