<?php
// DeWalrus/Bedankt/Solliciterenbedankt.php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require __DIR__ . '/../db.php';

/**
 * Vereiste velden (server-side)
 * We gebruiken LEEFTIJD ipv geboortedatum.
 */
$required = [
  'voornaam','achternaam','email','telefoon',
  'straat','huisnummer','postcode','woonplaats',
  'geslacht','leeftijd',
  'dienstverband','functie','motivatie','locatie'
];

foreach ($required as $f) {
  if (!isset($_POST[$f]) || $_POST[$f] === '') {
    http_response_code(400);
    exit("Ontbrekend veld: $f");
  }
}

// Normaliseren / valideren
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
if (!$email) {
  http_response_code(400);
  exit('Ongeldig e-mailadres.');
}

$telefoon = preg_replace('/\s+/', '', $_POST['telefoon']);           // spaties weg
if (!preg_match('/^(0\d{9}|\+31\d{9})$/', $telefoon)) {               // 0612345678 of +31612345678
  http_response_code(400);
  exit('Ongeldig telefoonnummer.');
}

$postcode = strtoupper(trim($_POST['postcode']));
$postcode = preg_replace('/\s+/', ' ', $postcode);
if (!preg_match('/^[1-9][0-9]{3}\s?[A-Z]{2}$/', $postcode)) {
  http_response_code(400);
  exit('Ongeldige postcode.');
}

$leeftijd = filter_var($_POST['leeftijd'], FILTER_VALIDATE_INT, [
  'options' => ['min_range' => 16, 'max_range' => 80]
]);
if ($leeftijd === false) {
  http_response_code(400);
  exit('Leeftijd moet tussen 16 en 80 zijn.');
}

$bronArray   = isset($_POST['bron']) && is_array($_POST['bron']) ? $_POST['bron'] : [];
$bronCsv     = implode(',', array_map('trim', $bronArray));
$bronAnders  = isset($_POST['bron_anders']) ? trim($_POST['bron_anders']) : null;
$maxuren     = isset($_POST['maxuren']) && $_POST['maxuren'] !== '' ? (int)$_POST['maxuren'] : null;

// --- INSERT ---
// NB: we gebruiken hier 'leeftijd' en NIET 'geboortedatum'.
// Laat cv_* achterwege; die gebruik je niet meer.
$sql = "INSERT INTO applications
  (voornaam, tussenvoegsel, achternaam, email, telefoon,
   straat, huisnummer, postcode, woonplaats,
   geslacht, leeftijd,
   dienstverband, maxuren,
   functie, motivatie,
   locatie, bron, bron_anders)
  VALUES
  (:voornaam, :tussenvoegsel, :achternaam, :email, :telefoon,
   :straat, :huisnummer, :postcode, :woonplaats,
   :geslacht, :leeftijd,
   :dienstverband, :maxuren,
   :functie, :motivatie,
   :locatie, :bron, :bron_anders)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
  ':voornaam'       => trim($_POST['voornaam']),
  ':tussenvoegsel'  => $_POST['tussenvoegsel'] !== '' ? trim($_POST['tussenvoegsel']) : null,
  ':achternaam'     => trim($_POST['achternaam']),
  ':email'          => $email,
  ':telefoon'       => $telefoon,

  ':straat'         => trim($_POST['straat']),
  ':huisnummer'     => trim($_POST['huisnummer']),
  ':postcode'       => $postcode,
  ':woonplaats'     => trim($_POST['woonplaats']),

  ':geslacht'       => $_POST['geslacht'],
  ':leeftijd'       => $leeftijd,

  ':dienstverband'  => $_POST['dienstverband'],
  ':maxuren'        => $maxuren,

  ':functie'        => $_POST['functie'],
  ':motivatie'      => trim($_POST['motivatie']),

  ':locatie'        => $_POST['locatie'],
  ':bron'           => $bronCsv !== '' ? $bronCsv : null,
  ':bron_anders'    => ($bronAnders !== '') ? $bronAnders : null,
]);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="utf-8">
  <title>Bedankt</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
  <h1>Bedankt voor je sollicitatie!</h1>
  <p>We hebben je gegevens ontvangen. We nemen zo snel mogelijk contact met je op.</p>
  <p><a href="../Solliciteren.php">Terug naar solliciteren</a></p>
</body>
</html>
