$(document).ready(function ()
{
	$("#helpme").hide();
	$("#helpmeButton").on("click",function()
	{
		$("#helpme").toggle();
	});
});