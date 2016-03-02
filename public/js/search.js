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
		var searchBtn = new Button({
			label : "Buscar Paciente",
			onClick : function(e) {
				if (dijit.byId('searchForm').isValid()){
				    var xhrArgs = {
			    		url: "/patient/search",
			    		handleAs: "json",
			    		sync: true,
			    		content: {
			    			searchField: dijit.byId('searchField').get('value'),
			    		},
			    		load: function(response){
			    			searchResults = dom.byId('searchResults');
			    			searchResults.innerHTML = response.html;
			    			console.log(response);
			    		}
		    	    }
				    dojo.xhrPost(xhrArgs);
				} else {
					dijit.byId('searchForm').validate();
				}
			}
		}, "search-btn").startup();
	})
});

function showSearchResults()
{
	require(["dojo/dom", "dojo/dom-style"], function(dom, domStyle) {
		searchResults = dom.byId('searchResults');
		calendar = dom.byId('mainCalendar');
		domStyle.set(calendar, 'display', 'none');
		domStyle.set(searchResults, 'display', 'block');
	});
}