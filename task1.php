<?php
$cities = [
    "Tokyo", "Mexico City", "New York City",
    "Mumbai", "Seoul", "Shanghai", "Lagos",
    "Buenos Aires", "Cairo", "London"
];

// Print cities separated by commas
echo "<h3>Original Cities</h3>";

for ($i = 0; $i < count($cities); $i++) {
    echo $cities[$i];

    if ($i < count($cities) - 1) {
        echo ", ";
    }
}

// Sort alphabetically
sort($cities);

// Print ordered list
echo "<h3>Sorted Cities</h3>";
echo "<ol>";

foreach ($cities as $city) {
    echo "<li>$city</li>";
}

echo "</ol>";

// Add four new cities
$cities[] = "Los Angeles";
$cities[] = "Calcutta";
$cities[] = "Osaka";
$cities[] = "Beijing";

// Sort again
sort($cities);

// Print unordered list
echo "<h3>Updated Cities</h3>";
echo "<ul>";

foreach ($cities as $city) {
    echo "<li>$city</li>";
}

echo "</ul>";
?>
