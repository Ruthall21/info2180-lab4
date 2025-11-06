<?php
// Allow access from browser and set the content type
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=UTF-8");

// Array of superheroes
$superheroes = [
  ["alias" => "Captain America", "name" => "Steve Rogers", "biography" => "A super soldier from World War II, fighting for justice with his indestructible shield."],
  ["alias" => "Iron Man", "name" => "Tony Stark", "biography" => "A genius inventor who built a powered armored suit to save the world."],
  ["alias" => "Spider-Man", "name" => "Peter Parker", "biography" => "A high school student bitten by a radioactive spider gaining super agility and spider-like powers."],
  ["alias" => "Captain Marvel", "name" => "Carol Danvers", "biography" => "A former Air Force pilot with cosmic energy powers and superhuman strength."],
  ["alias" => "Black Widow", "name" => "Natasha Romanoff", "biography" => "A highly trained spy and assassin with extraordinary combat skills."],
  ["alias" => "Hulk", "name" => "Bruce Banner", "biography" => "A scientist who transforms into a giant, super-strong green creature when angry."],
  ["alias" => "Hawkeye", "name" => "Clint Barton", "biography" => "A master archer with unmatched precision and combat skills."],
  ["alias" => "Black Panther", "name" => "T'Challa", "biography" => "King of Wakanda with enhanced strength, agility, and a Vibranium suit."],
  ["alias" => "Thor", "name" => "Thor Odinson", "biography" => "The Norse God of Thunder wielding the enchanted hammer Mjolnir."],
  ["alias" => "Scarlet Witch", "name" => "Wanda Maximoff", "biography" => "A powerful sorceress with reality-altering and telekinetic abilities."]
];

// Get the query parameter (?query=...)
$query = filter_input(INPUT_GET, "query", FILTER_SANITIZE_STRING);

if ($query) {
    $found = false;

    // Search for a matching superhero
    foreach ($superheroes as $superhero) {
        if (strcasecmp($superhero["alias"], $query) === 0 ||
            strcasecmp($superhero["name"], $query) === 0) {
            echo "<h3>{$superhero['alias']}</h3>";
            echo "<h4>{$superhero['name']}</h4>";
            echo "<p>{$superhero['biography']}</p>";
            $found = true;
            break;
        }
    }

    // If not found
    if (!$found) {
        echo "<p>Superhero not found</p>";
    }
} else {
    // Display all superheroes
    echo "<ul>";
    foreach ($superheroes as $superhero) {
        echo "<li><strong>{$superhero['alias']}</strong> ({$superhero['name']})</li>";
    }
    echo "</ul>";
}
?>
