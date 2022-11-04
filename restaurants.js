/////////////////////////////////////////////////////////// MAP
var map = new ol.Map({
  target: "map",
  controls: ol.control.defaults({ attribution: false }),
  layers: [
    new ol.layer.Tile({
      source: new ol.source.OSM(),
    }),
  ],
  view: new ol.View({
    center: ol.proj.fromLonLat([-6.8498, 33.9716]),
    zoom: 7,
  }),
});

///////////////////////////////////////////////////////// LAYER
var style = new ol.style.Style({
  image: new ol.style.Circle({
    radius: 5,
    fill: new ol.style.Fill({
      color: "#000000",
    }),
  }),
});

//////////////////////////// PUP UP ////////////////////////

var container = document.getElementById("popup");
var content = document.getElementById("popup-content");
var closer = document.getElementById("popup-closer");

var overlay = new ol.Overlay({
  element: container,
  autoPan: true,
  autoPanAnimation: {
    duration: 250,
  },
});
map.addOverlay(overlay);

closer.onclick = function () {
  overlay.setPosition(undefined);
  closer.blur();
  return false;
};

//////////////////////////////////////////////////////// CLICK ON THE MARKER
