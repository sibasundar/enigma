$(document).ready(function () {
$('.selectpicker').selectpicker('val','');
	$('.selectpicker').change(function () {
		$.post('search_college_data.php',{stream:$('#stream').val(),location:$('#location').val(),exam:$('#exam').val(),fees:$('#fees').val()},function (data) {$('.data_div').html(data);
		});
	});
$(document).on("click",'.college_link', function () {
var college= $(this).attr('href');
$('.college_info').val(college);
$('.college_target').submit();
return false;
});

$(document).on("click",'.link_page', function () {
var page=$(this).attr('info');
$('.page_div').html('Please wait.. Fetching Results..');
$.post('pagination.php',{stream:$('#stream').val(),location:$('#location').val(),exam:$('#exam').val(),fees:$('#fees').val(),page:page},function (data) {$('.page_div').html(data);
});
});

});