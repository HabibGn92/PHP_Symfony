
class Paint
{

    constructor(canvas,context)
    {
        this.canvas = canvas;
        this.context = context;
        this.currentTool = 'pen';
        this.color = 'white';
    }

    addPixel(x,y)
    {
        this.context.fillRect(x,y,1,1);
    }

    addEvent()
    {
        if(this.currentTool == 'pen'){
            this.canvas.addEventListener('mousedown', event => {this.penDown(event)});
            this.canvas.addEventListener('mousemove',event => {this.penMove(event)});
            this.canvas.addEventListener('mouseup', event => {penUp(event)});
        }
        else if(this.currentTool == 'line')
        {
            this.canvas.addEventListener('mousedown', event => {drawLine(event)});
        }
    }

    removeEvent()
    {
        this.canvas.removeEventListener();
    }


    penDown(event)
    {
        this.addPixel(event.offsetX,event.offsetY,1,1);
    }

    penMove(event)
    {
        this.addPixel(event.offsetX,event.offsetY,1,1);
    }

    penUp(event)
    {

    }

    drawLine(event)
    {

    }

}

var canvas = document.getElementById('myCanvas');
var context = canvas.getContext("2d");
const paint = new Paint(canvas,context);
paint.addEvent();