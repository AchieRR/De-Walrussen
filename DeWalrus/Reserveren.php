<?php
// DeWalrus/Reserveren.php — Reserveringsformulier (deep-link & lock locatie)
session_start();
if (empty($_SESSION['csrf'])) {
  $_SESSION['csrf'] = bin2hex(random_bytes(32));
}
$csrf = $_SESSION['csrf'];

// Voorkeurslocatie via ?loc=... (whitelist + normalisatie)
$allowedLocs = ['Leeuwarden','Sneek'];
$prefLoc = null;
if (isset($_GET['loc'])) {
  $raw = trim((string)$_GET['loc']);
  $norm = ucfirst(strtolower($raw)); // 'sneek' -> 'Sneek'
  if (in_array($norm, $allowedLocs, true)) {
    $prefLoc = $norm;
  }
}
$lockLoc = ($prefLoc !== null);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>De Walrus — Reserveren</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Raleway:wght@600&family=Alex+Brush&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="Reserveren.css" />
</head>
<body class="theme-walrus-cream">

<?php require_once __DIR__ . '/nav.php'; ?>

<main class="page-content">
  <!-- Titel -->
  <div class="page-title" aria-hidden="true">
    <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="" />
    <h1 class="title-text">Reserveren</h1>
    <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="" />
  </div>

  <section class="apply-form" aria-labelledby="reserveren-titel">
    <h2 id="reserveren-titel">Leg je reservering vast!</h2>
    <p class="form-intro">
      Bel ons in Leeuwarden: <a href="tel:0582137740">058 213 7740</a> of in Sneek: <a href="tel:0515438100">0515 438 100</a>.
      Mailen kan ook: vul hieronder het formulier in.
    </p>

    <form action="Bedankt/Reserverenbedankt.php" method="post" novalidate>
      <!-- CSRF -->
      <input type="hidden" name="csrf" value="<?= htmlspecialchars($csrf, ENT_QUOTES, 'UTF-8') ?>">

      <!-- Honeypot -->
      <div style="position:absolute; left:-9999px; width:1px; height:1px; overflow:hidden;" aria-hidden="true">
        <label>Laat dit veld leeg: <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
      </div>

      <!-- Persoonlijk -->
      <h3 class="form-subtitle">Persoonlijke gegevens</h3>
      <div class="form-row-3">
        <div class="form-field">
          <label for="voornaam">Voornaam<span aria-hidden="true">*</span></label>
          <input type="text" id="voornaam" name="voornaam" autocomplete="given-name" required>
        </div>
        <div class="form-field">
          <label for="tussenvoegsel">Tussenvoegsel</label>
          <input type="text" id="tussenvoegsel" name="tussenvoegsel" autocomplete="additional-name" placeholder="van, de, van der…">
        </div>
        <div class="form-field">
          <label for="achternaam">Achternaam<span aria-hidden="true">*</span></label>
          <input type="text" id="achternaam" name="achternaam" autocomplete="family-name" required>
        </div>
      </div>

      <!-- Contact -->
      <h3 class="form-subtitle">Contact</h3>
      <div class="form-row">
        <div class="form-field">
          <label for="email">E-mail<span aria-hidden="true">*</span></label>
          <input type="email" id="email" name="email" autocomplete="email" placeholder="jij@voorbeeld.nl" required>
        </div>
        <div class="form-field">
          <label for="telefoon">Telefoon (NL)<span aria-hidden="true">*</span></label>
          <input
            type="tel"
            id="telefoon"
            name="telefoon"
            autocomplete="tel"
            inputmode="tel"
            pattern="^(?:0\d{9}|(?:\+|00)31\d{9})$"
            placeholder="0612345678, +31612345678 of 0031612345678"
            required
            title="Voer 0612345678, +31612345678 of 0031612345678 in.">
        </div>
      </div>

      <!-- Locatie & Type -->
      <h3 class="form-subtitle">Locatie & type</h3>
      <div class="form-row">
        <div class="form-field">
          <label for="locatie">Voorkeurslocatie<span aria-hidden="true">*</span></label>

          <?php if ($lockLoc): ?>
            <!-- Locked: disabled select voor UX, hidden field voor POST -->
            <select id="locatie" name="locatie_disabled" disabled>
              <option <?= $prefLoc==='Leeuwarden'?'selected':''; ?>>De Walrus Leeuwarden</option>
              <option <?= $prefLoc==='Sneek'?'selected':''; ?>>De Walrus Sneek</option>
            </select>
            <input type="hidden" name="locatie" value="<?= htmlspecialchars($prefLoc, ENT_QUOTES, 'UTF-8') ?>">
          <?php else: ?>
            <!-- Vrij te kiezen -->
            <select id="locatie" name="locatie" required>
              <option value="" disabled selected>Kies een locatie</option>
              <option value="Leeuwarden">De Walrus Leeuwarden</option>
              <option value="Sneek">De Walrus Sneek</option>
            </select>
          <?php endif; ?>
        </div>

        <div class="form-field">
          <label for="type">Type reservering<span aria-hidden="true">*</span></label>
          <select id="type" name="type" required>
            <option value="" disabled selected>Kies een type</option>
            <option>High wine</option>
            <option>High tea</option>
            <option>Borrel Boot</option>
            <option>Walking Diner Buffet</option>
            <option>Live Cooking Buffet</option>
            <option>Bier Arrangement</option>
            <option>Bioscoop Arrangement</option>
            <option>Theater Sneek Arrangement</option>
            <option>Vergadering</option>
            <option>Workshop</option>
            <option>Evenement</option>
            <option>Diner</option>
            <option>Lunch</option>
          </select>
        </div>
      </div>

      <!-- Datum & tijd -->
      <h3 class="form-subtitle">Datum & tijd</h3>
      <div class="form-row-3">
        <div class="form-field">
          <label for="date">Datum<span aria-hidden="true">*</span></label>
          <input type="date" id="date" name="date" required>
        </div>

        <div class="form-field">
          <label for="guests">Aantal gasten<span aria-hidden="true">*</span></label>
          <input type="number" id="guests" name="guests" min="1" max="15" required>
        </div>

        <div class="form-field">
          <label for="time">Tijd<span aria-hidden="true">*</span></label>
          <select id="time" name="time" required>
            <option value="" disabled selected>Kies tijd</option>
            <?php
              // 10:00 t/m 23:45 per 15 minuten
              for ($h=10; $h<=23; $h++) {
                for ($m=0; $m<60; $m+=15) {
                  printf('<option>%02d:%02d</option>', $h, $m);
                }
              }
            ?>
          </select>
        </div>
      </div>

      <div class="form-actions">
        <button type="submit" class="btn-submit">Versturen</button>
      </div>
    </form>
  </section>

  <div class="section-divider" aria-hidden="true"></div>
</main>

<!-- INFOBAR (ongewijzigd) -->
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
        <strong>Email:</strong> <a href="mailto:info@dewalrusleeuwarden.nl">info@dewalrusleeuwarden.nl</a>
      </p>
      <div class="socials">
        <a href="https://www.facebook.com/DeWalrusLeeuwarden/?locale=nl_NL" target="_blank" rel="noopener">
          <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/facebook.svg" class="social-icon" alt="Facebook">
        </a>
        <a href="https://www.instagram.com/dewalrusleeuwarden/" target="_blank" rel="noopener">
          <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/instagram.svg" class="social-icon" alt="Instagram">
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
        <strong>Email:</strong> <a href="mailto:info@dewalrussneek.nl">info@dewalrussneek.nl</a>
      </p>
      <div class="socials">
        <a href="https://www.facebook.com/DeWalrusSneek/?locale=nl_NL" target="_blank" rel="noopener">
          <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/facebook.svg" class="social-icon" alt="Facebook">
        </a>
        <a href="https://www.instagram.com/dewalrussneek/" target="_blank" rel="noopener">
          <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/instagram.svg" class="social-icon" alt="Instagram">
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
