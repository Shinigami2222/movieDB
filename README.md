Introduction -
The Movies App is a simple web application built using PHP that allows users to search for movies using the TMDB (The Movie Database) API and displays detailed information about each movie, including its title, release date, genres, and plot.

Features - 
Movie Search: Users can enter the title of a movie they want to search for in the provided search bar.

Display Movie Information: The app fetches data from the TMDB API and displays movie information such as title, release date, genres, and plot.

Prerequisites - 
To use the Movies App, you will need the following:

Web server (e.g., Apache) with PHP support.
TMDB API key: Obtain an API key from the TMDB website.
Installation
Clone or download the Movies App code to your local web server directory.

Replace 'YOUR_TMDB_API_KEY' in the movies.php file with your actual TMDB API key.

Usage - 
Enter the title of the movie you want to search for in the search bar and click the "Search" button.

The app will fetch data from the TMDB API and display the search results, including movie titles, release dates, genres, and plots.

If no results are found for the search query, a message will be displayed indicating that no results were found.

File Structure - 
The Movies App consists of the following files:

index.php: The main file that contains the HTML structure, the movie search form and the  PHP file that handles the movie search form submission and displays the movie information.

style.css: The CSS file that contains the styling for the app.

script.js: The JavaScript file that contains client-side functionality (show/hide loading modal). (Optional: Not used in the current version.)

API Integration - 
The Movies App integrates with the TMDB API to fetch movie data. The API is called when the user submits the movie search form. The API request is made using PHP's file_get_contents function, and the retrieved JSON response is parsed using json_decode.

Styling - 
The app's styling is defined in the style.css file. It includes styles for the navbar, movie details section, loading modal.

Conclusion - 
The Movies App is a simple yet powerful tool to search for movies and get detailed information using the TMDB API. It can be further expanded and enhanced with more features to provide a richer movie searching experience for users.
