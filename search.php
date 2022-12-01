<?php 
include("/configuration.php");

$searchTerm = $_GET['searchTerm'];

if($_GET['method'] == "search"){
    getMovies($searchTerm);
} elseif($_GET['method'] == "details"){
    getMovieDetails($_GET['id']);
}


function getMovies($searchTerm){
    //TODO Log the search
    //logSearch($searchTerm);
    
    // encode spaces
    $searchTerm = str_replace(" ", "%20", $searchTerm);
    
    //Call the Movie DB API
    $url = "search/movie?api_key=" . TMDBapiKey . "&query=" . $searchTerm;
    $ch = curlSetup($url);
    $results = curl_exec($ch);
    curl_close($ch);

    echo $results;
}

function getMovieDetails($id){
    //TODO Log the search
    //logSearch($searchTerm);
        
    //Call the Movie DB API
    $url = "movie/". $id ."?api_key=" . TMDBapiKey;
    $ch = curlSetup($url);
    $results = curl_exec($ch);
    curl_close($ch);

    echo $results;
}

function curlSetup($url){
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, TMDBUrl . $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json'
    ));
    //no SSL cert on localhost
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
    if(curl_errno($ch)){
        echo 'Request Error:' . curl_error($ch);
    }
    
    return $ch;
}

//TODO implement DB
// function logSearch($searchTerm){
//     $ipAddress = $_GET['ipAddress'];
    
//     $conn = new mysqli(DBServer, DBUsername, DBPass, DBDatabase);
    
//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }

//     $stmt = $conn->prepare("INSERT INTO activityLog (date, searchTerm, IPaddress) VALUES (NOW(), ?, ?)");
//     $stmt->bind_param("ss", $searchTerm, $ipAddress);
//     $stmt->execute();  
//     $stmt->close();
//     $conn->close();
// }

