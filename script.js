///////////////////////////////////////////////////////////MAP
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
/////////////////////////////////////////////////////////////////
var style = new ol.style.Style({
  image: new ol.style.Circle({
    radius: 5,
    fill: new ol.style.Fill({
      color: "#000000",
    }),
  }),
});

var layer = new ol.layer.Vector({
  source: new ol.source.Vector({
    features: [
      new ol.Feature({
        geometry: new ol.geom.Point(ol.proj.fromLonLat([-6.8498, 33.9716])),
      }),
      new ol.Feature({
        geometry: new ol.geom.Point(ol.proj.fromLonLat([-6.8498, 35.9716])),
      }),
    ],
  }),
  style: style,
});
map.addLayer(layer);

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

map.on("singleclick", function (event) {
  if (map.hasFeatureAtPixel(event.pixel) === true) {
    var coordinate = event.coordinate;

    content.innerHTML = "<div></div><b>Hello world!</b><br />I am a popup.";
    overlay.setPosition(coordinate);
  } else {
    overlay.setPosition(undefined);
    closer.blur();
  }
});
///////////////////////////////////////////////////////////////F
