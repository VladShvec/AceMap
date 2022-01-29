// Creating map options
let mapDiv = document.getElementById('map')
// config map
let config = {
    minZoom: 7,
    maxZomm: 9
};
// magnification with which the map will start
const zoom = 9;
// co-ordinates
const lat = 40.17887331434696;
const lng = 44.5001220703125;

var map = L.map('map').setView([lat, lng], 9);
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
        '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);
// add marker on click
let x = document.getElementById('x_coord');
let y = document.getElementById('y_coord');
let marker;
const addMarkerButton = (event) => {
    mapDiv.classList.add('map_cursor');
    map.addEventListener('click', function (ev) {
        if (map.hasLayer(marker)) {
            map.removeLayer(marker);
        }
        let lat = ev.latlng.lat;
        let lng = ev.latlng.lng;
        marker = L.marker([lat, lng], {draggable: true}).addTo(map);
        marker.addTo(map);

        console.log(lat, lng)

        x.setAttribute('value', lat)
        y.setAttribute('value', lng)
    });
}
const deleteMarker = () => {
    map.addEventListener('click', function (ev) {
        map.removeLayer(marker)
    });
}
const drawMarkers = (data) => {
    data.map((item) => {
        let marker = L.marker([item.x, item.y]).addTo(map);
    })

}
const showAllMarkers = () => {
    let xhr = $.ajax({
        url: "../php/val.php",
        type: "POST",
        data: ({arr: null}),
        success: drawMarkers
    });

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
    $("tbody").load("../php/listPart.php", function() {
    });
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
let popup = document.getElementById('popup')
let main_page_content = document.getElementById('main_page_content')
const funcSuc = (data) => {
    if(title.value !== '' && description.value !== '' && x.value !== '' && y.value !== ''){
        main_page_content.classList.add('open');
        popup.classList.add('d-block');
    }
    console.log(data)

}
const agree = (event) =>{
    main_page_content.classList.remove('open');
    popup.classList.remove('d-block');
}
$("#form").on("submit", function () {
    event.preventDefault()
    $.ajax({
        url: "../php/marker_push.php",
        type: "POST",
        data: ({title: title.value, description: description.value, x: x.value, y: y.value}),
        success: funcSuc
    });

})


console.log("Все работает")