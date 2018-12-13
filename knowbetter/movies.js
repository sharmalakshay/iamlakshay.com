var current_val = 0;
var movie_names = [
    "The Time Machine (2002)",
    "3 Idiots (2009)",
    "Gravity (2013)",
    "Inception (2010)",
    "Cars (2006-2017)",
    "",
    "",

];

var movie_images = [
    "thetimemachine.jpg",
    "3idiots.jpg",
    "gravity.jpeg",
    "inception.jpg",
    "cars.jpg",
    "",
    "",
    "",
    "",
    "",
    "",
    "",
    
];
function change_movie(val){

    //if val in minus, make a different piece of code similar to this but which would subtract from val not plus :D
    current_val += val;
    //if(current_val < 0 || current_val > 0) current_val -= val;
    document.getElementById("moviename").innerText = movie_names[current_val+2];
    document.getElementById("movieimage1").src = "movies/".concat(movie_images[current_val]);
    document.getElementById("movieimage2").src = "movies/".concat(movie_images[current_val+1]);
    document.getElementById("movieimage3").src = "movies/".concat(movie_images[current_val+2]);
    document.getElementById("movieimage4").src = "movies/".concat(movie_images[current_val+3]);
    document.getElementById("movieimage5").src = "movies/".concat(movie_images[current_val+4]);
}