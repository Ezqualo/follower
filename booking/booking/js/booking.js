// JavaScript Document
$(function(){
	
	function load_kalender(){
		var dp = new DayPilot.Scheduler("dp");
		dp.heightSpec = "Fixed";
  		dp.height = 400
		
		dp.allowEventOverlap = false;
		dp.days = dp.startDate.daysInMonth();
        loadTimeline(DayPilot.Date.today().firstDayOfMonth());
        dp.eventDeleteHandling = "Update";
		dp.timeHeaders = [
           { groupBy: "Month", format: "MMMM yyyy" },
           { groupBy: "Day", format: "d" }
        ];
		dp.eventHeight = 50;
        dp.bubble = new DayPilot.Bubble({});
			
		dp.rowHeaderColumns = [
           {title: "Kamar", width: 150}
        ];
		
		dp.onBeforeResHeaderRender = function(args) {
				 		 
		}
		
		dp.onBeforeCellRender = function(args) {
        	var dayOfWeek = args.cell.start.getDayOfWeek();
            if (dayOfWeek === 6 || dayOfWeek === 0) {
                args.cell.backColor = "#f8f8f8";
             }
       	};
			  
		dp.onBeforeEventRender = function(args) {
			var start = new DayPilot.Date(args.e.start);
            var end = new DayPilot.Date(args.e.end);
                        
            var today = new DayPilot.Date().getDatePart();
			
			args.e.html = args.e.text;
			switch (args.e.status) {
				case "0":
					var in2days = today.addDays(1);
                    if (start.getTime() < in2days.getTime()) {
                    	args.e.barColor = 'red';
                        args.e.toolTip = 'Melewati batas waktu reservasi';
                    }else {
                        args.e.barColor = 'orange';
                        args.e.toolTip = 'Reservasi';
                    }
				break;
				
				case "1":
					var arrivalDeadline = today.addHours(18);
					args.e.barColor = "green";
                    args.e.toolTip = "Check IN";
				break;
				
				case "2":
					args.e.barColor = "gray";
                    args.e.toolTip = "Checked OUT";
				break;
				
				default:
					args.e.toolTip = "";
                break;
			}
			args.e.html = args.e.html + "<br /><span style='color:gray'>" + args.e.toolTip + "</span>";
			  
		}
		
		dp.onTimeRangeSelected = function (args) {
			//console.log(args);
			var tgl_in=document.getElementById('txt-tanggal-in');
			var tgl_out=document.getElementById('txt-tanggal-out');
			var kamar=document.getElementById('txt-id-kamar');
			var nama=document.getElementById('txt-nama');
			var harga=document.getElementById('txt-harga');
			var lama=document.getElementById('txt-lama');
			var btn=document.getElementById('btn-simpan');
			var btn_in=document.getElementById('btn-checkin');
			var btn_out=document.getElementById('btn-checkout');
			
			tgl_in.value=args.start.value;
			tgl_out.value=args.end.value;
			kamar.value=args.resource;
			nama.value='';
			btn.value='';
			btn_in.value='';
			btn_out.value='';
			
			btn_in.style.visibility='hidden';
			btn_out.style.visibility='hidden';
			//get harga kamar
			//hit lama inap
			var urlToPass="action=load_harga&tgl_in="+tgl_in.value+'&tgl_out='+tgl_out.value+'&id_kamar='+kamar.value;
			$.ajax({
				url:'proses/ac_reservasi.php',
				type:'POST',
				data:urlToPass,
				dataType:'text',
				success:function(responseText){
					var result=JSON.parse(responseText);
					if(result.success==true){
						harga.value=result.harga;
						lama.value=result.lama;
						$('#md-reservasi').modal('show');
					}
				}
			});
				
		}
		
		dp.onEventResized = function (args) {
         	$.post("proses/ac_reservasi.php",{
				action:'ubah',
                id: args.e.id(),
                newStart: args.newStart.toString(),
                newEnd: args.newEnd.toString()
            }, 
            function() {
				window.location.reload();
                           // dp.message("Resized.");
            });
        };
		
		dp.init();
		
		function loadTimeline(date) {
        	 dp.scale = "Manual";
             dp.timeline = [];
             var start = date.getDatePart().addHours(12);
            for (var i = 0; i < dp.days; i++) {
            	dp.timeline.push({start: start.addDays(i), end: start.addDays(i+1)});
            }
            dp.update();
      	}
		
		function loadResources() {
			var tipe=document.getElementById('cmb-tipe');
            $.post("proses/backend_kamar.php",{ 
				capacity: $("#filter").val() ,tipe:tipe.value},
                function(data) {
                     dp.resources = data;
                     dp.update();
                });
        }
		loadResources();
		
		 
			
		$('body').delegate('#timerange','change',function(){
				switch (this.value) {
                      case "week":
                           dp.days = 7;
                      break;
                      case "2weeks":
                           dp.days = 14;
                      break;
                      case "month":
                           dp.days = dp.startDate.daysInMonth();
                      break;
                      case "2months":
                           dp.days = dp.startDate.daysInMonth() + dp.startDate.addMonths(1).daysInMonth();
                      break;
                 }
                 loadTimeline(new DayPilot.Date().firstDayOfMonth());
                 loadEvents();
		});
		
		$('body').delegate('#autocellwidth','click',function(){
			dp.cellWidth = 80;  // reset for "Fixed" mode
            dp.cellWidthSpec = $(this).is(":checked") ? "Auto" : "Fixed";
           	dp.update();
		});
		
		
		<!----- event------>
		function loadEvents() {
             var start = dp.startDate;
             var end = dp.startDate.addDays(dp.days);

             $.post("proses/backend_reservasi.php",{
                    start: start.toString(),
                    end: end.toString()
             },
             function(data) {
					 // console.log(data);
                 dp.events.list = data;
                 dp.update();
              });
        }
		loadEvents();
			 
		var picker = new DayPilot.DatePicker({
            target: 'start', 
            pattern: 'M/d/yyyy', 
            date: new DayPilot.Date().firstDayOfMonth(),
               
       });
	
	
	
		$('body').delegate('#btn-simpan','click',function(){
			var tgl_in=document.getElementById('txt-tanggal-in');
			var tgl_out=document.getElementById('txt-tanggal-out');
			var id_kamar=document.getElementById('txt-id-kamar');
			var nama=document.getElementById('txt-nama');
			var harga=document.getElementById('txt-harga');
			var btn=document.getElementById('btn-simpan');
			
			var urlToPass='action=simpan&tgl_in='+tgl_in.value+'&tgl_out='+tgl_out.value+'&id_kamar='+id_kamar.value+'&nama='+nama.value+'&harga='+harga.value+'&id='+btn.value;
			$.ajax({
				url:'proses/ac_reservasi.php',
				type:'POST',
				data:urlToPass,
				dataType:'text',
				success:function(responseText){
					var result=JSON.parse(responseText);
					if(result.success==true){
						loadEvents();
					}
				}
			});
		});
		
		
		
		$('#start').on('DOMSubtreeModified',function(){
			
			if(this.innerHTML){
				var newTgl=new DayPilot.Date(new Date(this.innerHTML));
				//console.log(newTgl);
				dp.startDate = newTgl;
            	loadTimeline(newTgl);
            	loadEvents();
			}
		});
		
		
		$('body').delegate('#cmb-tipe','change',function(){
			loadResources();
		});
		
		dp.onEventDeleted = function(args) {
        	$.post("proses/ac_reservasi.php", {
				action:'hapus',
                id: args.e.id()
            }, 
            function() {
                    //dp.message("Deleted.");
					window.location.reload();
             });
         };
		
		dp.onEventClick = function(args) {
			var tgl_in=document.getElementById('txt-tanggal-in');
			var tgl_out=document.getElementById('txt-tanggal-out');
			var id_kamar=document.getElementById('txt-id-kamar');
			var nama=document.getElementById('txt-nama');
			var harga=document.getElementById('txt-harga');
			var lama=document.getElementById('txt-lama');
			var btn=document.getElementById('btn-simpan');
			var btn_in=document.getElementById('btn-checkin');
			var btn_out=document.getElementById('btn-checkout');
			
			btn.style.visibility="visible";
			if(args.e.data.status=="0"){
				btn_in.style.visibility='visible';
				btn_out.style.display='none';
			}else if(args.e.data.status=="1"){
				btn_in.style.visibility='hidden';
				btn_out.style.visibility='visible';
			}else{
				btn_in.style.visibility='hidden';
				btn_out.style.visibility='hidden';
				btn.style.visibility="hidden";
				
			}
			
			
			//console.log(args.e.data);
			nama.value=args.e.data.text;
			harga.value=args.e.data.harga;
			lama.value=args.e.data.lama;
			btn_in.value=args.e.data.id;
			btn_out.value=args.e.data.id;
			
			$('#md-reservasi').modal('show');
				
		};
		
		dp.onEventMoved = function (args) {
        	$.post("proses/ac_reservasi.php",{
				action:'pindah',
            	id: args.e.id(),
                newStart: args.newStart.toString(),
                newEnd: args.newEnd.toString(),
               	newResource: args.newResource
            }, 
            function(data) {
                 //dp.message(data.message);
				 window.location.reload();
            });
        };
		
		$('body').delegate('#btn-checkin','click',function(){
			var urlToPass='action=checkin&id='+this.value;
			$.ajax({
				url:'proses/ac_reservasi.php',
				type:'POST',
				data:urlToPass,
				dataType:'text',
				success:function(responseText){
					var result=JSON.parse(responseText);
					if(result.success==true){
						loadEvents();
						window.location.reload();
					}	
				}
			});
		});
		
		$('body').delegate('#btn-checkout','click',function(){
			var urlToPass='action=checkout&id='+this.value;
			$.ajax({
				url:'proses/ac_reservasi.php',
				type:'POST',
				data:urlToPass,
				dataType:'text',
				success:function(responseText){
					var result=JSON.parse(responseText);
					if(result.success==true){
						loadEvents();
						window.location.reload();
					}	
				}
			});
		});
	}<!--- end load kalender -->
	
	load_kalender();
	
});

var picker = new DayPilot.DatePicker({
                            target: 'start', 
                            pattern: 'M/d/yyyy', 
                            date: new DayPilot.Date().firstDayOfMonth(),
                            onTimeRangeSelected: function(args) { 
                                //dp.startDate = args.start;
                                //loadTimeline(args.start);
                                //loadEvents();
                            }
                        });