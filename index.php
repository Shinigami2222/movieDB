<!DOCTYPE html>
<html>
<head>
    <title>Movies Database</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <div class="navbar-left">
            <h1>Movies Database</h1>
        </div>
        <div class="navbar-right">
            <form method="GET" onsubmit="showLoadingModal()">
                <input type="text" name="search_query" id="search_query" required>
                <input type="submit" value="Search">
            </form>
        </div>
    </div>

    <div class="container" id="movieContainer">
        <?php
        function fetchMovieDetails($imdbID) {
            $api_key = 'f5555403';
            $api_url = 'https://www.omdbapi.com/?apikey=' . $api_key . '&i=' . urlencode($imdbID);
            $response = file_get_contents($api_url);
            return json_decode($response, true);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['search_query'])) {
                $search_query = $_GET['search_query'];
                $api_key = 'f5555403'; 
                $api_url = 'https://www.omdbapi.com/?apikey=' . $api_key . '&s=' . urlencode($search_query);

                $response = file_get_contents($api_url);
                $movie_data = json_decode($response, true);

                if (isset($movie_data['Search']) && count($movie_data['Search']) > 0) {
                    echo '<h2>Search Results for: ' . $search_query . '</h2>';
                    foreach ($movie_data['Search'] as $movie) {
                        $movie_details = fetchMovieDetails($movie['imdbID']);

                        echo '<div class="movie-item">';
                        if (!empty($movie_details['Poster']) && $movie_details['Poster'] !== 'N/A') {
                            echo '<div class="movie-poster"><img src="' . $movie_details['Poster'] . '"></div>';
                        } else {
                            echo '<div class="movie-poster"><img src="no_image_available.jpg"></div>';
                        }
                        echo '<div class="movie-details">';
                        echo '<h3>' . $movie['Title'] . '</h3>';
                        echo '<p><strong>Year:</strong> ' . $movie_details['Year'] . '</p>';
                        echo '<p><strong>Type:</strong> ' . $movie_details['Type'] . '</p>';
                        echo '<p><strong>IMDb Rating:</strong> ' . $movie_details['imdbRating'] . '</p>';
                        echo '<p><strong>Plot:</strong> ' . $movie_details['Plot'] . '</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No results found for: ' . $search_query . '</p>';
                }
            }
        }
        ?>
    </div>

    <!-- Loading modal -->
    <div class="loading-modal" id="loadingModal">
        <div class="loading-text">Loading...</div>
    </div>

    <script src="script.js"></script> <!-- Include the script.js file -->
</body>
</html>