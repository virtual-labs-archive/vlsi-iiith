var s = "";
var P = "P.";
var Q = "";
var Q0 = "";
   function myFunction()
   {
      var clkval = document.getElementById("clock").value;
      var waveval = document.getElementById("waveform").value;
      var clkpulse = document.getElementById("number").value;
      var str = document.getElementById("line").value;
      if(clkval==="0")
      {
        alert("Choose a clock type!");
        return;
      }

      if(clkpulse.length===0 && str.length===0)
      {
        if(waveval==="0")
        {
          alert("Choose a waveform!");
          return;
        }
        if(clkval=="1")
          P="P.......";
        else
          P="N.......";
        switch (waveval)
        {
          case "1": s="h.lp.hlh";
                    break;

          case "2": s="lh.n.lhn";
                    break;

          case "3": s="plhn.h..";
                    break;
        }
      }

      else if(clkpulse.length!==0 && str.length!==0)
      {
        if(clkval=="1")
        {
          P="P";
        }
        else
        {
          P="N";
        }
        var pulseno = parseInt(clkpulse);
        for(var j=1;j<pulseno;j++)
        {
          P = P + ".";
        }
        s = str;

        //Input validation
        //-----------------------------------------------------------------------
        for(var k = 0; k<s.length;k++)
        {
          if(s[k]==="h" || s[k]==="p" || s[k]==="l" || s[k]==="n" || s[k]===".")
          {
            continue;
          }
          else
          {
            alert("Invalid input waveform (Refer Help)");
            return;
          }
        }
        if(!Number.isInteger(pulseno))
        {
          alert("Invalid number of pulses");
          return;
        }
        if(s.length!=pulseno)
        {
          alert("No of pulses and length of input waveform should be same");
          return;
        }
        //----------------------------------------------------------------------

      }
      else
      {
        alert("Enter both fields for the input waveform");
      }

  
        var l = P.length;
        var temp="";
        for(var i = 0;i < l;i++)
          {
            if(s[i]==="h" || s[i]==="p")
            {
              if(temp==="h")
              {
                Q = Q + ".";
              }
              else
              {
                Q = Q + "h";
                temp = "h";
              }
            }
            else if(s[i]==="l" || s[i]==="n")
            {
              if (temp==="l")
              {
                Q = Q + ".";
              }
              else
              {
                Q = Q + "l";
                temp="l";
              }
            }
            else if(s[i]===".")
            {
              Q = Q + ".";
            }
          }
          for(var i = 0;i < Q.length;i++)
          {
            if(Q[i]==="h")
            {
              Q0 = Q0 + "l";
            }
            else if(Q[i]==="l")
            {
              Q0 = Q0 + "h";
            }
            else if(Q[i]===".")
            {
              Q0 = Q0 + ".";
            }
          }

        /*var x = document.getElementById("wavebox").style.width;
        alert(x);*/

          try {
            WaveDrom.ProcessAll();
        } catch(e) {}


        var stop = document.getElementById("simulate");
        stop.disabled=true;
        stop.style.backgroundColor = "grey";
        stop.style.color = "lightgrey";
    }