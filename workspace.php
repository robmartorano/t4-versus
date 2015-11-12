<?php require_once("login_success.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>gylt</title>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.gridster/0.5.6/jquery.gridster.min.css">
        <link rel="stylesheet" href="styles/style.css"/>
        <link rel="stylesheet" href="styles/gridster.css"/>
    </head>

    <body>
        <header>
            <nav>
                <ul id="menu-container">
                    <li class="menu-btn" id="hello-user">hello <?php echo $_SESSION['first_name']; ?></li>
                    <li class="menu-btn" id="logo"><a href="index.php" class="menu-link" id="nav-home">gylt</a></li>
                    <li class="menu-btn" id="home-menu-btn"><a href="" class="menu-link" id="nav-home">Designs</a></li>
                    <li class="menu-btn" id="about-menu-btn"><a href="account.php" class="menu-link" id="nav-about">Account</a></li>
                    <li class="menu-btn" id="photos-menu-btn"><a href="logout.php" class="menu-link" id="nav-photos">Sign Out</a></li>
                </ul>
            </nav>
        </header>

        <div id="workspace">
            <div class="gridster">
                <ul id="grid-list">
                </ul>
            </div><!-- end gridster-->
        </div><!--end workspace-->

        <div id="right-panel">
            <h3 id="right-panel-title">Editing Panel</h3>
            <ul>
                <li id="add-components">
                    <input type="checkbox" id="add-components-checkbox" checked>
                    <label class="panel-section-title" for="add-components-checkbox"><i></i>Add Components</label>
                    <div class="panel-section">
                        <div class="add-item">
                            <h4>Blank Box</h4>
                            <input type="text" id="dimension-x-box"/>
                            x
                            <input type="text" id="dimension-y-box"/>
                            <button id="add-rectangle">Add Box</button>
                        </div>
                        <div class="add-item">
                            <h4>List Box</h4>
                            <input type="text" id="list-length"/> &#35; lines
                            <button id="add-list">Add List</button>
                        </div>
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
            </ul>
            
        </div><!--end right-panel-->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.gridster/0.5.6/jquery.gridster.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.min.js"></script>
        <script src="scripts/jscolor-2.0.4/jscolor.min.js"></script>

        <script src="scripts/app.js"></script>
        <script src="scripts/gridster.js"></script>

    </body>
</html>