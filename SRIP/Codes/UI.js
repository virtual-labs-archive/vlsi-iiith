$(function(){

    // get references to the canvas and its context
    var canvas=document.getElementById("canvas");
    var ctx=canvas.getContext("2d");

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
            helper:'clone',
    });


    // assign each .tool its index in $tools
    $tools.each(function(index,element){
        $(this).data("toolsIndex",index);
    });


    // make the canvas a dropzone
    $canvas.droppable({
        drop:dragDrop,
    });


    // Drop into the canvas
    function dragDrop(e,ui)
    {

        // get the drop point (be sure to adjust for border)
        x=parseInt(ui.offset.left-offsetX)-1;
        y=parseInt(ui.offset.top-offsetY);
        width=ui.helper[0].width+80;      //increases the size of image
        height=ui.helper[0].height+80;

        // get the drop payload (here the payload is the $tools index)
        var theIndex=ui.draggable.data("toolsIndex");

        //--------------------------------------------------------------
        // drawImage at the drop point using the dropped image 
        // This will make the img a permanent part of the canvas content which is the problem
        ctx.drawImage($tools[theIndex],x,y,width,height);
        //Need to somehow make this temporary so that it can be draggable.

    }
  });

function Erase()
{
    const context = canvas.getContext('2d');

context.clearRect(0, 0, canvas.width, canvas.height);
}