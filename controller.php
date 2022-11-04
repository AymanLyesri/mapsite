<?php

class Client
{
    private $name;
    private $login;
    private $email;
    private $password;

    public function __construct($name, $login, $email, $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->email = $email;
        $this->password = $password;
    }

    private function connection()
    {
        $v = new PDO('mysql:host=localhost;dbname=mapsite', 'root', '');
        return $v;
    }

    public function authentication($login, $password)
    {
        $v = $this->connection();

        $sql = "SELECT * FROM `client` WHERE `login`='$login' AND `password`='$password'";
        $st = $v->prepare($sql);
        $st->execute();
        foreach ($st as $column) {
            if ($column[2] == $login && $column[4] == $password) {   //from 0 to .......
                header("location:page.php?login=$column[2]");
            } else {
                echo "you're not registered!!!";
            }
        }
    }

    public function register()
    {
        $v = $this->connection();
        $sql = "INSERT INTO `client` (`name`,`login`,`email`,`password`) VALUES ('$this->name','$this->login','$this->email','$this->password')";
        $exe = $v->prepare($sql);
        $exe->execute();
    }
}

class restaurant
{

    public function connection()
    {
        $v = new PDO('mysql:host=localhost;dbname=mapsite', 'root', '');
        return $v;
    }

    public function map()
    {
        $v = $this->connection();
        $sql = "SELECT * FROM `restaurants`";
        $exe = $v->prepare($sql);
        $exe->execute();

        echo "<script type='text/javascript'>
        var layer = new ol.layer.Vector({
  source: new ol.source.Vector({
    features: [";
        foreach ($exe as $column) {
            echo "new ol.Feature({
            geometry: new ol.geom.Point(ol.proj.fromLonLat([" . $column[2] . "])),
      }),";
        }
        echo "
    ],
  }),
  style: style,
});
map.addLayer(layer);
    </script>";
    }

    public function map_one($id)
    {

        $v = $this->connection();
        $sql = "SELECT * FROM `restaurants` WHERE `id`='$id'";
        $exe = $v->prepare($sql);
        $exe->execute();

        echo "<script type='text/javascript'>
        var layer = new ol.layer.Vector({
  source: new ol.source.Vector({
    features: [";
        foreach ($exe as $column) {
            echo "new ol.Feature({
            geometry: new ol.geom.Point(ol.proj.fromLonLat([" . $column[2] . "])),
      }),";
        }
        echo "
    ],
  }),
  style: style,
});
map.addLayer(layer);
    </script>";
    }

    public function map_init($id)
    {
        $v = $this->connection();
        $sql = "SELECT * FROM `restaurants` WHERE `id`='$id'";
        $exe = $v->prepare($sql);
        $exe->execute();

        echo "<script type='text/javascript'>
        var map = new ol.Map({
  target: 'map',
  controls: ol.control.defaults({ attribution: false }),
  layers: [
    new ol.layer.Tile({
      source: new ol.source.OSM(),
    }),
  ],
  view: new ol.View({";
        foreach ($exe as $column) {
            echo "center: ol.proj.fromLonLat([" . $column[2] . "]),";
        }
        echo "zoom: 7,
  }),
});
var style = new ol.style.Style({
  image: new ol.style.Circle({
    radius: 5,
    fill: new ol.style.Fill({
      color: '#000000',
    }),
  }),
});

var container = document.getElementById('popup');
var content = document.getElementById('popup-content');
var closer = document.getElementById('popup-closer');

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
        </script>";
    }

    public function display()
    {
        $v = $this->connection();

        $sql = "SELECT * FROM `restaurants`";
        $exe = $v->prepare($sql);
        $exe->execute();

        echo "<style>";
        echo "table{border:3px solid white;width:100%;} td{border:3px solid white;width:50%}";
        echo "</style>";

        echo "<div class='container-fluid h-25 w-50 align-self-center text-white'><table><tr><td style='color:yellow'>name</td><td style='color:yellow'>location</td></tr>";
        foreach ($exe as $column) {
            echo "<tr><td>" . $column[1] . "</td><td>" . $column[2] . "</td><td><a href='restaurant_select.php?id=" . $column[0] . "'>Voir detaille</a></td></tr>";
        }
        echo "</table></div>";
    }

    public function display_one($id)
    {
        $v = $this->connection();

        $sql = "SELECT * FROM `restaurants` WHERE `id`='$id'";
        $exe = $v->prepare($sql);
        $exe->execute();

        echo "<style>";
        echo "table{border:3px solid white;width:100%;} td{border:3px solid white;width:50%}";
        echo "</style>";

        echo "<div class='container-fluid h-25 w-50 align-self-center text-white'><table><tr><td style='color:yellow'>name</td><td style='color:yellow'>location</td></tr>";
        foreach ($exe as $column) {
            echo "<tr><td>" . $column[1] . "</td><td>" . $column[2] . "</td></tr>";
        }
        echo "</table></div>";
    }
}