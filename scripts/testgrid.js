$(function() {
	var workspaceHeight = $('#workspace').height();
	var workspaceWidth = $('#workspace').width();
	var currentDrag;

	function drag_start(event) {
		currentDrag = '#' + $(this).attr('id');
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
	    $(currentDrag).css('left', (event.clientX + parseInt(offset[0],10)) + 'px');
	    $(currentDrag).css('top', (event.clientY + parseInt(offset[1],10)) + 'px');
	    
	    //console.log(workspaceWidth);

	    if (!currentDrag) {
	    	return;
	    }

	    // if it is the panel, we check drag params based on window size
	    if (currentDrag == '#right-panel') {
	    	workspaceHeight = $(window).height();
			workspaceWidth = $(window).width();
			console.log("height: " + workspaceHeight + ", width: " + workspaceWidth);
	    }
		/* CHECK DRAG BOUNDARIES */
	    // check right bound
	    if ($(currentDrag).position().left + $(currentDrag).width() > workspaceWidth) {
	    	console.log("fix right: " + $(currentDrag).position().left + $(currentDrag).width());
	        $(currentDrag).css('left', (workspaceWidth - $(currentDrag).width()) + 'px');
	    }

	    // check left bound
	    if ($(currentDrag).position().left < 0) {
	    	console.log("fix left: " + $(currentDrag).position().left);
	        $(currentDrag).css('left', 0);
	    }

	    // check bottom bound
	    if ($(currentDrag).position().top + $(currentDrag).height() > workspaceHeight) {
	    	console.log("fix bottom: " + $(currentDrag).position().top + $(currentDrag).height());
	        $(currentDrag).css('top', (workspaceWidth - $(currentDrag).height()) + 'px');
	    }

	    // check top bound
	    if ($(currentDrag).position().top < 0) {
	    	console.log("fix top: " + $(currentDrag).position().top);
	        $(currentDrag).css('top', 0);
	        console.log(" to " + $(currentDrag).position().top);
	    }

	    //change variables back in case we switched for right panel
	    workspaceHeight = $('#workspace').height();
		workspaceWidth = $('#workspace').width();
	    event.preventDefault();
	    return false;
	}


	var rightPanel = document.getElementById('right-panel'); 
	rightPanel.addEventListener('dragstart',drag_start,false); 
	document.body.addEventListener('dragover',drag_over,false); 
	document.body.addEventListener('drop',drop,false);

	var count = 0;
	$('#add-rectangle').click(function() {
		$('#workspace').append('<div class="testgridbox ui-widget-content" id="' + count + 'testgridbox" draggable="true"></div>');
		$('#' + count + 'testgridbox').resizable();
		var dm = document.getElementById(count + 'testgridbox'); 
		dm.addEventListener('dragstart',drag_start,false); 
		count++;
	});


  $('#add-month').click(function() {

  })

  $('#delete-selected').click(function() {
  	$( ".box-selected" ).remove();
  });

  $('#save-button').click(function() {

  });

});