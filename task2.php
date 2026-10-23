
<?php
$cities = [
    "Japan" => "Tokyo",
    "Mexico" => "Mexico City",
    "USA" => "New York City",
    "India" => "Mumbai",
    "Korea" => "Seoul",
    "China" => "Shanghai",
    "Nigeria" => "Lagos",
    "Argentina" => "Buenos Aires",
    "Egypt" => "Cairo",
    "England" => "London"
];

echo "<h3>Cities and Countries</h3>";
echo "<ul>";

foreach ($cities as $country => $city) {
    echo "<li>$city is in $country</li>";
}

echo "</ul>";
?>
