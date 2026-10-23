
<?php
function generatePassword($length = 12) {

    $uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $lowercase = "abcdefghijklmnopqrstuvwxyz";
    $numbers = "0123456789";
    $special = "!@#$%^&*";

    $characters = $uppercase . $lowercase .
                  $numbers . $special;

    // Guarantee at least one of each type
    $password = [
        $uppercase[random_int(0, strlen($uppercase) - 1)],
        $lowercase[random_int(0, strlen($lowercase) - 1)],
        $numbers[random_int(0, strlen($numbers) - 1)],
        $special[random_int(0, strlen($special) - 1)]
    ];

    // Add remaining characters
    for ($i = 4; $i < $length; $i++) {
        $password[] = $characters[
            random_int(0, strlen($characters) - 1)
        ];
    }

    // Shuffle password characters
    shuffle($password);

    return implode("", $password);
}

echo "Random Password: " . generatePassword(12);
?>
