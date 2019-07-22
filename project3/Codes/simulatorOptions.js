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
    {"type":"PMOS","id":"dev0","x":384,"y":72,"label":"PMOS"},
    {"type":"PMOS","id":"dev1","x":152,"y":72,"label":"PMOS"},
    {"type":"DC","label":"Vdd","id":"dev2","x":232,"y":8},
    {"type":"Joint","id":"dev3","x":264,"y":72,"label":"Joint","state":{"direction":0}},
    {"type":"OJoint","id":"dev4","x":256,"y":104,"label":"OJoint","state":{"direction":0}},
    {"type":"OR","numInputs":3,"id":"dev5","x":376,"y":184,"label":"OR"},
    {"type":"Out","id":"dev6","x":464,"y":184,"label":"Out"},
    {"type":"OJoint","id":"dev7","x":216,"y":200,"label":"OJoint","state":{"direction":3}},
    {"type":"NMOS","id":"dev8","x":224,"y":240,"label":"NMOS"},
    {"type":"NMOS","id":"dev9","x":224,"y":352,"label":"NMOS"},
    {"type":"OJoint","id":"dev10","x":216,"y":312,"label":"OJoint","state":{"direction":1}},
    {"type":"GND","id":"dev11","x":192,"y":448,"label":"GND"},
    {"type":"In","id":"dev12","x":48,"y":168,"label":"In"},
    {"type":"In","id":"dev13","x":48,"y":264,"label":"In"},
    {"type":"CAP","label":"Capacitor","id":"dev14","x":344,"y":448}
  ],
  "connectors":[
    {"from":"dev0.in0","to":"dev3.out0"},
    {"from":"dev0.in1","to":"dev13.out0"},
    {"from":"dev0.in2","to":"dev4.out0"},
    {"from":"dev1.in0","to":"dev3.out0"},
    {"from":"dev1.in1","to":"dev12.out0"},
    {"from":"dev1.in2","to":"dev4.out0"},
    {"from":"dev3.in0","to":"dev2.out0"},
    {"from":"dev5.in0","to":"dev4.out0"},
    {"from":"dev5.in1","to":"dev7.out0"},
    {"from":"dev5.in2","to":"dev14.out0"},
    {"from":"dev6.in0","to":"dev5.out0"},
    {"from":"dev8.in0","to":"dev7.out0"},
    {"from":"dev8.in1","to":"dev12.out0"},
    {"from":"dev8.in2","to":"dev10.out0"},
    {"from":"dev9.in0","to":"dev10.out0"},
    {"from":"dev9.in1","to":"dev13.out0"},
    {"from":"dev9.in2","to":"dev11.out0"},
    {"from":"dev14.in0","to":"dev11.out0"}
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
    {"type":"OJoint","id":"dev0","x":264,"y":152,"label":"OJoint","state":{"direction":1}},
    {"type":"PMOS","id":"dev1","x":272,"y":72,"label":"PMOS"},
    {"type":"DC","label":"Vdd","id":"dev2","x":240,"y":16},
    {"type":"PMOS","id":"dev3","x":272,"y":200,"label":"PMOS"},
    {"type":"OJoint","id":"dev4","x":272,"y":288,"label":"OJoint","state":{"direction":2}},
    {"type":"OR","numInputs":3,"id":"dev5","x":400,"y":288,"label":"OR"},
    {"type":"Out","id":"dev6","x":496,"y":288,"label":"Out"},
    {"type":"OJoint","id":"dev7","x":248,"y":352,"label":"OJoint","state":{"direction":0}},
    {"type":"NMOS","id":"dev8","x":160,"y":352,"label":"NMOS"},
    {"type":"NMOS","id":"dev9","x":336,"y":352,"label":"NMOS"},
    {"type":"Joint","id":"dev10","x":248,"y":384,"label":"Joint","state":{"direction":0}},
    {"type":"GND","id":"dev11","x":216,"y":440,"label":"GND"},
    {"type":"CAP","label":"Capacitor","id":"dev12","x":368,"y":440},
    {"type":"In","id":"dev13","x":80,"y":160,"label":"In"},
    {"type":"In","id":"dev14","x":80,"y":288,"label":"In"}
  ],
  "connectors":[
    {"from":"dev1.in0","to":"dev2.out0"},
    {"from":"dev1.in1","to":"dev13.out0"},
    {"from":"dev1.in2","to":"dev0.out0"},
    {"from":"dev3.in0","to":"dev0.out0"},
    {"from":"dev3.in1","to":"dev14.out0"},
    {"from":"dev3.in2","to":"dev4.out0"},
    {"from":"dev5.in0","to":"dev4.out0"},
    {"from":"dev5.in1","to":"dev7.out0"},
    {"from":"dev5.in2","to":"dev12.out0"},
    {"from":"dev6.in0","to":"dev5.out0"},
    {"from":"dev8.in0","to":"dev7.out0"},
    {"from":"dev8.in1","to":"dev13.out0"},
    {"from":"dev8.in2","to":"dev10.out0"},
    {"from":"dev9.in0","to":"dev7.out0"},
    {"from":"dev9.in1","to":"dev14.out0"},
    {"from":"dev9.in2","to":"dev10.out0"},
    {"from":"dev10.in0","to":"dev11.out0"},
    {"from":"dev12.in0","to":"dev11.out0"}
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