<?php
// DeWalrus/Bedankt/Solliciterenbedankt.php

// --- DEBUG (tijdelijk aan als je vastloopt) ---
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// DB connect (db.php ligt één map hoger)
require __DIR__ . '/../db.php';

// Verplicht velden (server-side, want front-end kun je niet vertrouwen)
$required = [
  'voornaam','achternaam','email','telefoon',
  'straat','huisnummer','postcode','woonplaats',
  'geslacht','geboortedatum',
  'dienstverband','functie','motivatie','locatie'
];

foreach ($required as $f) {
  if (!isset($_POST[$f]) || $_POST[$f] === '') {
    http_response_code(400);
    exit("Ontbrekend veld: $f");
  }
}

// Normaliseren/valideren
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
if (!$email) {
  http_response_code(400);
  exit('Ongeldig e-mailadres.');
}

$telefoon = preg_replace('/\s+/', '', $_POST['telefoon']);
if (!preg_match('/^(0\d{9}|\+31\d{9})$/', $telefoon)) {
  http_response_code(400);
  exit('Ongeldig telefoonnummer.');
}

$postcode = strtoupper(trim($_POST['postcode']));
$postcode = preg_replace('/\s+/', ' ', $postcode);
if (!preg_match('/^[1-9][0-9]{3}\s?[A-Z]{2}$/', $postcode)) {
  http_response_code(400);
  exit('Ongeldige postcode.');
}

$bronArray   = isset($_POST['bron']) && is_array($_POST['bron']) ? $_POST['bron'] : [];
$bronCsv     = implode(',', array_map('trim', $bronArray));
$bronAnders  = isset($_POST['bron_anders']) ? trim($_POST['bron_anders']) : null;
$maxuren     = isset($_POST['maxuren']) && $_POST['maxuren'] !== '' ? (int)$_POST['maxuren'] : null;

// --- Upload (optioneel) ---
$cvPath = null;
$cvOriginal = null;

if (!empty($_FILES['cv']['name'])) {
  if ($_FILES['cv']['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    exit('Uploadfout bij het CV.');
  }

  $allowed = [
    'application/pdf',
    'application/msword',
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
  ];

  $finfo = new finfo(FILEINFO_MIME_TYPE);
  $mime  = $finfo->file($_FILES['cv']['tmp_name']);
  if (!in_array($mime, $allowed, true)) {
    http_response_code(400);
    exit('Alleen PDF, DOC of DOCX zijn toegestaan.');
  }

  if ($_FILES['cv']['size'] > 5 * 1024 * 1024) {
    http_response_code(400);
    exit('CV is te groot (max 5MB).');
  }

  $ext = pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION);
  $safeExt = preg_replace('/[^a-zA-Z0-9]+/', '', $ext);
  $cvOriginal = $_FILES['cv']['name'];
  $newName = 'cv_' . date('Ymd_His') . '_' . bin2hex(random_bytes(6)) . '.' . $safeExt;

  // Map: één niveau omhoog vanaf /Bedankt naar /uploads
  $uploadDir = __DIR__ . '/../uploads';

  if (!is_dir($uploadDir)) {
    if (!mkdir($uploadDir, 0777, true) && !is_dir($uploadDir)) {
      http_response_code(500);
      exit('Kon de uploads-map niet aanmaken.');
    }
  }

  $target = $uploadDir . DIRECTORY_SEPARATOR . $newName;

  if (!move_uploaded_file($_FILES['cv']['tmp_name'], $target)) {
    http_response_code(500);
    exit('Kon het CV niet opslaan.');
  }

  // Relatief pad voor opslag in DB/weergave
  $cvPath = 'uploads/' . $newName;
}

// --- INSERT ---
$sql = "INSERT INTO applications
  (voornaam, tussenvoegsel, achternaam, email, telefoon,
   straat, huisnummer, postcode, woonplaats,
   geslacht, geboortedatum,
   dienstverband, maxuren,
   functie, motivatie,
   locatie, bron, bron_anders,
   cv_path, cv_original)
  VALUES
  (:voornaam, :tussenvoegsel, :achternaam, :email, :telefoon,
   :straat, :huisnummer, :postcode, :woonplaats,
   :geslacht, :geboortedatum,
   :dienstverband, :maxuren,
   :functie, :motivatie,
   :locatie, :bron, :bron_anders,
   :cv_path, :cv_original)";

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
  ':geboortedatum'  => $_POST['geboortedatum'],

  ':dienstverband'  => $_POST['dienstverband'],
  ':maxuren'        => $maxuren,

  ':functie'        => $_POST['functie'],
  ':motivatie'      => trim($_POST['motivatie']),

  ':locatie'        => $_POST['locatie'],
  ':bron'           => $bronCsv !== '' ? $bronCsv : null,
  ':bron_anders'    => $bronAnders !== '' ? $bronAnders : null,

  ':cv_path'        => $cvPath,
  ':cv_original'    => $cvOriginal
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
