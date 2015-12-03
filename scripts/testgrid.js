$(function() {
	$('#right-panel').css('left', $(window).width() - $('#right-panel').width() - 16);
	// move right-panel when you resize the window
	$(window).resize(function() {
		$('#right-panel').css('left', $(window).width() - $('#right-panel').width() - 16);
	});
	var workspaceHeight = $('#workspace').height();
	var workspaceWidth = $('#workspace').width();
	var currentDrag;
	var currentDesignName;

	function drag_start(event) {
		currentDrag = '#' + $(this).attr('id');
	    var style = window.getComputedStyle(event.target, null);
	    event.originalEvent.dataTransfer.effectAllowed = "move";
	    event.originalEvent.dataTransfer.setData("text/plain",
	    (parseInt(style.getPropertyValue("left"),10) - event.clientX) + ',' + (parseInt(style.getPropertyValue("top"),10) - event.clientY));
	}

	function drag_over(event) { 
	    event.originalEvent.preventDefault(); 
	    return false; 
	}

	function drop(event) { 
	    var offset = event.originalEvent.dataTransfer.getData("text/plain").split(',');
	    $(currentDrag).css('left', (event.clientX + parseInt(offset[0],10)) + 'px');
	    $(currentDrag).css('top', (event.clientY + parseInt(offset[1],10)) + 'px');
	    
	    if (!currentDrag) {
	    	return;
	    }
	    // if it is the panel, we check drag params based on window size
	    if (currentDrag == '#right-panel') {
	    	workspaceHeight = $(window).height();
			workspaceWidth = $(window).width();
	    }
		/* CHECK DRAG BOUNDARIES */
	    // check right bound
	    if ($(currentDrag).position().left + $(currentDrag).width() > workspaceWidth) {
	        $(currentDrag).css('left', (workspaceWidth - $(currentDrag).width()) + 'px');
	    }
	    // check left bound
	    if ($(currentDrag).position().left < 0) {
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

	$('#right-panel').on('dragstart', drag_start);
	$('body').on('dragover', drag_over);
	$('body').on('drop', drop);
	
	function deleteGridbox() {
		console.log('delete gridbox');
	 	$(this).parent().remove();
	}

	function addListboxKeyListeners(e) {
		// ENTER key
  		if (e.which == 13) {
  			$(this).parent().parent().append('<li class="boxlist-li"><input class="boxlist-input"></li>');
			$(this).parent().next().find(">:first-child").focus();
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
	}

	$('#workspace').on('click', '.delete-gridbox', deleteGridbox);
	$('#workspace').on('dragstart', '.testgridbox', drag_start);
	$('#workspace').on('keyup', '.boxlist-input', addListboxKeyListeners);

	var count = 0;

	$('#add-rectangle').click(function() {
		$('#workspace').append('<div class="testgridbox ui-widget-content" id="' + count + 'testgridbox" draggable="true">'
			+ '<span class="delete-gridbox">x</span>'
			+ '<input class="boxtitle" id="' + count + 'boxtitle" placeholder="title">'
			+ '<textarea class="boxtext" type="text" id="'+ count + 'boxtext"></textarea></div>');

		$('#' + count + 'testgridbox').resizable({
  				handles: "se"
		});
		//$('.delete-gridbox').click(deleteGridbox);
		//$('#' + count + 'testgridbox').on('dragstart', drag_start);
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
    	//$('.boxlist-input').keyup(addListboxKeyListeners);
	  	//$('.delete-gridbox').click(deleteGridbox);
    	//$('#' + count + 'testgridbox').on('dragstart', drag_start);
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
	  		//$('.delete-gridbox').click(deleteGridbox);
		 	//$('#' + count + 'testgridbox').on('dragstart', drag_start);
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
	  		//$('.delete-gridbox').click(deleteGridbox);
		 	//$('#' + count + 'testgridbox').on('dragstart', drag_start);
			count++;
  		});
  		
  	});
	
	/* to store a list of the user's designs */
	var userDesignList = [];
	$( ".user-design-list-item" ).each(function( index ) {
		userDesignList.push($(this).text());
	});
	//console.log("user design list: " + userDesignList);

  	function save(){
		currentDesignName = $('#current-design-name').val();
  		var workspaceHTML = $('#workspace').html();
	    var saveJSON = {
	    	"html": workspaceHTML,
	    	"count": count
	    };
	    $.ajax({
	      type : "POST",
	      url : "saveWorkspace.php",
	      dataType: 'json',
	      data : {
	          json : JSON.stringify(saveJSON),
	          design_name: currentDesignName
	      },
	      success: function(data) {
			$('#saving-update-error').text("");
			$('#saving-update-success').text("saved");
	        console.log(data);
	      }
	    });
  	}

  	function checkDuplicateDesignName(wantedName) {
  		return $.ajax({
  			type: "POST",
  			dataType: 'text',
  			url: "checkduplicatedesign.php",
  			async: false,
  			data: {
  				"wanted_name": wantedName
  			},
  			success: function(data) {
  				//data = $.parseJSON(data);
  				console.log("check design data: " + data);
  				return data;
  			},
  			error: function(textStatus, errorThrown) {
  				console.log("failed to check design data: " + textStatus + " " + errorThrown);
  				return "already exists";
  			}

  		}).responseText;
		  if (userDesignList.indexOf(wantedName) > -1) {
			  return "already exists";
		  }
		  else {
			  return "does not exist";
		  }
  	}


	$('#save-button').click(function() {
		if ($('#current-design-name').val() == null || $('#current-design-name').val() == "") {
			console.log("Saving but design name is empty");
			$('#current-design-name').addClass('error-input');
			$('#saving-update-success').text("");
			$('#saving-update-error').text("You must give your design a name.");
			return;
		}
		
		if (checkDuplicateDesignName($('#current-design-name').val()) == "already exists") {
			console.log("Design already exists");
			$('#current-design-name').addClass('error-input');
			$('#saving-update-success').text("");
			$('#saving-update-error').text("Sorry, you already have a design by that name. Please enter another name.");
			return;
		}
		
		else {
			$('#current-design-name').removeClass('error-input');
			save();
		}
	});

	/* Autosave only runs if a design has been loaded into the page */
	var autosaver = setInterval(function() {
		if (currentDesignName != null) {
			save();
			$('#saving-update-success').text("autosaved");
		}
	}, 5000);

	$('.user-design-list-item').click(function() {
		var designToLoad = $(this).text();
		console.log("getting file for: " + designToLoad);
		$.ajax({
		     	type : "POST",
		      	url : "loadWorkspace.php",
		      	data : {
		          	design_name: designToLoad
		     	 },
		     	 success: function(data) {
		      	  	console.log("data: " + data);
					//data = $.parseJSON(data);
					//console.log("data: " + data);
					if (data.indexOf("Error") > -1 ) {
						$('#saving-update-success').text("");
						$('saving-update-error').text(data);
					}
					else {
						$('#saving-update-success').text("loaded");
						$('#current-design-name').val(designToLoad);
						$('#workspace').html("");
						data = $.parseJSON(data);
						$('#workspace').append(data.html);
						count = data.count; 
						$('.cd-panel').removeClass('is-visible');
			
						$('#workspace').children().each(function() {
							$('.testgridbox').resizable({
								handles: "se"
							});
							//$(this).on('dragstart', drag_start);
							//$('.boxlist-input').keyup(addListboxKeyListeners);
							//$('.delete-gridbox').click(deleteGridbox);
						});
					}
		      	},
				error: function(textStatus, errorThrown) {
					$('saving-update-error').text("failed to load the data: " + errorThrown);
					console.log("failed to check design data: " + textStatus + " " + errorThrown);
					return "already exists";
				}
		});
	});
});
