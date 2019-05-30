$(function(){

    // get references to the canvas and its context
    var canvas=document.getElementById("canvas");
    var ctx=canvas.getContext("2d");

    //drawing line between the elements
    var clicks = 0;
    var lastClick = [0, 0];

    function drawLine(l) 
    {
        context = this.getContext("2d");

        x = getCursorPosition(l)[0] - this.offsetLeft;
        y = getCursorPosition(l)[1] - this.offsetTop;
        
        if (clicks != 1) 
        {
            clicks++;
        } 
        else 
        {
            context.beginPath();
            context.moveTo(lastClick[0], lastClick[1]);
            context.lineTo(x, y, 6);
            context.lineWidth = 3;
            context.strokeStyle = "#76ea2e";
            context.lineCap = "round";
            context.stroke();
            
            clicks = 0;
        }
        
        lastClick = [x, y];
    }

    document.getElementById("canvas").addEventListener("click", drawLine, false);

    function getCursorPosition(l) 
    {
        var x;
        var y;

        if (l.pageX != undefined && l.pageY != undefined) 
        {
            x = l.pageX;
            y = l.pageY;
        } else 
        {
            x = l.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
            y = l.clientY + document.body.scrollTop + document.documentElement.scrollTop;
        }
        
        return [x, y];
    }

    

    // get the offset position of the canvas
    var $canvas=$("#canvas");
    var Offset=$canvas.offset();
    var offsetX=Offset.left;
    var offsetY=Offset.top;

    var x,y,width,height;

    // select all .tool's
    var $tools=$(".tool");


    // make all .tool's draggable
    $tools.draggable({
            helper:"clone",
    });


    // assign each .tool its index in $tools
    $tools.each(function(index,element){
        $(this).data("toolsIndex",index);
    });

    // Drop into the canvas
    function dragDrop(e,ui)
    {

        // get the drop payload (here the payload is the $tools index)
        var theIndex=ui.draggable.data("toolsIndex");

        // get the drop point (be sure to adjust for border)
        x=parseInt(ui.offset.left-offsetX)-1;
        y=parseInt(ui.offset.top-offsetY);
        width=ui.helper[0].width+($tools[theIndex].width/1.5);      //increases the size of image +80 +80 
        height=ui.helper[0].height+($tools[theIndex].width/1.5);

        //--------------------------------------------------------------
        // drawImage at the drop point using the dropped image 
        // This will make the img a permanent part of the canvas content which is the problem
        ctx.drawImage($tools[theIndex],x,y,width,height);
        //Need to somehow make this temporary so that it can be draggable.

    }

    // make the canvas a dropzone
    $canvas.droppable({
        drop:dragDrop,
    });

  });



function Erase()
{
    /*global canvas*/
    const context = canvas.getContext("2d");

context.clearRect(0, 0, canvas.width, canvas.height);
}