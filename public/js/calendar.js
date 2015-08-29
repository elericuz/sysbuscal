require(["dojo/parser", "dojo/ready", "dojo/dom", "dojox/calendar/Calendar",
		"dojo/_base/Deferred", "dojo/store/Observable", "dojo/store/Memory",
		"dojo/date/stamp", "dojox/layout/ContentPane", "dijit/form/Form",
		"dijit/layout/BorderContainer", "dijit/layout/AccordionContainer",
		"dijit/form/ValidationTextBox", "dijit/form/DateTextBox",
		"dijit/form/TimeTextBox", "dijit/form/Button", "dijit/registry", "dojo/date",
		"dojo/data/ItemFileWriteStore", "dojo/store/DataStore" ], function(parser,
		ready, dom, Calendar, Deferred, Observable, Memory, stamp, ContentPane, Form,
		BorderContainer, AccordionContainer, ValidationTextBox, DateTextBox,
		TimeTextBox, Button, registry, date) {
	ready(function() {

		var saveEventBtn = new Button({
			label : "Actualizar Evento",
			onClick : function(e) {
				if (dijit.byId('eventForm').isValid()){
				    var xhrArgs = {
			    		url: "/events/update",
			    		handleAs: "json",
			    		sync: true,
			    		content: {
			    			eveiId: itemEdit.item.id,
			    			evetSummary: dijit.byId('evetSummary').get('value'),
			    			startDate: dijit.byId('startDate').get('value'),
			    			startHour: dijit.byId('startHour').get('value'),
			    			endDate: dijit.byId('endDate').get('value'),
			    			endHour: dijit.byId('endHour').get('value'),
				    		evevPlace: dijit.byId('evevPlace').get('value')
			    		},
			    		load: function(response){
			    			editedItem = itemEdit.item;
			    			editedItem.summary = response.event.evetSummary;
			    			editedItem.startTime = response.event.evevStartDate;
			    			editedItem.endTime = response.event.evevEndDate;
			    			editedItem.allDay = editedItem.allDay;
			    			editedItem.calendar = 'Calendar1';
							calendar.store.remove(itemEdit.item.id);
						    calendar.store.put(editedItem);
			    		}
		    	    }
				    dojo.xhrPost(xhrArgs);
				} else {
					dijit.byId('eventForm').validate();
				}
			}
		}, "save-event-btn").startup();

		var deleteEventBtn = new Button({
			label : "Borrar",
			onClick : function(e) {
			    var xhrArgs = {
		    		url: "/events/delete",
		    		handleAs: "json",
		    		sync: true,
		    		content: {
		    			eveiId: itemEdit.item.id,
		    		}
	    	    }
			    dojo.xhrPost(xhrArgs);
			    calendar.store.remove(itemEdit.item.id);
			    dijit.byId('eventForm').reset();
			}
		}, "delete-event-btn").startup();

		myData = new dojo.data.ItemFileWriteStore({url:"/events/get-all", urlPreventCache:true});
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

		var itemEdit;

		calendar.on("itemClick", function(e) {
			itemEdit = e;
		    getEvent(itemEdit.item.id);
		});

		function getEvent(eveiId){
		    var xhrArgs = {
	    		url: "/events/get/"+eveiId,
	    		handleAs: "json",
	    		sync: true,
	    		load: function(response){
	    			dijit.byId('eveiId').set('value', response.eveiId);
	    			dijit.byId('evetSummary').set('value', response.evetSummary);
	    			dijit.byId('startDate').set('value', response.startDate);
	    			dijit.byId('startHour').set('value', response.startHour);
	    			dijit.byId('endDate').set('value', response.endDate);
	    			dijit.byId('endHour').set('value', response.endHour);
	    			dijit.byId('evevPlace').set('value', response.evevPlace);

	    			dijit.byId('eventForm').validate();
	    		}
    	    }

		    dojo.xhrGet(xhrArgs);
		}

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
		    	//TODO
		    	//console.log(response.status);
		    });

		    itemEdit = e;
		    getEvent(itemEdit.item.id);
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

		    getEvent(newId);

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