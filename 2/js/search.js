/**
 * @author nam phan
 * @company Reliable{coders}
 */
// The root URL for the RESTful services
var rootURL = "http://localhost:63342/ResumeUploaderWeb/rest/Web";

findAll();



$(document).ready(function() {
	$('#searchBt').click(function() {

		var searchKey = $("#searchValue").val();

		$('html, body').css("cursor", "wait");
		$.ajax({
			type : "GET",
			url : rootURL + "/Search:" + searchKey,
			dataType : "json",
			cache : false,
			success : renderList
		});

		$("#searchValue").focus();
		$('html, body').css("cursor", "auto");

		return false;
	});
});

function findAll() {
	console.log('findAll');
	$.ajax({
		type: 'GET',
		url: rootURL + "/GetAllResumes",
		dataType: "json", // data type of response
		success: renderList
	});
}



function renderList(data) {
	
	// JAX-RS serializes an empty list as null, and a 'collection of one' as an object (not an 'array of one')
	var result = "No Result";
	$('html, body').css("cursor", "wait");
	$.each(data, function(index, element) {
    	result += "<tr>"
		+ "<td>" + element.res_id +"</td>" 
		+ "<td>" + element.firstName +"</td>" 
		+ "<td>" + element.lastName +"</td>" 
		+ "<td>" + element.email +"</td>" 
		+ "<td>" + element.phone +"</td>"
		+ "<td>" + element.skills +"</td>"
		+ "<td>" + element.description +"</td>"
		+ "<td>" + element.res_URL +"</td>"
		+ "</tr>";
    	
//    	if(index >= 9)
//    		{
//    			
//    			return false;
//    		}
    });
	result += "<tr><td class=\"pager\"><li class=\"previous disabled\"><a href=\"#\">&larr; Older</a></li></td>" +
	"<td class=\"pager\"><li class=\"next disabled\"><a href=\"#\">Newer &rarr;</a></li></td></tr>";
	       $('#result').html(result);
	       $("#searchValue").focus();
	       $('html, body').css("cursor", "auto");
}
