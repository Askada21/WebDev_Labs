<?php
// Display original file
echo "<h3>Original File</h3>";

$lines = file("lab6.1.txt");

foreach ($lines as $line) {
    echo htmlspecialchars($line) . "<br>";
}

// Display second file
echo "<h3>Updated File</h3>";

$content = file_get_contents("lab6.2.txt");
echo nl2br(htmlspecialchars($content));

// Append second file to first file
file_put_contents("lab6.1.txt", "\n" . $content, FILE_APPEND);
?>