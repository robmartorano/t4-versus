// source http://jsfiddle.net/robertc/kKuqH/
// with modifications though

var currentDocHeight = $(document).height();

function drag_start(event) {
    var style = window.getComputedStyle(event.target, null);
    event.dataTransfer.setData("text/plain",
    (parseInt(style.getPropertyValue("left"),10) - event.clientX) + ',' + (parseInt(style.getPropertyValue("top"),10) - event.clientY));
} 
function drag_over(event) { 
    event.preventDefault(); 
    return false; 
} 
function drop(event) { 
    var offset = event.dataTransfer.getData("text/plain").split(',');
    var dm = document.getElementById('right-panel');
    dm.style.left = (event.clientX + parseInt(offset[0],10)) + 'px';
    if (parseInt(dm.style.left) + 240 > $(window).width()) {
        dm.style.left = ($(window).width() - 240) + 'px';
    }

    dm.style.top = (event.clientY + parseInt(offset[1],10)) + 'px';
    if (parseInt(dm.style.top)> currentDocHeight - $('#right-panel').height()) {
        dm.style.top = (currentDocHeight - $('#right-panel').height()) + 'px';
    }
    event.preventDefault();
    return false;
} 
var dm = document.getElementById('right-panel'); 
dm.addEventListener('dragstart',drag_start,false); 
document.body.addEventListener('dragover',drag_over,false); 
document.body.addEventListener('drop',drop,false);