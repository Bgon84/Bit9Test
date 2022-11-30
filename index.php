<html>

    <head>
    	<title>PHP Test</title>
    	<script src="https://code.jquery.com/jquery-3.6.1.min.js" 
    			integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" 
    			integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" 
    			crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    	<script src="js/main.js"></script>
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap-grid.min.css" 
    			integrity="sha512-Aa+z1qgIG+Hv4H2W3EMl3btnnwTQRA47ZiSecYSkWavHUkBF2aPOIIvlvjLCsjapW1IfsGrEO3FU693ReouVTA==" 
    			crossorigin="anonymous" referrerpolicy="no-referrer" />
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    			integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    	<style>
    	   #resultsTable tbody tr{
    	       cursor:pointer;
    	   }
    	</style>
    </head>
    
    <body>
        <header>   
            <div class="p-5 text-center bg-light">
            	<h1 class="mb-3">Welcome to Bryan's Movie Info!</h1>
            	<h4 class="mb-3">Search for your movie below</h4>
            </div>
        </header>

        <div class="container" id="searchDiv">
        	<form id="searchForm">
              	<div class="form-group">
                	<input type="text" class="form-control" id="searchInput" aria-describedby="search" 
                		placeholder="Enter Search Term">
                  	<input type="hidden" id="ipAddress" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
                </div>
                <div class="form-group">
                	<button type="button" class="btn btn-primary btn-lg btn-block" id="searchSubmitBtn" onclick="getSearchResults()">Search</button>
              	</div>              	
        	</form>
        </div>
        
        <div class="container" id="resultsDiv">        
           	<table class="table" id="resultsTable">
           		<thead class="thead-light">
           			<tr>
               			<th>Name</th>
               			<th>Year of Release</th>
           			</tr>
           		</thead>
           		<tbody><!-- Search Results will populate here --></tbody>
           	</table>
        </div>
        
        <div class="container" id="noResultsDiv">
        	<p>No Results Found</p>
        </div>
        
        <div class="container" id="detailsDiv">
        	<table class="table" id="detailsTable">
        		<thead>
        			<tr>
        				<th>Poster</th>
        				<th>Synopsis</th>
        				<th>Genre(s)</th>
        			</tr>        			
        		</thead>
        		<tbody><!-- Details will populate here --></tbody>
        	</table>
        </div>
        
    </body>
    
</html>