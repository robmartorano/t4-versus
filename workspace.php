<?php require_once('login_success.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>gylt</title>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css" />
        <link rel="stylesheet" href="styles/testgrid.css" />
        <link rel="stylesheet" href="styles/style.css" />
        <link rel="stylesheet" href="styles/slidepanel.css" />

    </head>

    <body>
        <header>
            <nav>
                <ul id="menu-container">
                    <li class="menu-btn" id="hello-user">hello <?php if (isset($_SESSION['first_name'])) {echo $_SESSION['first_name'];} ?></li>
                    <li class="menu-btn" id="logo"><a href="index.php" class="menu-link" id="nav-home">gylt</a></li>
                    <li class="menu-btn" id="designs-menu-btn"><a href="" class="menu-link" id="nav-designs">designs</a></li>
                    <li class="menu-btn" id="account-menu-btn"><a href="account.php" class="menu-link" id="nav-account">account</a></li>
                    <li class="menu-btn" id="signout-menu-btn"><a href="logout.php" class="menu-link" id="nav-signout">sign out</a></li>
                </ul>
            </nav>
        </header>

        
        <div id="design-details-section">
            <label class="design-details-section-item" for="current-design-name" id="current-design-name-label">Design Name: </label>
            <input class="design-details-section-item" type="text" id="current-design-name">
            <div class="design-details-section-item" id="saving-update-success"></div>
            <div class="design-details-section-item" id="saving-update-error"></div>
        </div>
        
        <div id="workspace"></div>

        <div id="right-panel" draggable="true">
            <h3 id="right-panel-title">Editing Panel</h3>
            <ul>
                <li id="add-components">
                    <input type="checkbox" id="add-components-checkbox" checked>
                    <label class="panel-section-title" for="add-components-checkbox"><i></i>Add Components</label>
                    <div class="panel-section">
                        <button class="add-schedule-button" id="add-rectangle">Add Blank Box</button>
                        <button class="add-schedule-button" id="add-list">Add List Box</button>
                        <button class="add-schedule-button" id="add-month">Add Month</button>
                        <button class="add-schedule-button" id="add-week">Add Week</button>
                        <button class="add-schedule-button" id="add-day">Add Day</button>
                    </div><!--end panel-section-->
                </li><!--end add-components-->

                <li id="design-components">
                    <input type="checkbox" id="design-components-checkbox">
                    <label class="panel-section-title" for="design-components-checkbox"><i></i>Design Components</label>
                    <div class="panel-section">
                        <div class="design-attributes">Background Color: <input class="jscolor" id="background-color" value="FFFFFF"></div>
                        <div class="design-attributes">Border Width: 
                            <select id="border-width">
                                <option>1px</option>
                                <option>2px</option>
                                <option>3px</option>
                            </select>
                        </div>
                        <div class="design-attributes">Border Color: <input class="jscolor" id="border-color" value="B5B5B5"></div>
                        <div class="design-attributes">Font Family: 
                            <select id="font-family">
                                <option value="Avenir">Avenir</option>
                                <option value="Helvetica">Helvetica</option>
                                <option value="Times New Roman">PT Serif</option>
                                <option value="Garamond">Mate</option>
                            </select>
                        </div>
                        <div class="design-attributes">Font Size: 
                            <select id="font-size">
                                <option>0.75em</option>
                                <option>1em</option>
                                <option>1.25em</option>
                            </select>
                        </div>
                    </div><!--end panel-section-->
                </li><!--end design-components-->
                <li>
                    <input type="checkbox" id="save-preview-print-checkbox">
                    <label class="panel-section-title" for="save-preview-print-checkbox"><i></i>Save, Preview, Print</label>
                    <div class="panel-section">
                        <button class="save-preview-print-button" id="save-button">Save</button>
                        <button class="save-preview-print-button" id="preview-button">Preview</button>
                        <button class="save-preview-print-button" id="print-button">Print</button>
                    </div>
                </li>
                    
            </ul>
            
        </div><!--end right-panel-->

        <div class="cd-panel from-right">
            <header class="cd-panel-header">
                <div id="panel-header-content">Designs</div>
                <a href="#0" class="cd-panel-close">Close</a>
            </header>
         
            <div class="cd-panel-container">
                <div class="cd-panel-content">
                    <ul id="panel-designs-list">
                        <?php require_once("load_designs_list.php"); ?>
                    </ul>
                </div> <!-- end cd-panel-content -->
            </div> <!-- end cd-panel-container -->
        </div> <!-- end cd-panel -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script src="scripts/jscolor-2.0.4/jscolor.min.js"></script>
        

        <script src="scripts/app.js"></script>
        <script src="scripts/capture_workspace.js"></script>
        <script src="scripts/testgrid.js"></script>
    </body>
</html>
