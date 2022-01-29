// Creating map options
let mapDiv = document.getElementById('map');
// config map
let config = {
    minZoom: 7,
    maxZomm: 9
};
// magnification with which the map will start
const zoom = 9;
// co-ordinates
const lat = 40.17887331434696;
const lon = 44.5001220703125;

// calling map
const map = L.map("map", config).setView([lat, lon], zoom);

// Used to load and display tile layers on the map
// Most tile servers require attribution, which you can set under `Layer`
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
        '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// add marker on click
let x = document.getElementById('x_coord');
let y = document.getElementById('y_coord');
const addMarkerButton = (event) => {
    map.on("click", addMarker);
    mapDiv.classList.add('map_cursor');

    function addMarker(e) {


        // Add marker to map at click location
        const markerPlace = document.querySelector(".marker-position");
        markerPlace.textContent = `new marker: ${e.latlng.lat}, ${e.latlng.lng}`;
        x.setAttribute('value', e.latlng.lat)
        y.setAttribute('value', e.latlng.lng)



        const marker = new L.marker(e.latlng, {
            draggable: true
        })
            .addTo(map)
            .bindPopup(buttonRemove);

        // event remove marker

        marker.on("click", removeMarker);
        // event dragged marker
        marker.on("dragend", dragedMaker);
    }

}

const buttonRemove =
    '<span class="remove">Вы действительно хотите удалить маркер?</span>';

// remove marker


function removeMarker() {
    const marker = this;
    const btn = document.querySelector(".remove");

    let bt = document.getElementById('bt')
    btn.addEventListener("click", function () {
        const markerPlace = document.querySelector(".marker-position");
        markerPlace.textContent = "goodbye marker 💩";
        map.removeLayer(marker);
    });
}


// draged
function dragedMaker() {
    const markerPlace = document.querySelector(".marker-position");
    markerPlace.textContent = `change position: ${this.getLatLng().lat}, ${
        this.getLatLng().lng
    }`;
}

let menu = document.querySelector('.menu')
let lists = document.querySelector('.lists')
//Показ карты
const showMap = (event) => {
    menu.classList.add('show_menu')
    lists.classList.remove('show_list')
}
//Показать список
const showList = (event) => {
    menu.classList.add('hide')
    menu.classList.remove('show_menu')
    lists.classList.add('show_list')
}

//Добавление значение latLng в форму
let title = document.getElementById('title');
let description = document.getElementById('description');

const warningTitle = (event) => {
    if (title.value === '') {
        let warn = document.getElementById('warningTitle');
        warn.classList.add('d-block')
    } else {
        let warn = document.getElementById('warningTitle');
        warn.classList.remove('d-block')
    }


}
const warningDescription = (event) => {
    if (description.value === '') {
        let desc = document.getElementById('warningDescription');
        desc.classList.add('d-block')
    } else {
        let desc = document.getElementById('warningDescription');
        desc.classList.remove('d-block')
    }

}
const drawMarkers = (data) =>{

}

const funcSuc = (data) =>{
    console.log(data)
    drawMarkers(data)
}

let submit = document.getElementById('submit');
submit.addEventListener('click', (event)=>{
    console.log('Маркер сохранен!');
    $.ajax({
        url: "../php/val.php",
        type: "POST",
        data: ({arr: null}),
        success: funcSuc
    });
})

