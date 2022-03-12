		// Paris
		var startlat = 48.85669690;
		var startlon = 2.35146160;
		var options = {
		        center: [startlat, startlon],
		        zoom: 9
		    }
		    // récupère lat et lon
		document.getElementById('lat').value = startlat;
		document.getElementById('lon').value = startlon;

		var map = L.map('map', options);
		var nzoom = 12;

		L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', { attribution: 'OSM' }).addTo(map);

		var myMarker = L.marker([startlat, startlon], { title: "Coordinates", alt: "Coordinates", draggable: true }).addTo(map).on('dragend', function() { //marqueur sur la carte
		    var lat = myMarker.getLatLng().lat.toFixed(8);
		    var lon = myMarker.getLatLng().lng.toFixed(8);
		    var czoom = map.getZoom();
		    // pour l'affichage à l'interieur de la carte
		    if (czoom < 18) { nzoom = czoom + 2; }
		    if (nzoom > 18) { nzoom = 18; }
		    if (czoom != 18) { map.setView([lat, lon], nzoom); } else { map.setView([lat, lon]); }
		    // fin de l'affichage dans la carte
		    document.getElementById('lat').value = lat;
		    document.getElementById('lon').value = lon;
		    myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup(); //pop up qui indique la lat et la lon
		});

		function chooseAddr(lat1, lng1) // met la latitude et la lon a jour 
		{
		    myMarker.closePopup();
		    map.setView([lat1, lng1], 18);
		    myMarker.setLatLng([lat1, lng1]);
		    lat = lat1.toFixed(8);
		    lon = lng1.toFixed(8);
		    document.getElementById('lat').value = lat;
		    document.getElementById('lon').value = lon;
		    myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();
		}

		function myFunction(arr) { //permet le renvoi de message d'erreur
		    var out = "<br />";
		    var i;

		    if (arr.length > 0) {
		        for (i = 0; i < arr.length; i++) {
		            out += "<div class='address' title='Show Location and Coordinates' onclick='chooseAddr(" + arr[i].lat + ", " + arr[i].lon + ");return false;'>" + arr[i].display_name + "</div>";
		        }
		        document.getElementById('results').innerHTML = out;
		    } else {
		        document.getElementById('results').innerHTML = "Sorry, no results...";
		    }
		}

		function addr_search() //fonction de recherche
		{
		    var inp = document.getElementById("addr");
		    var xmlhttp = new XMLHttpRequest();
		    var url = "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=" + inp.value;
		    xmlhttp.onreadystatechange = function() {
		        if (this.readyState == 4 && this.status == 200) {
		            var myArr = JSON.parse(this.responseText);
		            myFunction(myArr);
		        }
		    };
		    xmlhttp.open("GET", url, true);
		    xmlhttp.send();
		}