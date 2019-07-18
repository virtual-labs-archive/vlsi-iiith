function circCheck()
{
	//console.log(JSON.stringify(dataFinal.devices));
	//console.log(JSON.stringify(dataFinal.connectors));
	/*global dataFinal*/
	var dev = dataFinal.devices;
	/*global dataFinal*/
	var con = dataFinal.connectors;
	//console.log(dev.length);
	//console.log(con.length);
	//console.log(document.getElementById("whichSim").value);
	var opt = document.getElementById("whichSim").value;
	var devic = new Object();
	var connec = new Object();
	connec = {};
	devic = {};
	//Main parsing done here:
			for(var i = 0;i<dev.length;i++)
			{
				var a = JSON.stringify(dev[i].id);
				var res = a.substring(1,a.length-1);
				devic[res] = dev[i].type;
			}
			for(var i=0;i<con.length;i++)
			{
				var fro = JSON.stringify(con[i].from);
				var too = JSON.stringify(con[i].to);
				var spl1 = "";
				var spl2 = "";
				var spl4 = "";
				var spl5 = "";
				var flag = true;
				for(var j=0;j<fro.length;j++)
				{
					if(fro[j]=="\"")
					{
						continue;
					}
					else
					{
						if(fro[j]==".")
						{
							flag=false;
						}
						if(flag)
						{
							spl1 = spl1 + fro[j];
							spl4 = spl4 + too[j];
						}
						else
						{
							spl2 = spl2 + fro[j];
							spl5 = spl5 + too[j];
						}
					}
				}
				var spl3 = "";
				var spl6 = "";
				spl3 = devic[spl1] + spl2;
				spl6 = devic[spl4] + spl5;
				connec[spl3] = spl6;
			}
	//console.log(devic);
	console.log(connec);
	//-----------------------------------------------------------------------------

	if(opt==="1")
	{
		var check = {
					"Delay.in0": "OSC.out", 
					"In.in0": "NMOS.out", 
					"NMOS.in0": "OSC.out",
					"NMOS.in1": "Out.out", 
					"Out.in0": "PMOS.out", 
					"PMOS.in0": "Delay.out",
					"PMOS.in1": "In.out"
				};
		if(isEqual(check, connec))
		{
			document.getElementById("blnk").style.display = "none";
			document.getElementById("neg").style.display = "none";
			document.getElementById("mux").style.display = "none";
			document.getElementById("pos").style.display = "inline";
			alert("Simulation successful!");
			$("#proc").hide();
		}
		else
		{
			alert("This is not the correct circuit. Please refer procedure carefully");
			document.getElementById("blnk").style.display = "inline";
			document.getElementById("neg").style.display = "none";
			document.getElementById("mux").style.display = "none";
			document.getElementById("pos").style.display = "none";
			return;
		}

	}
	else if(opt==="2")
	{
		var check = {
					"Delay.in0": "OSC.out",
					"In.in0": "NMOS.out",
					"NMOS.in0": "Delay.out",
					"NMOS.in1": "Out.out",
					"Out.in0": "PMOS.out",
					"PMOS.in0": "OSC.out",
					"PMOS.in1": "In.out"
					};
		if(isEqual(check, connec))
		{
			document.getElementById("blnk").style.display = "none";
			document.getElementById("neg").style.display = "inline";
			document.getElementById("mux").style.display = "none";
			document.getElementById("pos").style.display = "none";
			alert("Simulation successful!");
			$("#proc").hide();
		}
		else
		{
			alert("This is not the correct circuit. Please refer procedure carefully");
			document.getElementById("blnk").style.display = "inline";
			document.getElementById("neg").style.display = "none";
			document.getElementById("mux").style.display = "none";
			document.getElementById("pos").style.display = "none";
			return;
		}
	}
	else if(opt==="3")
	{
		var check = {
					"Delay.in0": "OSC.out",
					"OR.in0": "PassTransistor.out",
					"OR.in1": "PassTransistor.out",
					"Out.in0": "OR.out",
					"PassTransistor.in0": "Delay.out",
					"PassTransistor.in1": "In.out",
					"PassTransistor.in2": "OSC.out"
		};
		if(isEqual(check, connec))
		{
			document.getElementById("blnk").style.display = "none";
			document.getElementById("neg").style.display = "none";
			document.getElementById("mux").style.display = "inline";
			document.getElementById("pos").style.display = "none";
			alert("Simulation successful!");
			$("#proc").hide();
		}
		else
		{
			alert("This is not the correct circuit. Please refer procedure carefully");
			document.getElementById("blnk").style.display = "inline";
			document.getElementById("neg").style.display = "none";
			document.getElementById("mux").style.display = "none";
			document.getElementById("pos").style.display = "none";
			return;
		}

	}
	else
	{
		alert("Please select the type of simulation");
		return;
	}
}

function isEqual(objA, objB)
{
	
	var aProps = Object.getOwnPropertyNames(objA);     
	var bProps = Object.getOwnPropertyNames(objB);
	
	
	if (aProps.length != bProps.length) {         
	    return false;     
	}      
	for (var i = 0; i < aProps.length; i++) {         
	     
	     var propName = aProps[i];            
	     if (objA[propName] !== objB[propName]) {             
	         return false;         
	     }     
	}
	return true; 
}  