$(function() {
	$('#right-panel').css('left', $(window).width() - $('#right-panel').width() - 16);
	// move right-panel when you resize the window
	$(window).resize(function() {
		$('#right-panel').css('left', $(window).width() - $('#right-panel').width() - 16);
	});
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
	        $(currentDrag).css('top', (workspaceHeight - $(currentDrag).height()) + 'px');
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
		$('#workspace').append('<div class="testgridbox ui-widget-content" id="' + count + 'testgridbox" draggable="true">'
			+ '<span class="delete-gridbox">x</span>'
			+ '<input class="boxtitle" id="' + count + 'boxtitle" placeholder="title">'
			+ '<textarea class="boxtext" type="text" id="'+ count + 'boxtext"></textarea></div>');
		$('#' + count + 'testgridbox').resizable({
  				handles: "se"
  			});

		$('.delete-gridbox').click(function() {
	 		console.log('delete gridbox');
	 		$(this).parent().remove();
	 	});

		var dm = document.getElementById(count + 'testgridbox'); 
		dm.addEventListener('dragstart',drag_start,false); 
		$('#' + count + 'boxtitle').focus();
		count++;
	});


	$('#add-list').click(function() {
    	$('#workspace').append('<div class="testgridbox ui-widget-content" id="' + count + 'testgridbox" draggable="true">'
    		+ '<span class="delete-gridbox">x</span>'
			+ '<input class="boxlisttitle" id="' + count + 'boxlisttitle" placeholder="title">'
			+ '<ul id="' + count + 'boxlist">'
			+ '<li class="boxlist-li"><input class="boxlist-input"></li>'
			+ '</ul></div>');

    	$('#' + count + 'testgridbox').resizable({
  				handles: "se"
  			});

    	$('.boxlist-input').keyup(function(e) {
    		// ENTER key
	  		if (e.which == 13) {
	  			$(this).parent().parent().append('<li class="boxlist-li"><input class="boxlist-input"></li>');
	  		}
	  		// DELETE or BACKSPACE key
	  		else if (e.which == 8 || e.which == 46) {
	  			if (!$(this).val()) {
	  				$(this).parent().next().find(">:first-child").focus();
	  				$(this).parent().remove();
	  			}
	  		}
	  		// UP key 
	  		else if (e.which == 38) {
	  			$(this).parent().prev().find(">:first-child").focus();
	  		}
	  		// DOWN key
	  		else if (e.which == 40) {
	  			$(this).parent().next().find(">:first-child").focus();
	  		}
	  	});

	  	$('.delete-gridbox').click(function() {
	 		console.log('delete gridbox');
	 		$(this).parent().remove();
	 	});

    	var dm = document.getElementById(count + 'testgridbox'); 
		dm.addEventListener('dragstart',drag_start,false); 
    	$('#' + count + 'boxlisttitle').focus();
    	count++;
  	});


  	$('#add-month').click(function() {
  		$.get("templates/month.html", function(data) {
  			$('#workspace').append(data);
  			$('#workspace').find('.month').attr('id', count + 'testgridbox');
  			$('#' + count + 'testgridbox').resizable({
  				handles: "se"
  			});

	  		$('.delete-gridbox').click(function() {
		 		console.log('delete gridbox');
		 		$(this).parent().remove();
		 	});

		 	var dm = document.getElementById(count + 'testgridbox'); 
			dm.addEventListener('dragstart',drag_start,false); 
			count++;
  		});

  		
  	});

  	$('#add-week').click(function() {
  		$.get("templates/week.html", function(data) {
  			$('#workspace').append(data);
  			$('#workspace').find('.week').attr('id', count + 'testgridbox');
  			$('#' + count + 'testgridbox').resizable({
  				handles: "se"
  			});

	  		$('.delete-gridbox').click(function() {
		 		console.log('delete gridbox');
		 		$(this).parent().remove();
		 	});

		 	var dm = document.getElementById(count + 'testgridbox'); 
			dm.addEventListener('dragstart',drag_start,false); 
			count++;
  		});
  		
  	});

	$('#save-button').click(function() {
	    var workspaceHTML = $('#workspace').html();
	    var saveJSON = {
	    	"html": workspaceHTML,
	    	"count": count
	    };
	    $.ajax({
	      type : "POST",
	      url : "saveWorkspace.php",
	      dataType : 'json', 
	      data : {
	          json : JSON.stringify(saveJSON)
	      },
	      success: function(data) {
	        console.log(data);
	      }
	    });
	  });

	$('#design-one').click(function() {
		console.log("getting file");
		$.get('loadWorkspace.php', function(data) {
			console.log("data: " + data);
			data = $.parseJSON(data);
			$('#workspace').append(data.html);
			count = data.count; 
			$('.cd-panel').removeClass('is-visible');
		}).fail(function(jqXHR, textStatus, error) {
			alert("Failed to load design because: " + error);
		});
	});

});
