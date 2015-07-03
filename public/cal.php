<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="/vendor/dojo/dojox/calendar/themes/claro/Calendar.css">
	<link rel="stylesheet" href="/vendor/dojo/dojox/calendar/themes/claro/MonthColumnView.css">
	<link rel="stylesheet" href="/vendor/dojo/dojo/resources/dojo.css">
	<link rel="stylesheet" href="/vendor/dojo/dijit/themes/dijit.css">
	<link rel="stylesheet" href="/vendor/dojo/dijit/themes/claro/claro.css">
	<link rel="stylesheet" href="/vendor/foundation/foundation/css/foundation.css">
	<link rel="stylesheet" href="/css/calendars.css">

	<script>dojoConfig = {async: true, parseOnLoad: true}</script>
	<script src="/vendor/dojo/dojo/dojo.js"></script>
	<script src="/js/calendar.js"></script>
</head>
<body class="claro">
    <div class="fixed">
        <nav class="top-bar" data-topbar role="navigation">
            <ul class="title-area">
                <li class="name">
                    <h1><a href="#">Calendar</a></h1>
                </li>
                <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                <li class="toggle-topbar menu-icon">
                    <a href="#"><span>Menu</span></a>
                </li>
            </ul>
            <section class="top-bar-section">
                <!-- Right Nav Section -->
                <ul class="right">
                    <li class="divider"></li>
                    <li class="has-dropdown">
                        <a href="#">Hola</a>
                        <ul class="dropdown">
                            <li>
                                <a href="#">Salir</a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#">SysBus</a>
                    </li>
                </ul>
                <!-- Left Nav Section -->
                <ul class="left">
                    <li class="divider"></li>
                    <li>
                        <a href="#">Inicio</a>
                    </li>
                    <li class="divider"></li>
                </ul>
            </section>
        </nav>
    </div>
    <div style="margin-top: 3em;" data-dojo-type="dijit/layout/BorderContainer" data-dojo-props="design:'sidebar', gutters:true, liveSplitters:true" id="borderContainer">
        <div data-dojo-type="dijit/layout/ContentPane" data-dojo-props="splitter:true, region:'leading'" style="width: 300px;">
            <div data-dojo-type="dijit/layout/AccordionContainer" style="height: 300px;">
                <div data-dojo-type="dojox/layout/ContentPane" title="Administración de eventos" selected="true">
                    <form action="">
                        <input type="hidden" name="id" id="id" value="0">
                        <div>
                            <div>
                                <label for="event_name">Nombre del Evento:</label>
                                <input type="text" name="event_name" id="event_name" required="true"
                                    data-dojo-type="dijit/form/ValidationTextBox"
                                    data-dojo-props="placeHolder:'nombre del evento'" />
                                <div>
                                    <label for="start_date">Desde:</label>
                                </div>
                            </div>
                            <div>
                                <input type="text" name="start_date" id="start_date" required="true"
                                    data-dojo-type="dijit/form/DateTextBox" style="width: 97px;"
                                data-dojo-props="placeHolder:'día', constraints:{formatLength:'short'}" />
                                <input type="text" name="start_time" id="start_time" required="true"
                                    data-dojo-type="dijit/form/TimeTextBox" style="width: 97px;"
                                data-dojo-props="placeHolder:'hora'" />
                            </div>
                            <div>
                                <label for="end_date">Hasta:</label>
                            </div>
                            <div>
                                <input type="text" name="end_date" id="end_date" required="true"
                                    data-dojo-type="dijit/form/DateTextBox" style="width: 97px;"
                                data-dojo-props="placeHolder:'día'" />
                                <input type="text" name="end_time" id="end_time" required="true"
                                    data-dojo-type="dijit/form/TimeTextBox" style="width: 97px;"
                                data-dojo-props="placeHolder:'hora'" />
                            </div>
                            <div>
                                <label for="event_location">Lugar:</label>
                                <input type="text" name="event_location" id="event_location" required="true"
                                    data-dojo-type="dijit/form/ValidationTextBox"
                                    data-dojo-props="placeHolder:'¿dónde se realizará?'" />
                            </div>
                            <div>
                                <button id="save-event-btn" type="button"></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div data-dojo-type="dijit/layout/ContentPane" data-dojo-props="splitter:true, region:'center'">
            <div id="someId"></div>
        </div>
    </div>
</body>
</html>