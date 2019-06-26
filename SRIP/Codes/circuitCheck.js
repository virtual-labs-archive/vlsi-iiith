function circCheck()
{
	console.log(JSON.stringify(dataFinal.devices));
	console.log(JSON.stringify(dataFinal.connectors));
	var dev = dataFinal.devices;
	var con = dataFinal.connectors;
	console.log(dev.length);
	console.log(con.length);
	console.log(document.getElementById("whichSim").value);
	var opt = document.getElementById("whichSim").value;
	if(opt==="1")
	{
		if(dev.length==7 && con.length==7)
		{
			document.getElementById("blnk").style.display = "none";
			document.getElementById("neg").style.display = "none";
			document.getElementById("mux").style.display = "none";
			document.getElementById("pos").style.display = "inline";
		}
		else
		{
			alert("This is not the correct circuit");
		}

	}
	else if(opt==="2")
	{

	}
	else if(opt==="3")
	{

	}
	else
	{
		alert("Please select the type of simulation");
	}
}