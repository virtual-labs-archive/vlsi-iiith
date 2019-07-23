if(sessionStorage.getItem("MUX"))
{
  var val = sessionStorage.getItem("MUX");
  var opti = $("#whichSim option[value=\'" + val + "\']").text();
  $("#whichSim").append("<option value=\""+ val +"\" selected hidden>"+ opti +"</option>");
}
if(sessionStorage.getItem("PPT"))
{
  var dfl = {
  "width":730,
  "height":525,
  "showToolbox":true,
  "toolbox":[
    {"type":"In"},
    {"type":"Out"},
    {"type":"PMOS"},
    {"type":"NMOS"},
    {"type":"DC","label":"Vdd"},
    {"type":"CAP","label":"Capacitor"},
    {"type":"GND"},
    {"type":"Joint"},
    {"type":"OR","numInputs":3},
    {"type":"OJoint"}
  ],
  "devices":[
    {"type":"PMOS","id":"dev0","x":224,"y":72,"label":"PMOS"},
    {"type":"PMOS","id":"dev1","x":424,"y":72,"label":"PMOS"},
    {"type":"PMOS","id":"dev2","x":424,"y":168,"label":"PMOS"},
    {"type":"PMOS","id":"dev3","x":224,"y":168,"label":"PMOS"},
    {"type":"Joint","id":"dev4","x":328,"y":72,"label":"Joint","state":{"direction":0}},
    {"type":"OJoint","id":"dev5","x":328,"y":104,"label":"OJoint","state":{"direction":0}},
    {"type":"Joint","id":"dev6","x":344,"y":168,"label":"Joint","state":{"direction":0}},
    {"type":"OJoint","id":"dev7","x":328,"y":200,"label":"OJoint","state":{"direction":0}},
    {"type":"NMOS","id":"dev8","x":232,"y":312,"label":"NMOS"},
    {"type":"NMOS","id":"dev9","x":424,"y":312,"label":"NMOS"},
    {"type":"DC","label":"Vdd","id":"dev10","x":296,"y":8},
    {"type":"NMOS","id":"dev11","x":232,"y":408,"label":"NMOS"},
    {"type":"NMOS","id":"dev12","x":424,"y":408,"label":"NMOS"},
    {"type":"OJoint","id":"dev13","x":224,"y":376,"label":"OJoint","state":{"direction":1}},
    {"type":"OJoint","id":"dev14","x":416,"y":376,"label":"OJoint","state":{"direction":1}},
    {"type":"OJoint","id":"dev15","x":336,"y":272,"label":"OJoint","state":{"direction":2}},
    {"type":"Joint","id":"dev16","x":336,"y":440,"label":"Joint","state":{"direction":2}},
    {"type":"GND","id":"dev17","x":320,"y":472,"label":"GND"},
    {"type":"In","id":"dev18","x":32,"y":120,"label":"a"},
    {"type":"In","id":"dev19","x":32,"y":208,"label":"a'"},
    {"type":"In","id":"dev20","x":32,"y":304,"label":"b"},
    {"type":"In","id":"dev21","x":32,"y":400,"label":"b'"},
    {"type":"CAP","label":"Capacitor","id":"dev22","x":488,"y":472},
    {"type":"OR","numInputs":3,"id":"dev23","x":520,"y":264,"label":"OR"},
    {"type":"Out","id":"dev24","x":576,"y":264,"label":"Out"}
  ],
  "connectors":[
    {"from":"dev0.in0","to":"dev4.out0"},
    {"from":"dev0.in1","to":"dev18.out0"},
    {"from":"dev0.in2","to":"dev5.out0"},
    {"from":"dev1.in0","to":"dev4.out0"},
    {"from":"dev1.in1","to":"dev21.out0"},
    {"from":"dev1.in2","to":"dev5.out0"},
    {"from":"dev2.in0","to":"dev6.out0"},
    {"from":"dev2.in1","to":"dev20.out0"},
    {"from":"dev2.in2","to":"dev7.out0"},
    {"from":"dev3.in0","to":"dev6.out0"},
    {"from":"dev3.in1","to":"dev19.out0"},
    {"from":"dev3.in2","to":"dev7.out0"},
    {"from":"dev4.in0","to":"dev10.out0"},
    {"from":"dev6.in0","to":"dev5.out0"},
    {"from":"dev8.in0","to":"dev15.out0"},
    {"from":"dev8.in1","to":"dev18.out0"},
    {"from":"dev8.in2","to":"dev13.out0"},
    {"from":"dev9.in0","to":"dev15.out0"},
    {"from":"dev9.in1","to":"dev19.out0"},
    {"from":"dev9.in2","to":"dev14.out0"},
    {"from":"dev11.in0","to":"dev13.out0"},
    {"from":"dev11.in1","to":"dev21.out0"},
    {"from":"dev11.in2","to":"dev16.out0"},
    {"from":"dev12.in0","to":"dev14.out0"},
    {"from":"dev12.in1","to":"dev20.out0"},
    {"from":"dev12.in2","to":"dev16.out0"},
    {"from":"dev16.in0","to":"dev17.out0"},
    {"from":"dev22.in0","to":"dev17.out0"},
    {"from":"dev23.in0","to":"dev7.out0"},
    {"from":"dev23.in1","to":"dev15.out0"},
    {"from":"dev23.in2","to":"dev22.out0"},
    {"from":"dev24.in0","to":"dev23.out0"}
  ]
};
    var html1=JSON.stringify(dfl);
    document.querySelector(".simcir").innerHTML=html1;
}
else if(sessionStorage.getItem("NPT"))
{
  var dfli = {
  "width":730,
  "height":525,
  "showToolbox":true,
  "toolbox":[
    {"type":"In"},
    {"type":"Out"},
    {"type":"PMOS"},
    {"type":"NMOS"},
    {"type":"DC","label":"Vdd"},
    {"type":"CAP","label":"Capacitor"},
    {"type":"GND"},
    {"type":"Joint"},
    {"type":"OR","numInputs":3},
    {"type":"OJoint"}
  ],
  "devices":[
    {"type":"PMOS","id":"dev0","x":216,"y":72,"label":"PMOS"},
    {"type":"PMOS","id":"dev1","x":416,"y":72,"label":"PMOS"},
    {"type":"PMOS","id":"dev2","x":416,"y":168,"label":"PMOS"},
    {"type":"PMOS","id":"dev3","x":216,"y":168,"label":"PMOS"},
    {"type":"Joint","id":"dev4","x":320,"y":72,"label":"Joint","state":{"direction":0}},
    {"type":"OJoint","id":"dev5","x":320,"y":104,"label":"OJoint","state":{"direction":0}},
    {"type":"Joint","id":"dev6","x":336,"y":168,"label":"Joint","state":{"direction":0}},
    {"type":"OR","numInputs":3,"id":"dev7","x":504,"y":264,"label":"OR"},
    {"type":"OJoint","id":"dev8","x":320,"y":200,"label":"OJoint","state":{"direction":0}},
    {"type":"NMOS","id":"dev9","x":224,"y":312,"label":"NMOS"},
    {"type":"NMOS","id":"dev10","x":416,"y":312,"label":"NMOS"},
    {"type":"DC","label":"Vdd","id":"dev11","x":288,"y":8},
    {"type":"NMOS","id":"dev12","x":224,"y":408,"label":"NMOS"},
    {"type":"NMOS","id":"dev13","x":416,"y":408,"label":"NMOS"},
    {"type":"OJoint","id":"dev14","x":216,"y":376,"label":"OJoint","state":{"direction":1}},
    {"type":"OJoint","id":"dev15","x":408,"y":376,"label":"OJoint","state":{"direction":1}},
    {"type":"OJoint","id":"dev16","x":328,"y":272,"label":"OJoint","state":{"direction":2}},
    {"type":"Joint","id":"dev17","x":328,"y":440,"label":"Joint","state":{"direction":2}},
    {"type":"CAP","label":"Capacitor","id":"dev18","x":472,"y":472},
    {"type":"GND","id":"dev19","x":312,"y":472,"label":"GND"},
    {"type":"In","id":"dev20","x":24,"y":120,"label":"a"},
    {"type":"In","id":"dev21","x":24,"y":208,"label":"a'"},
    {"type":"In","id":"dev22","x":24,"y":304,"label":"b"},
    {"type":"In","id":"dev23","x":24,"y":400,"label":"b'"},
    {"type":"Out","id":"dev24","x":568,"y":264,"label":"Out"}
  ],
  "connectors":[
    {"from":"dev0.in0","to":"dev4.out0"},
    {"from":"dev0.in1","to":"dev21.out0"},
    {"from":"dev0.in2","to":"dev5.out0"},
    {"from":"dev1.in0","to":"dev4.out0"},
    {"from":"dev1.in1","to":"dev23.out0"},
    {"from":"dev1.in2","to":"dev5.out0"},
    {"from":"dev2.in0","to":"dev6.out0"},
    {"from":"dev2.in1","to":"dev22.out0"},
    {"from":"dev2.in2","to":"dev8.out0"},
    {"from":"dev3.in0","to":"dev6.out0"},
    {"from":"dev3.in1","to":"dev20.out0"},
    {"from":"dev3.in2","to":"dev8.out0"},
    {"from":"dev4.in0","to":"dev11.out0"},
    {"from":"dev6.in0","to":"dev5.out0"},
    {"from":"dev7.in0","to":"dev8.out0"},
    {"from":"dev7.in1","to":"dev16.out0"},
    {"from":"dev7.in2","to":"dev18.out0"},
    {"from":"dev9.in0","to":"dev16.out0"},
    {"from":"dev9.in1","to":"dev21.out0"},
    {"from":"dev9.in2","to":"dev14.out0"},
    {"from":"dev10.in0","to":"dev16.out0"},
    {"from":"dev10.in1","to":"dev20.out0"},
    {"from":"dev10.in2","to":"dev15.out0"},
    {"from":"dev12.in0","to":"dev14.out0"},
    {"from":"dev12.in1","to":"dev23.out0"},
    {"from":"dev12.in2","to":"dev17.out0"},
    {"from":"dev13.in0","to":"dev15.out0"},
    {"from":"dev13.in1","to":"dev22.out0"},
    {"from":"dev13.in2","to":"dev17.out0"},
    {"from":"dev17.in0","to":"dev19.out0"},
    {"from":"dev18.in0","to":"dev19.out0"},
    {"from":"dev24.in0","to":"dev7.out0"}
  ]
};
  var html2=JSON.stringify(dfli);
  document.querySelector(".simcir").innerHTML=html2;

}
else
{
  var obj = {};
  obj =  {
                    "width":730,
                    "height":525,
                    "showToolbox":true,
                    "toolbox":[
                    {"type":"In"},
                    {"type":"Out"},
                    {"type":"PMOS"},
                    {"type":"NMOS"},
                    {"type":"DC","label":"Vdd"},
                    {"type":"CAP","label":"Capacitor"},
                    {"type":"GND"},
                    {"type":"Joint"},
                    {"type":"OR","numInputs":3},
                    {"type":"OJoint"}
                    ]
                    
              };

  var html=JSON.stringify(obj);
  document.querySelector(".simcir").innerHTML=html;
}

$("#procedure").click(function() {
  $("#proc").toggle();
});

$("#dfli").click(function(event) {
    sessionStorage.setItem("PPT",1);
    sessionStorage.removeItem("NPT");
    location.reload();
});

$("#dfl").click(function(event) {
    sessionStorage.setItem("NPT",1);
    sessionStorage.removeItem("PPT");
    location.reload();
});

$("#clear").click(function(event) {
    sessionStorage.removeItem("NPT");
    sessionStorage.removeItem("PPT");
    location.reload();
});

$("#whichSim").change(function(event) {
  var opt = document.getElementById("whichSim").value;
    sessionStorage.setItem("MUX",opt);
    location.reload();
});