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
    {"type":"Delay","delay":1000},
    {"type":"OSC","freq":0.5,"label":"CLK"},
    {"type":"LED"}
  ],
  "devices":[
    {"type":"Delay","delay":1000,"id":"dev0","x":168,"y":128,"label":"Delay","state":{"direction":0}},
    {"type":"PMOS","id":"dev1","x":184,"y":248,"label":"PMOS"},
    {"type":"OSC","freq":0.5,"label":"CLK'","id":"dev2","x":104,"y":120},
    {"type":"In","id":"dev3","x":232,"y":328,"label":"In"},
    {"type":"Out","id":"dev4","x":328,"y":328,"label":"Out"},
    {"type":"NMOS","id":"dev5","x":384,"y":248,"label":"NMOS"},
    {"type":"OSC","freq":0.5,"label":"CLK","id":"dev6","x":352,"y":120}
  ],
  "connectors":[
    {"from":"dev0.in0","to":"dev2.out0"},
    {"from":"dev1.in0","to":"dev0.out0"},
    {"from":"dev1.in1","to":"dev3.out0"},
    {"from":"dev3.in0","to":"dev5.out0"},
    {"from":"dev4.in0","to":"dev1.out0"},
    {"from":"dev5.in0","to":"dev6.out0"},
    {"from":"dev5.in1","to":"dev4.out0"}
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
    {"type":"Delay","delay":1000},
    {"type":"OSC","freq":0.5,"label":"CLK"},
    {"type":"LED"}
  ],
  "devices":[
    {"type":"PMOS","id":"dev0","x":160,"y":256,"label":"PMOS"},
    {"type":"NMOS","id":"dev1","x":400,"y":256,"label":"NMOS"},
    {"type":"OSC","freq":0.5,"label":"CLK'","id":"dev2","x":320,"y":128},
    {"type":"In","id":"dev3","x":208,"y":336,"label":"In"},
    {"type":"Out","id":"dev4","x":352,"y":336,"label":"Out"},
    {"type":"OSC","freq":0.5,"label":"CLK","id":"dev5","x":128,"y":128},
    {"type":"Delay","delay":1000,"id":"dev6","x":384,"y":136,"label":"Delay","state":{"direction":0}}
  ],
  "connectors":[
    {"from":"dev0.in0","to":"dev5.out0"},
    {"from":"dev0.in1","to":"dev3.out0"},
    {"from":"dev1.in0","to":"dev6.out0"},
    {"from":"dev1.in1","to":"dev4.out0"},
    {"from":"dev3.in0","to":"dev1.out0"},
    {"from":"dev4.in0","to":"dev0.out0"},
    {"from":"dev6.in0","to":"dev2.out0"}
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