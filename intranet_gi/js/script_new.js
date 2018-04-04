// JavaScript Document

$(document).ready(function(){
	
//Checking current date YYMMDD =>> WORKS!
	
	//DATE
	var d = new Date();
	
	//MONTH
	var m = d.getMonth()+1;
	//var month = (m<10 ? '0' : '') + m; //month MM
	var month = '05';
	
	//DAY
	var da = d.getDate();
	//var day = (da<10 ? '0' : '') + da; //day DD
	var day = '01';
	
	//YEAR
	//var fullyear = d.getFullYear(); //year YYYY
	var fullyear = '2019';
	var year = fullyear.toString().substr(2,2); //year YY
	
	//DATE FOR CHECKING & PRINTING
	var output = year + month + day;
	var date = fullyear + '-' + month + '-' + day;
	
	function swapMonth(m){
		switch(m){
			case "01":
				m = "January";
				break;
			case "02":
				m = "February";
				break;
			case "03":
				m = "March";
				break;
			case "04":
				m = "April";
				break;
			case "05":
				m = "May";
				break;
			case "06":
				m = "June";
				break;
			case "07":
				month = "July";
				break;
			case "08":
				m = "August";
				break;
			case "09":
				m = "September";
				break;
			case "10":
				m = "October";
				break;
			case "11":
				m = "November";
				break;
			case "12":
				m = "December";
				break;
			}

			return m;
    }
	
	function writingToFile(){
		//var filepath = 'http://localhost/gi/files/test.html';
		//alert(filepath);
		//var filepath = 'C:/xampp/htdocs/gi/files/test.html';
		//filepath = $.twFile.convertUriToLocalPath(filepath);
		//alert(filepath+" 2nd");
		var content = $('#free').html();
		alert(content);
		//$.twFile.save(filepath, content);
		
		
	}
	
	var urllink = 'http://localhost/gi/files/free/Free'+output+'.pdf';
	var urllinkF = 'http://localhost/gi/files/free/Free'+output+'F.pdf';
	
	//Checking if a file exists in a folder =>> WORKS!
	$.ajax({
			url: urllink,
			type:'HEAD',
			error: function(){
			//file not exists
				alert('File does not exist!');
			},
			success: function(){
			//file exists
				alert('There are new reports!');
				
				
			//Passing variables to PHP
				function(e){
    				e.preventDefault();
    				$.post("yourscript.php", { 
						txtlink: output;
						urllink: urllink;
					}, function(data){
						var theResult = data;
					}, 'json' );
				});
			
			//inserting new year
				if($("#free" + fullyear).length === 0) {
				$("#free").prepend("<details id=free"+fullyear+" open><summary class='padding-year'><strong>"+fullyear+"</strong></summary><details class='open'><summary class='padding-month'>"+swapMonth(month)+"</summary><ul id=free"+fullyear+"-"+month+"><li id='free"+date+"'><a href='"+urllink+"'"+" target='_blank'>"+date+"</a></li></ul></details></details>");
				}
				//inserting new month
				else if($("#free" + fullyear).length !== 0 && $("#free"+fullyear+"-"+month).length === 0){
				$("#free"+fullyear).prepend("<details class='open'><summary class='padding-month'>"+swapMonth(month)+"</summary><ul id='free"+fullyear+"-"+month+"'><li id='free"+date+"'><a href='"+urllink+"'"+" target='_blank'>"+date+"</a></li></ul></details>");
				} 
				//inserting new day
				else if($("#free" + fullyear).length !== 0 && $("#free"+fullyear+"-"+month).length !== 0 && $("#free"+date).length === 0) { // && DAY === 0 ??
				$("#free"+fullyear+"-"+month).prepend("<li id='free"+date+"'><a href='"+urllink+"'"+" target='_blank'>"+date+"</a></li>");
				}
				
				writingToFile();
				
			}
		
	});
	
	//Checking if a Foreløbig file exists in a folder =>> WORKS!
	$.ajax({
			url: urllinkF,
			type:'HEAD',
			error: function(){
			//file not exists
				alert('F File does not exist!');
			},
			success: function(){
			//file exists
				alert('There are new F reports!');
			
			//inserting new year
				if($("#free" + fullyear).length === 0) {
				$("#free").prepend("<details id=free"+fullyear+" open><summary class='padding-year'><strong>"+fullyear+"</strong></summary><details open><summary class='padding-month'>"+swapMonth(month)+"</summary><ul id=free"+fullyear+"-"+month+"><li id='free"+date+"'><a href='"+urllinkF+"'"+" target='_blank'>"+date+", Foreløbig</a></li></ul></details><br></details>");
				}
				//inserting new month
				else if($("#free" + fullyear).length !== 0 && $("#free"+fullyear+"-"+month).length === 0){
				$("#free"+fullyear).prepend("<details open=''><summary class='padding-month'>"+swapMonth(month)+"</summary><ul id='free"+fullyear+"-"+month+"'><li id='free"+date+"'><a href='"+urllinkF+"'"+" target='_blank'>"+date+", Foreløbig</a></li></ul></details>");
				} 
				//inserting new day
				else if($("#free" + fullyear).length !== 0 && $("#free"+fullyear+"-"+month).length !== 0 && $("#free"+date).length === 0) {
				$("#free"+fullyear+"-"+month).prepend("<li id='free"+date+"'><a href='"+urllinkF+"'"+" target='_blank'>"+date+", Foreløbig</a></li>");
				}
				
				writingToFile();

			}
		
	});
	

	
	
	
	//Saving a new version of free_auto.php, ovewriting the current one
	
	
	//var filepath = document.location.href; // Get the current file
	
	//filepath = $.twFile.convertUriToLocalPath(filepath); // Convert the path to a readable format
	//
	// Reload the file
	//function() {
		//window.location.reload();
	//});
	
	
	
	//var content = $(document).html();
	//content.Headers.Add("Content-Disposition", "attachment; filename=test.html");
	//var html = $("free").html();
	//$("#myTextarea")
    //     .val(html)
    //     .parents("form")
    //     .submit();
	
});

