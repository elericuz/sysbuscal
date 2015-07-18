require(["dojo/parser", "dojo/ready", "dojo/dom", "dojox/calendar/Calendar",
		"dojo/_base/Deferred", "dojo/store/Observable", "dojo/store/Memory",
		"dojo/date/stamp", "dojox/layout/ContentPane",
		"dijit/layout/BorderContainer", "dijit/layout/AccordionContainer",
		"dijit/form/ValidationTextBox", "dijit/form/DateTextBox",
		"dijit/form/TimeTextBox", "dijit/form/Button", "dijit/registry", "dojo/date",
		"dojo/data/ItemFileWriteStore", "dojo/store/DataStore" ], function(parser,
		ready, dom, Calendar, Deferred, Observable, Memory, stamp, ContentPane,
		BorderContainer, AccordionContainer, ValidationTextBox, DateTextBox,
		TimeTextBox, Button, registry, date) {
	ready(function() {
		var saveEventBtn = new Button({
			label : "Guardar",
			onClick : function(e) {
				console.log("aca tamos");
			}
		}, "save-event-btn").startup();

		myData = new dojo.data.ItemFileWriteStore({url:"/events/get", urlPreventCache:true});
		myStore = new Memory({data: myData});
		calStore = Observable(new dojo.store.DataStore({store: myData}));

		d = new Date();
		calendar = new Calendar({
			date : new Date(d.getFullYear(), d.getMonth(), d.getDate()),
			cssClassFunc : function(item) {
				return item.calendar;
			},
			decodeDate : function(s) {
				return stamp.fromISOString(s);
			},
			encodeDate : function(d) {
				return stamp.toISOString(d);
			},
			store : calStore,
			dateInterval : "week",
			columnViewProps : {
				minHours : 0,
				maxHours : 24,
				timeSlotDuration : 15
			},
			style : "position:relative;width:100%;height:100%;"
		}, "mainCalendar");

		calendar.on("itemClick", function(e) {
			console.log("Item clicked", e.item.summary);
			console.log("Item clicked", e.item.id);
		});

		calendar.on("itemEditEnd", function(e){
		    var xhrArgs = {
	    		url: "/events/update-time",
	    		content: {
	    			id: e.item.id,
	    			start: e.item.startTime,
	    			end: e.item.endTime
    		    },
	    		handleAs: "json",
	    		sync: true
    	    }

		    dojo.xhrPost(xhrArgs).then(function(response){
		    	console.log(response.status);
		    });
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

			var newId = 0;

		    var xhrArgs = {
	    		url: "/events/create",
	    		content: {
    		      calendar: "Calendar1",
    		      start: start,
    		      end: end,
    		      summary: "Nuevo Evento"
    		    },
	    		handleAs: "json",
	    		sync: true
    	    }

		    dojo.xhrPost(xhrArgs).then(function(response){
		    	newId = response.nextId;
		    });

			var item = {
				id : newId,
				summary : "Nuevo Evento",
				startTime : start,
				endTime : end,
				calendar : "Calendar1",
				allDay : view.viewKind == "matrix"
			};
			return item;
		};
		calendar.set("createItemFunc", createItem);
	})
});