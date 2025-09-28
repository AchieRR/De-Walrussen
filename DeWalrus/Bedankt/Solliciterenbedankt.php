<?php
// DeWalrus/Bedankt/Solliciterenbedankt.php
// Slaat de sollicitatie op en toont daarna een nette, compacte bevestigingspagina.

require __DIR__ . '/../db.php';

// Vereiste velden (zonder geslacht; met leeftijd)
$required = [
  'voornaam','achternaam','email','telefoon',
  'straat','huisnummer','postcode','woonplaats',
  'leeftijd',
  'dienstverband','functie','motivatie','locatie'
];
foreach ($required as $f) {
  if (!isset($_POST[$f]) || $_POST[$f] === '') {
    http_response_code(400);
    exit("Ontbrekend veld: $f");
  }
}

// Validaties
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
if (!$email) { http_response_code(400); exit('Ongeldig e-mailadres.'); }

$telefoon = preg_replace('/\s+/', '', $_POST['telefoon']);   // 0612345678 of +31612345678
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

$leeftijd = filter_var($_POST['leeftijd'], FILTER_VALIDATE_INT, [
  'options' => ['min_range' => 16, 'max_range' => 80]
]);
if ($leeftijd === false) {
  http_response_code(400);
  exit('Leeftijd moet tussen 16 en 80 zijn.');
}

// Optioneel
$bronArray   = isset($_POST['bron']) && is_array($_POST['bron']) ? $_POST['bron'] : [];
$bronCsv     = implode(',', array_map('trim', $bronArray));
$bronAnders  = isset($_POST['bron_anders']) ? trim($_POST['bron_anders']) : null;
$maxuren     = isset($_POST['maxuren']) && $_POST['maxuren'] !== '' ? (int)$_POST['maxuren'] : null;

// INSERT
$sql = "INSERT INTO applications
  (voornaam, tussenvoegsel, achternaam, email, telefoon,
   straat, huisnummer, postcode, woonplaats,
   leeftijd,
   dienstverband, maxuren,
   functie, motivatie,
   locatie, bron, bron_anders)
  VALUES
  (:voornaam, :tussenvoegsel, :achternaam, :email, :telefoon,
   :straat, :huisnummer, :postcode, :woonplaats,
   :leeftijd,
   :dienstverband, :maxuren,
   :functie, :motivatie,
   :locatie, :bron, :bron_anders)";
$pdo->prepare($sql)->execute([
  ':voornaam'       => trim($_POST['voornaam']),
  ':tussenvoegsel'  => $_POST['tussenvoegsel'] !== '' ? trim($_POST['tussenvoegsel']) : null,
  ':achternaam'     => trim($_POST['achternaam']),
  ':email'          => $email,
  ':telefoon'       => $telefoon,

  ':straat'         => trim($_POST['straat']),
  ':huisnummer'     => trim($_POST['huisnummer']),
  ':postcode'       => $postcode,
  ':woonplaats'     => trim($_POST['woonplaats']),

  ':leeftijd'       => $leeftijd,
  ':dienstverband'  => $_POST['dienstverband'],
  ':maxuren'        => $maxuren,

  ':functie'        => $_POST['functie'],
  ':motivatie'      => trim($_POST['motivatie']),

  ':locatie'        => $_POST['locatie'],
  ':bron'           => $bronCsv !== '' ? $bronCsv : null,
  ':bron_anders'    => ($bronAnders !== '') ? $bronAnders : null,
]);

// ===== Weergave-helpers =====
function e($v){ return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }

$naamParts = [trim($_POST['voornaam'])];
if (!empty($_POST['tussenvoegsel'])) $naamParts[] = trim($_POST['tussenvoegsel']);
$naamParts[] = trim($_POST['achternaam']);
$naamVol = implode(' ', $naamParts);

$telefoonDisplay = $telefoon;
if (strpos($telefoonDisplay, '+31') === 0) { $telefoonDisplay = '+31 ' . substr($telefoonDisplay, 3); }

$adres1 = trim($_POST['straat']).' '.trim($_POST['huisnummer']);
$adres2 = $postcode.' '.trim($_POST['woonplaats']);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>De Walrus — Bedankt</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Raleway:wght@600&family=Alex+Brush&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="Bedankt.css" />
</head>
<body class="theme-walrus-cream">
  <!-- Header -->
  <header>
    <nav class="topnav" role="navigation" aria-label="Hoofdmenu">
      <div class="nav-left">
        <a href="../Solliciteren.php" class="nav-btn btn-solliciteren">Solliciteren</a>
        <a href="../Menukaart.php" class="nav-btn">Menukaart</a>
        <a href="../Arrangements.php" class="nav-btn">Arrangementen</a>
      </div>

      <a href="../index.php" class="logo" aria-label="De Walrus Homepage">
        <span class="walrus">De Walrus</span>
        <span class="grandcafe">— GRAND CAFÉ —</span>
      </a>

      <div class="nav-right">
        <a href="../Zakelijk.php" class="nav-btn">Zakelijk</a>
        <a href="../Contact.php" class="nav-btn">Contact</a>
        <a href="../Reserveren.php" class="nav-btn btn-reserveren">Reserveren</a>
      </div>
    </nav>
  </header>
  <div class="header-gap" aria-hidden="true"></div>

  <main class="page-content">
    <!-- Titel -->
    <div class="page-title" aria-hidden="true">
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="">
      <h1 class="title-text">BEDANKT</h1>
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="">
    </div>

    <!-- Bedankt-kaart -->
    <div class="thankyou-card">
      <div class="thankyou-icon" aria-hidden="true">
        <svg viewBox="0 0 24 24" width="36" height="36" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" role="img" aria-label="Check">
          <path d="M20 6L9 17l-5-5"></path>
        </svg>
      </div>

      <h2 class="thankyou-title">Bedankt voor je sollicitatie, <?= e($naamVol) ?>!</h2>

      <p class="thankyou-intro">
        We hebben je gegevens ontvangen. Je hoort snel van ons — meestal binnen enkele dagen.
        Heb je tussendoor vragen? Bel ons gerust in Leeuwarden op
        <a href="tel:0582137740">058 213 7740</a> of in Sneek op
        <a href="tel:0515438100">0515 438 100</a>.
      </p>

      <!-- identiteitsrij -->
      <div class="identity-row">
        <div><span class="k">Naam</span><span class="v"><?= e($naamVol) ?></span></div>
        <div><span class="k">E-mail</span><span class="v"><?= e($email) ?></span></div>
        <div><span class="k">Telefoon</span><span class="v"><?= e($telefoonDisplay) ?></span></div>
      </div>

      <!-- inklapper -->
      <details class="more">
        <summary>Meer over je sollicitatie</summary>
        <ul class="kv">
          <li><span class="k">Adres:</span><span class="v"><?= e($adres1) ?><br><?= e($adres2) ?></span></li>
          <li><span class="k">Leeftijd:</span><span class="v"><?= e($leeftijd) ?></span></li>
          <li><span class="k">Dienstverband:</span><span class="v"><?= e($_POST['dienstverband']) ?></span></li>
          <li><span class="k">Max. uren:</span><span class="v"><?= $maxuren ? e($maxuren).' uur' : '—' ?></span></li>
          <li><span class="k">Functie:</span><span class="v"><?= e($_POST['functie']) ?></span></li>
          <li><span class="k">Locatie:</span><span class="v"><?= e($_POST['locatie']) ?></span></li>
          <li class="full"><span class="k">Motivatie:</span><span class="v"><?= e($_POST['motivatie']) ?></span></li>
        </ul>
      </details>

      <div class="cta-row center">
        <a class="btn btn-primary" href="../index.php">Terug naar homepage</a>
        <a class="btn btn-secondary" href="../Solliciteren.php">Bekijk vacatures</a>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="infobar">
    <div class="infobar-top-text">Kom langs of bel ons — Bekijk onze socials</div>

    <div class="info-content">
      <div class="info-section">
        <h4>De Walrus Leeuwarden</h4>
        <p>
          <a href="https://www.google.com/maps/place/Grand+Caf%C3%A9+De+Walrus+-+Leeuwarden" target="_blank" rel="noopener">
            Gouverneursplein 37<br>8911 HH Leeuwarden
          </a><br><br>
          Zondag t/m Zaterdag van 10:00 tot 01:00<br><br>
          <strong>Tel:</strong> <a href="tel:0582137740">058-2137740</a><br>
          <strong>E-mail:</strong> <a href="mailto:info@dewalrusleeuwarden.nl">info@dewalrusleeuwarden.nl</a>
        </p>
        <div class="socials">
          <a href="https://www.facebook.com/DeWalrusLeeuwarden/?locale=nl_NL" target="_blank" rel="noopener" aria-label="Facebook Leeuwarden">
            <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/facebook.svg" class="social-icon" alt="">
          </a>
          <a href="https://www.instagram.com/dewalrusleeuwarden/" target="_blank" rel="noopener" aria-label="Instagram Leeuwarden">
            <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/instagram.svg" class="social-icon" alt="">
          </a>
        </div>
      </div>

      <div class="info-section">
        <h4>De Walrus Sneek</h4>
        <p>
          <a href="https://www.google.com/maps/place/Grand+Caf%C3%A9+De+Walrus+-+Sneek" target="_blank" rel="noopener">
            Leeuwenburg 11<br>8601 CG Sneek
          </a><br><br>
          Zondag t/m Zaterdag van 10:00 tot 01:00<br><br>
          <strong>Tel:</strong> <a href="tel:0515438100">0515-438100</a><br>
          <strong>E-mail:</strong> <a href="mailto:info@dewalrussneek.nl">info@dewalrussneek.nl</a>
        </p>
        <div class="socials">
          <a href="https://www.facebook.com/DeWalrusSneek/?locale=nl_NL" target="_blank" rel="noopener" aria-label="Facebook Sneek">
            <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/facebook.svg" class="social-icon" alt="">
          </a>
          <a href="https://www.instagram.com/dewalrussneek/" target="_blank" rel="noopener" aria-label="Instagram Sneek">
            <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/instagram.svg" class="social-icon" alt="">
          </a>
        </div>
      </div>

      <div class="right-side">
        <div class="infobar-right-text">Leuk dat je bent geweest</div>
        <div class="city-images">
          <a href="https://www.google.com/maps/place/Grand+Caf%C3%A9+De+Walrus+-+Leeuwarden" target="_blank" rel="noopener">
            <img src="https://res.cloudinary.com/laad-media-b-v/image/upload/s--J6Q_KcqC--/c_scale,dpr_auto,f_auto,q_auto:best/v1/Afbeeldingen%20knooppunten/266-8911/Grand-Caf%C3%A9_De_Walrus_Leeuwarden" alt="De Walrus Leeuwarden">
          </a>
          <a href="https://www.google.com/maps/place/Grand+Caf%C3%A9+De+Walrus+-+Sneek" target="_blank" rel="noopener">
            <img src="https://res.cloudinary.com/laad-media-b-v/image/upload/s--dLwzwzgP--/c_scale,dpr_auto,f_auto,q_auto:best/v1/Afbeeldingen%20knooppunten/513-8601/Grand-Caf%C3%A9_De_Walrus_Sneek" alt="De Walrus Sneek">
          </a>
        </div>
      </div>
    </div>

    <div class="infobar-brand">
      <span class="walrus">De Walrus</span>
      <span class="grandcafe">— GRAND CAFÉ —</span>
    </div>
  </footer>
</body>
</html>
