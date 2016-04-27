/* ---------- OLD BITS -----------------
General layout

[ JSON CALL ] --> [ MAIN JSON OBJECT ]--------------> [ ACTUAL DISPLAY DATA ]
	|															^
	*-----------> [ MAIN INDEXED SEARCH TERMS ] ---> [ FILTERED SEARCH TERMS ]
																^
[ SEACH / FILTER PARAMS ] --------------------------------------*


/* Search
	Regular expression for each word seached in query. [50% - NEED TO ADD SEARCHING IN DESC]
	Relevance added if word is found. [TODO]
	Ordered by relevance.
	Can be further filtered by system. [TODO]
*/

/* Filtering
	Filtering can be done through UI elements
	As result returns change, update elements to remove ones that are not allowed any more.
	Any that are selected, can be de-selected as wanted.
	Though no guarrentee that any more results will be returned.
*/

/* ------------------------------------------------------- */

/*
	MasterState is our first return of the jobboard from the AJAX query, it's private so we can ensure it always stays the same.
	CurrentState is the current state of the jobboard, with changes from our filtering.  It's private, so we need to use the getter and setting objects to get the data (for convenience more than anything else)
	
We use the global var to perform an update state callback when the current state updates thanks to filtering.  We can then also run animation events within these callbacks (probably)

Now we need indexes for data searching.  Let's do one for JobType, since we can easily create the components for that.
We'll need two states for the current index list, the master list and the current list I think. 

Pull all JobTypes into an array and display selectors on the main page.  As they are selected, update the state to only show the jobs with that set as a JobType
Run through the current state object and put only those with the correct jobType into a new array which we set as the current state. */

var globalVar = {};

// The base state of the job board
var MasterState = (function() {
	var state = [];
	
	function updateState(data) {
		state = data;
	};
	
	return {
		setState : function(data) {
			updateState(data);
		},
		getState : function() {
			return state;
		}
	};
})();

// The current state of the job board
var CurrentState = (function() {
	var state = [];
	
	function updateState(data) {
		state = data;
		
		MainApp.createLocationFilters(); // We create the filters each time we update the state.
		
		globalVar.updateJobsCallback(data); // Every time we update the state, run the React callback
	};
	
	return {
		setState : function(data) {
			updateState(data);
		},
		getState : function() {
			return state;
		},
		resetState : function() {
			updateState(MasterState.getState());
		}
	};
})();

// The current filters
var Filters = (function() {
	var locFilter = [];
	
	function updateFilters(data) {
		locFilter = data;
		
		globalVar.updateLocsCallback(locFilter);
	};
	
	return {
		setState : function(data) {
			updateFilters(data);
		},
		getState : function() {
			return locFilter;
		}
	};
})();

var MainApp = {
	state : [],
	
	init : function() {
		MainApp.updateJobBoard();
		MainApp.createSelectors();
	},
	
	createSelectors : function() {
		// console.log('uh?');
		
		jQuery('#js-remove-odds').on('click', { index : 1, n : 2}, MainApp.removeNFromResults);
		jQuery('#js-remove-evens').on('click', { index : 0, n : 2}, MainApp.removeNFromResults);
		jQuery('#js-reset-state').on('click', CurrentState.resetState);
		
		jQuery('#performSearch').on('click', MainApp.searchTitles);
		
		jQuery('#displayData').on('click', function() {
			console.log(Filters.getState());
		});
		
		jQuery('#react__locfilter').on('click', '#filterByLoc', MainApp.locFilter);
	},
	
	locFilter : function(e) {
		e.preventDefault();
		
		var state = MasterState.getState(); // We search through the masterstate for matches, but we need to then apply further filters.
		var returnState = [];
		var regexs = [];
		
		var locFilters = jQuery('#locFilterListForm').serializeArray();
		
		console.log(locFilters);
		
		if(locFilters.length > 0) {
			
			if(locFilters.length == 1) {
				console.log('one search');
				console.log(locFilters[0]['value']);
				var regExp = new RegExp(RegExp.escape(locFilters[0]['value']), 'i');
				
				for(var i = 0; i < state.length; i++) {
					console.log(i, state[i]['JobCountry']);

					if(regExp.test(state[i]['JobCountry'])) {
						// We match the regExp
						returnState.push(state[i]);
					}
				}
				
				console.log(returnState);
				CurrentState.setState(returnState);
				
			} else {
				console.log('multiple search');
				jQuery.each(locFilters, function(i, v) {
					regexs.push('(' + v.value + ')');
				});
				
				var regExp = new RegExp(regexs.join('|'), 'i');
				
				for(var i = 0; i < state.length; i++) {
					console.log(i, state[i]['JobCountry']);

					if(regExp.test(state[i]['JobCountry'])) {
						// We match the regExp
						returnState.push(state[i]);
					}
				}
				
				CurrentState.setState(returnState);
			}
			
		} else {
			CurrentState.resetState();
		}
	},
	
	removeNFromResults : function(e) {
		var state = CurrentState.getState();
		var returnState = [];

		console.log(state);

		for(var i = e.data.index; i < state.length + e.data.index; i++) {
			if(!(i % e.data.n)) {
				console.log('Adding array object ', i);
				returnState.push(state[i]);
			}
		}
		console.log(returnState);

		CurrentState.setState(returnState);
	},
	
	searchTitles : function(e) {
		var searchVal = jQuery('#s').val();
		
		if(searchVal.length > 0) {
			var state = MasterState.getState(); // We search through the masterstate for matches, but we need to then apply further filters.
			var returnState = [];
			var regExp = new RegExp(RegExp.escape(searchVal), 'i');
			
			console.log(state);
			console.log(regExp);

			for(var i = 0; i < state.length; i++) {
				console.log(i, state[i]['Name']);
				
				if(regExp.test(state[i]['Name'])) {
					// We match the regExp
					console.log('Adding array object ', i);
					returnState.push(state[i]);
				}
			}
			console.log(returnState);

			CurrentState.setState(returnState);
			
		} else {
			console.log('search is empty');
			CurrentState.resetState(); // But we need to apply further filters to this result.
		}
	},
	
	createLocationFilters : function() {
		var state = CurrentState.getState();
		var returnFilters = [];
		
		for(var i = 0; i < state.length; i++) {
			var tempObj = {
				'location' : state[i]['JobCountry'],
				'index' : i
			};
			
			returnFilters.push(tempObj); // Put all countries in a list
		}
		// then remove all dupes from the list
		
		console.log(returnFilters);
		
		// then return a new state for the filter options
		Filters.setState(returnFilters, 'locs');
	},
	
	updateJobBoard : function() {
		var rssId = 'yXh8YGI0qaF4K3QEgX8U1w==';
		var refLoc = '';
		var buildId = ''
		
		$.ajax({
			type : 'GET',
			// url : 'http://www.steveferrar.com/60degrees.com/ddogg/testdata.json',
			// url : 'http://localhost:81/60degrees/testdata.json',
			// url : 'http://www.mycompas.com/staff/jsonjobsv3.aspx?ID=' + rssId + '&proc=getalljobs', /*  + '&refloc=' + refLoc */
			url : 'http://localhost:81/60degrees.com/wordpress/wp-content/themes/60degrees/data/testdata.json',
			
			cache : false,
			contentType : 'application/json',
			dataType : 'json',
			success : function(data) {
				MasterState.setState(data);
				CurrentState.setState(data);
				
				console.log(MasterState.getState());
				console.log(CurrentState.getState());
			},
			error : function(xhr, status, err) {
				console.error(status, err.toString());
			}
		});
		console.log('performing JSON call');
	},
}

jQuery(document).ready(function() {
	MainApp.init();
});

var Jobcontainer = React.createClass({
	loadJobs : function() {
		this.setState({data : CurrentState.getState()});
	},
	
	getInitialState : function() {
		return {data : []};
	},
	
	componentDidMount : function() {
		this.loadJobs();
		setInterval(this.loadJobs, this.props.pollInterval);
	},
	
	componentWillMount() {
		globalVar.updateJobsCallback = (data) => {
			this.setState({data : CurrentState.getState()});
		};
	},
	
	render: function() {
		return (
			<JobsList data={this.state.data} />
		);
	}
});

var JobsList = React.createClass({
	render : function() {
		var jobNode = this.props.data.map(function(job) {
			return (
				<Job data={job} key={job.ReqID} />
			);
		});
		
		return (
			<div>
				{jobNode}
			</div>
		);
	}
});

var Job = React.createClass({
	jobTypeCheck : function() {
		if(this.props.data.JobType === 'Temporary') {
			return <span className="temporary">{this.props.data.JobType}</span>;
		} else if(this.props.data.JobType === 'Part Time') {
			return <span className="part-time">{this.props.data.JobType}</span>;
		} else {
			return <span className="full-time">{this.props.data.JobType}</span>;
		};
	},
	
	render : function() {
		var classes = "job-" + this.props.data.JobID;
		
		return (
			<article className={classes}>
				<a href="#" className="job__thumbnail">
					<img src="http://placehold.it/250x250" alt="" />
				</a>
				<div className="job__details">
					<h4 className="job__details-title">
						<a href="#">{this.props.data.Name}</a>
						{this.jobTypeCheck()}
					</h4>
					<p className="job__details-meta">
						<a href="#" className="job__details-company"><i className="fa fa-suitcase" aria-hidden="true"></i> {this.props.data.Region}</a>
						<a href="#" className="job__details-location"><i className="fa fa-map-marker" aria-hidden="true"></i> {this.props.data.JobCity}, {this.props.data.JobState}, {this.props.data.JobCountry}</a>
					</p>
					<p className="job__details-description">{this.props.data.JobDesc_TEXT}</p>
				</div>
			</article>
		);
	}
});

var LocationFilterContainer = React.createClass({
	loadLocs : function() {
		this.setState({data : Filters.getState()});
	},
	
	getInitialState : function() {
		return {data : []};
	},
	
	componentDidMount : function() {
		this.loadLocs();
		setInterval(this.loadLocs, this.props.pollInterval);
	},
	
	componentWillMount() {
		globalVar.updateLocsCallback = (data) => {
			this.setState({data : Filters.getState()});
		};
	},
	
	render : function() {
		return (
			<div className="jobs__filter locFilterList">
				<h5>Location</h5>
				<LocationFilterList data={this.state.data} />
			</div>
		);
	}
});

var LocationFilterList = React.createClass({
	render : function() {
		var locFilterNode = this.props.data.map(function(locFilter) {
			return (
				<LocationFilters data={locFilter} key={locFilter.index} />
			);
		});
		
		return (
			<form id="locFilterListForm">
				{locFilterNode}
				<button id="filterByLoc">Filter</button>
			</form>
		);
	}
});

var LocationFilters = React.createClass({
	render : function() {
		var classes = "loc-" + this.props.data.index;
		
		// console.log(this.props.data);
		
		return (
			<span><input type="checkbox" className={classes} id={classes} name="location" value={this.props.data.location} /><label htmlFor={classes}>{this.props.data.location}</label></span>
		);
	}
});

ReactDOM.render(
	<Jobcontainer pollInterval="10000" />,
	document.getElementById('react__jobs-container')
);
ReactDOM.render(
	<LocationFilterContainer pollInterval="10000" />,
	document.getElementById('react__locfilter')
);

// Helper functions
// RegExp has no normal escape function, so we need to escape the user input with this function.
RegExp.escape = function(s) {
	return s.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
};
