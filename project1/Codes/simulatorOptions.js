if(sessionStorage.getItem("DFlipFlop"))
{
  var dfl = {
  "width":780,
  "height":525,
  "showToolbox":true,
  "toolbox":[
    {"type":"In"},
    {"type":"Out"},
    {"type":"OSC","freq":0.5,"label":"CLK(0.5MHZ)"},
    {"type":"OSC","freq":2,"label":"CLK(2MHZ)"},
    {"type":"D-FF"},
    {"type":"LED"},
    {"type":"NumSrc"},
    {"type":"NumDsp"},
    {"type":"DSO","label":"Graph"}
  ],
  "devices":[
    {"type":"In","id":"dev0","x":112,"y":176,"label":"D"},
    {"type":"In","id":"dev1","x":152,"y":280,"label":"CLK"},
    {"type":"NOT","id":"dev2","x":160,"y":216,"label":"NOT"},
    {"type":"NAND","id":"dev3","x":208,"y":184,"label":"NAND"},
    {"type":"NAND","id":"dev4","x":208,"y":248,"label":"NAND"},
    {"type":"RS-FF","id":"dev5","x":256,"y":216,"label":"RS-FF"},
    {"type":"NOT","id":"dev6","x":280,"y":280,"label":"NOT"},
    {"type":"NAND","id":"dev7","x":336,"y":184,"label":"NAND"},
    {"type":"NAND","id":"dev8","x":336,"y":248,"label":"NAND"},
    {"type":"RS-FF","id":"dev9","x":384,"y":216,"label":"RS-FF"},
    {"type":"Out","id":"dev10","x":464,"y":184,"label":"Q"},
    {"type":"Out","id":"dev11","x":464,"y":248,"label":"~Q"},
    {"type":"Toggle","id":"dev12","x":64,"y":176,"label":"Toggle","state":{"on":false}},
    {"type":"PushOn","id":"dev13","x":64,"y":280,"label":"PushOn"},
    {"type":"DC","id":"dev14","x":16,"y":224,"label":"DC"},
    {"type":"LED","id":"dev15","x":552,"y":184,"label":"LED"},
    {"type":"LED","id":"dev16","x":552,"y":248,"label":"LED"}
  ],
  "connectors":[
    {"from":"dev0.in0","to":"dev12.out0"},
    {"from":"dev1.in0","to":"dev13.out0"},
    {"from":"dev2.in0","to":"dev0.out0"},
    {"from":"dev3.in0","to":"dev0.out0"},
    {"from":"dev3.in1","to":"dev1.out0"},
    {"from":"dev4.in0","to":"dev1.out0"},
    {"from":"dev4.in1","to":"dev2.out0"},
    {"from":"dev5.in0","to":"dev3.out0"},
    {"from":"dev5.in1","to":"dev4.out0"},
    {"from":"dev6.in0","to":"dev1.out0"},
    {"from":"dev7.in0","to":"dev5.out0"},
    {"from":"dev7.in1","to":"dev6.out0"},
    {"from":"dev8.in0","to":"dev6.out0"},
    {"from":"dev8.in1","to":"dev5.out1"},
    {"from":"dev9.in0","to":"dev7.out0"},
    {"from":"dev9.in1","to":"dev8.out0"},
    {"from":"dev10.in0","to":"dev9.out0"},
    {"from":"dev11.in0","to":"dev9.out1"},
    {"from":"dev12.in0","to":"dev14.out0"},
    {"from":"dev13.in0","to":"dev14.out0"},
    {"from":"dev15.in0","to":"dev10.out0"},
    {"from":"dev16.in0","to":"dev11.out0"}
  ]
}
    var html1=JSON.stringify(dfl);
    document.querySelector(".simcir").innerHTML=html1;
}
else if(sessionStorage.getItem("DFlipFlopCirc"))
{
  var dfl = {
            "width":780,
            "height":525,
            "showToolbox":true,
            "toolbox":[
              {"type":"In"},
              {"type":"Out"},
              {"type":"OSC","freq":0.5,"label":"CLK(0.5MHZ)"},
              {"type":"OSC","freq":2,"label":"CLK(2MHZ)"},
              {"type":"D-FF"},
              {"type":"LED"},
              {"type":"NumSrc"},
              {"type":"NumDsp"},
              {"type":"DSO","label":"Graph"}
            ],
            "devices":[
              {"type":"D-FF","id":"dev0","x":184,"y":176,"label":"D-FF"},
              {"type":"OSC","freq":2,"label":"CLK(2MHZ)","id":"dev1","x":64,"y":256},
              {"type":"OSC","freq":0.5,"label":"CLK(0.5MHZ)","id":"dev2","x":56,"y":128},
              {"type":"DSO","label":"Graph","id":"dev3","x":360,"y":136,"state":{"playing":true,"rangeIndex":0}}
            ],
            "connectors":[
              {"from":"dev0.in0","to":"dev2.out0"},
              {"from":"dev0.in1","to":"dev1.out0"},
              {"from":"dev3.in0","to":"dev2.out0"},
              {"from":"dev3.in1","to":"dev1.out0"},
              {"from":"dev3.in2","to":"dev0.out0"},
              {"from":"dev3.in3","to":"dev0.out1"}
            ]
  }
  var html1=JSON.stringify(dfl);
  document.querySelector(".simcir").innerHTML=html1;

}
else
{
  var obj = {
                  "width":780,
                  "height":525,
                  "showToolbox":true,
                  "toolbox":[
                  {"type":"In"},
                  {"type":"Out"},
                  {"type":"OSC","freq":0.5,"label":"CLK(0.5MHZ)"},
                  {"type":"OSC","freq":2,"label":"CLK(2MHZ)"},
                  {"type":"D-FF"},
                  {"type":"LED"},
                  {"type":"NumSrc"},
                  {"type":"NumDsp"},
                  {"type":"DSO","label":"Graph"}
                  ]
  }
  var html=JSON.stringify(obj);
  document.querySelector(".simcir").innerHTML=html;
}

$("#dfli").click(function(event) {
    sessionStorage.setItem("DFlipFlop",1);
    sessionStorage.removeItem("DFlipFlopCirc");
    location.reload();
});

$("#dfl").click(function(event) {
    sessionStorage.setItem("DFlipFlopCirc",1);
    sessionStorage.removeItem("DFlipFlop");
    location.reload();
});

$("#clear").click(function(event) {
    sessionStorage.removeItem("DFlipFlopCirc",1);
    sessionStorage.removeItem("DFlipFlop");
    location.reload();
});