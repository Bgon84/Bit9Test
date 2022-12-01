$( document ).ready(function() {

	$('#resultsDiv').css('display', 'none');
	$('#noResultsDiv').css('display', 'none');
	$('#detailsDiv').css('display', 'none');
	
	// prevent Enter from doing anything because of onClick on the submit button
	$("body").keypress(function(event) {
	    if (event.which === 13) {
			return false;
	    }
	});
});


function getSearchResults(){
	let searchTerm = $('#searchInput').val();
	let ipAddress = $('#ipAddress').val();
	
	//No search term entered
	if(searchTerm == ''){
		return false;
	}
	
	$.ajax({
  		method: "GET",
  		url: "search.php",
  		data: { searchTerm: searchTerm, ipAddress: ipAddress, method: "search" }
	}).done(function(response) {
		let results = JSON.parse(response)

		if(results['results'].length > 0){
			$('#resultsDiv').show();
			$('#noResultsDiv').hide();
			$('#detailsDiv').hide();
			
			// remove any previous results
			$("#resultsTable tbody tr").remove();
			
			for (let i = 0; i < results['results'].length; i++) {
				const date = new Date(results['results'][i]['release_date']);
				let year = date.getFullYear();
		
				$('#resultsTable').append('<tr onClick="getMovieDetails('+ results['results'][i]['id'] +')"><td>' 
				+ results['results'][i]['original_title'] + '</td><td>' + year + '</td></tr>');
				
				//We only want 10
				if(i>=9){
					break;
				}
			}
		} else {
			// No Results
			$('#noResultsDiv').show();
			$('#resultsDiv').hide();
			$('#detailsDiv').hide();
		}
	});
}

function getMovieDetails(id){
	
	$.ajax({
  		method: "GET",
  		url: "search.php",
  		data: {id: id, method: "details"}
	}).done(function(response) {
		let results = JSON.parse(response);
		let genreList = "";
		
		$('#resultsDiv').hide();
		$('#noResultsDiv').hide();
		$('#detailsDiv').show();
		
		// remove any previous results
		$("#detailsTable tbody tr").remove();

		// list all genres
		for(let i=0; i<results.genres.length; i++){
			genreList += results.genres[i].name + ' ';
		}
			
		$('#detailsTable tbody').append('<tr><td><img src="https://image.tmdb.org/t/p/w300/' + results.poster_path 
		+ '"/></td><td>' + results.overview + '</td><td>' + genreList + '</td></tr>');
	});
}