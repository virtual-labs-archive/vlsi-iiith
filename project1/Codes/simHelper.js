$(document).ready(function ()
{
	$("#helpme").hide();
	$("#helpmeButton").on("click",function()
	{
		$("#helpme").toggle();
	});
	$("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
});
