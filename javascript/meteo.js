// assigne une variable à chaque donnée a afficher

var input = document.querySelector('.input_text');
var main = document.querySelector('#name');
var temp = document.querySelector('.temp');
var desc = document.querySelector('.desc');
var clouds = document.querySelector('.clouds');
var button = document.querySelector('.submit');


button.addEventListener('click', function(name) { //action qui permet d'afficher la météo
    fetch('https://api.openweathermap.org/data/2.5/weather?q=' + input.value + '&appid={YourApiId}&lang=fr&units=metric')
        .then(response => response.json())
        .then(data => {
            var tempValue = data['main']['temp'];
            var nameValue = data['name'];
            var descValue = data['weather'][0]['description'];

            main.innerHTML = nameValue;
            desc.innerHTML = "Description - " + descValue;
            temp.innerHTML = "Température en °C - " + tempValue;
            input.value = "";

        })

    .catch(err => alert("Wrong city name!"));
})
