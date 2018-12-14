var current_val = 0;
var movie_names = [
    "The Time Machine (2002)",
    "3 Idiots (2009)",
    "Interstellar (2014)",
    "Inception (2010)",
    "Cars (2006-2017)",
    "Miracle on 34th Street (1947)",
    "The Dark Knight Trilogy"
];

var movie_images = [
    "thetimemachine.jpg",
    "3idiots.jpg",
    "interstellar.jpeg",
    "inception.jpg",
    "cars.jpg",
    "miracleon34thstreet.jpg",
    "thedarkknighttrilogy.jpeg",
];
function change_movie(val){
    current_val += val;
    if(current_val < -2) current_val = movie_images.length-3;
    if(current_val > movie_images.length-3) current_val = -2;
    document.getElementById("moviename").innerText = movie_names[current_val+2];
    document.getElementById("movieimage1").src = "movies/".concat(movie_images[current_val]);
    document.getElementById("movieimage2").src = "movies/".concat(movie_images[current_val+1]);
    document.getElementById("movieimage3").src = "movies/".concat(movie_images[current_val+2]);
    document.getElementById("movieimage4").src = "movies/".concat(movie_images[current_val+3]);
    document.getElementById("movieimage5").src = "movies/".concat(movie_images[current_val+4]);
}