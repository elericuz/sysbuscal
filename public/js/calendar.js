var someData = [ {
	id : 0,
	summary : "Event 1",
	startTime : "2015-07-01T11:00",
	endTime : "2015-07-01T14:00",
	calendar : "Calendar1"
}, {
	id : 1,
	summary : "Evento 2",
	startTime : "2015-07-02T11:30",
	endTime : "2015-07-02T13:00",
	calendar : "Calendar1"
}, {
	id : 2,
	summary : "Evento 2",
	startTime : "2015-06-29T11:30",
	endTime : "2015-07-03T13:00",
	allDay : true,
	calendar : "Calendar2"
} ];

require(["dojo/parser", "dojo/ready", "dojo/dom", "dojox/calendar/Calendar",
		"dojo/_base/Deferred", "dojo/store/Observable", "dojo/store/Memory",
		"dojo/date/stamp", "dojox/layout/ContentPane",
		"dijit/layout/BorderContainer", "dijit/layout/AccordionContainer",
		"dijit/form/ValidationTextBox", "dijit/form/DateTextBox",
		"dijit/form/TimeTextBox", "dijit/form/Button", "dijit/registry", "dojo/date" ], function(parser,
		ready, dom, Calendar, Deferred, Observable, Memory, stamp, ContentPane,
		BorderContainer, AccordionContainer, ValidationTextBox, DateTextBox,
		TimeTextBox, Button, registry, date) {
	ready(function() {
		var saveEventBtn = new Button({
			label : "Guardar",
			onClick : function() {
				// Do something:
				//item = createEvent();
				//calendar.set("createItemFunc", createEvent());

				var nuevoitem = {
						id : 6,
						summary : "Evento 3",
						startTime : "2015-07-03T06:30",
						endTime : "2015-07-03T07:30",
						calendar : "Calendar2"
					};

				store = new Memory(someData);
				store.put(nuevoitem);
				console.log("aca tamos");
			}
		}, "save-event-btn").startup();






		calendar = new Calendar({
			date : new Date(2015, 6, 1),
			cssClassFunc : function(item) {
				return item.calendar;
			},
			decodeDate : function(s) {
				return stamp.fromISOString(s);
			},
			encodeDate : function(d) {
				return stamp.toISOString(d);
			},
			store : new Observable(new Memory({
				data : someData
			})),
			dateInterval : "week",
			columnViewProps : {
				minHours : 0,
				maxHours : 24,
				timeSlotDuration : 15
			},
			style : "position:relative;width:100%;height:100%;"
		}, "someId");

		calendar.on("itemClick", function(e) {
			console.log("Item clicked", e.item.summary);
		});

		//agrega un evento al calendario
		var createItem = function(view, d, e) {
			// create item by maintaining control key
			if (!e.ctrlKey || e.shiftKey || e.altKey) {
				return null;
			}
			// create a new event
			var start, end;
			var colView = calendar.columnView;
			var cal = calendar.dateModule;

			if (view == colView) {
				start = calendar.floorDate(d, "minute",
						colView.timeSlotDuration);
				end = cal.add(start, "minute", colView.timeSlotDuration);
			} else {
				start = calendar.floorToDay(d);
				end = cal.add(start, "day", 1);
			}

			var item = {
				unid : '',
				summary : "Evento nuevo ",
				startTime : start,
				endTime : end,
				calendar : "Calendar1",
				allDay : view.viewKind == "matrix",
				idclient : '',
				TypeAction : ''
			};
			return item;
		};

		calendar.set("createItemFunc", createItem);

	})

	function createEvent(){
//		console.log("Nuevo Evento Guardado");
//
//		var eventStartDate = registry.byId("start_date").get("displayedValue").split("/");
//		var eventStartTime = registry.byId("start_time").get("displayedValue").split(":");
//		var eventEndDate = registry.byId("end_date").get("displayedValue").split("/");
//		var eventEndTime = registry.byId("end_time").get("displayedValue").split(":");
//		var eventLocation = registry.byId("event_location").get("value");
//
//		var start = new Date(eventStartDate[2], (eventStartDate[1]-1), eventStartDate[0], eventStartTime[0], eventStartTime[1]);
//		start.setUTCHours(2);
//
//		var end = new Date(eventEndDate[2], (eventEndDate[1]-1), eventEndDate[0], eventEndTime[0], eventEndTime[1]);
//		end.setUTCHours(2);
//		console.log(stamp.toISOString(end, {zulu: true}));

//		var item = {
//			id : '10',
//			summary : registry.byId("event_name").get("value"),
//			startTime : stamp.toISOString(start, {zulu: true}),
//			endTime : stamp.toISOString(end, {zulu: true}),
//			calendar : "Calendar1",
//			allDay : false
//		};

		var item = {
			id : 6,
			summary : "Evento 2",
			startTime : "2015-07-03T06:30",
			endTime : "2015-07-03T07:30",
			calendar : "Calendar1"
		};

//		return item;

	}














});