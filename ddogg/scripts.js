/* scripts.js */

/*
General layout

[ JSON CALL ] --> [ MAIN JSON OBJECT ]--------------> [ ACTUAL DISPLAY DATA ]
	|															^
	*-----------> [ MAIN INDEXED SEARCH TERMS ] ---> [ FILTERED SEARCH TERMS ]
																^
[ SEACH / FILTER PARAMS ] --------------------------------------*


/* Search
	Regular expression for each word seached in query.
	Relevance added if word is found.
	Ordered by relevance.
	Can be further filtered by system.
*/

/* Filtering
	Filtering can be done through UI elements
	As result returns change, update elements to remove ones that are not allowed any more.
	Any that are selected, can be de-selected as wanted.
	Though no guarrentee that any more results will be returned.
*/

/* Master State is our first return of the jobboard from the AJAX query, it's private so we can ensure it always stays the same.

State in MainApp is our current state used in the REACT stuff 
When we update the main state, tell react by calling Jobcontainer.loadJobs - Except this doesn't work.
We can apparently use Observible objects in React, which function like private global objects that automagically update the state when changed.  Check that out

We could also do all the event handling within React, which might solve the issue.  We run the remove code, which updates the currentState and then call the update state option?
*/

/* jQuery(document).ready(function() {
	var apiCallUri = 'http://www.mycompas.com/staff/jsonjobsv3.aspx';
	var apiKey = 'yXh8YGI0qaF4K3QEgX8U1w==';
	var refLoc = 'localhost';
	
	$$ = {
		
		
	};
	
	mainApp = {
		
		data_masterData : { },
		data_masterIndexList : { },
		data_displayData : { },
		
		init : function() {
			mainApp.requestJobs();
		},
		
		requestJobs : function() {
			$.ajax({
				type : 'GET',
				url : apiCallUri + '?ID=' + apiKey + '&refloc=' + refLoc + '&proc=getalljobs',
				contentType : 'application/json',
				dataType : 'jsonp',
				success : mainApp.callSuccess,
				error : mainApp.callFail
			});
			
			$.ajax({
				type : 'GET',
				url : 'http://localhost:81/60degrees/testdata.json',
				contentType : 'application/json',
				dataType : 'json',
				success : mainApp.callSuccess,
				error : mainApp.callFail
			});
			console.log('performing JSON call');
		},
		
		callSuccess : function(data) {
			console.log('success');
			console.log(data);
			
			var jobs = [];
			
			$.each(data, function(k, v) {
				jobs.push('<div class="job-"' + k + '">' + v.Name + '</div>');
			});
			
			$('<div />', {
				'class' : 'new-list',
				html : jobs.join('')
			}).appendTo('body');
		},
		
		callFailure : function(e) {
			console.log('error');
			console.log(e.message);
		},
		
		updateResults : function() {
			
		},
		buildResults : function() {
			
		}
	};
	
}); */

/* The return will be;

{
	"Region": "ABC Corp",
	"Office": null,
	"PayMin": "40.00",
	"PayMax": "60.00",
	"PayActual": "55.00",
	"Owner": null,
	"JobType": "Permanent",
	"SendFriend": null,
	"Location": null,
	"JobID": "ES6596816",
	"ReqID": "ES6548816",
	"JobDate": "1/6/2015",
	"JobCountry": "US",
	"JobState": "GA",
	"JobDesc_HTML": "HTML-FORMATTED JOB DESCRIPTION TEXT WILL BE HERE",
	"JobDesc_TEXT": "UN-FORMATTED JOB DESCRIPTION TEXT WILL BE HERE",
	"Category": "Select One",
	"Name": "Senior Java Developer",
	"Description": "Category: Select One - Location: Atlanta GA",
	"JobCity": "Atlanta",
	"Department": "",
	"Division": "",
	"Link": "https://buildname.mycompas.com/corp/consol_careers/careers_source.aspx?ref=\u0026jbID=null\u0026extref=null\u0026extu=null\u0026uri=localhost?cjobid=JU6549916",  JOB DESC
	"ApplyLink": "http:// buildname.mycompas.com/corp/consol_careers/webapply_if.aspx?ID=97645\u0026ref=",   APPLY PAGE
	"ApplyLinkSSL": "https://buildname.myompas.com/corp/consol_careers/webapply_if.aspx?ID=97645\u0026ref=",  APPLY PAGE (HTTPS)
	"BoardName": "Main Job Board"
 }
 
 */