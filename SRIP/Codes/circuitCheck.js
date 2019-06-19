function circCheck()
{
	document.getElementById("sim").dispatchEvent(new MouseEvent("click", {ctrlKey: true}));
	console.log(dataFinal.width);
	console.log(JSON.stringify(dataFinal.devices));
}