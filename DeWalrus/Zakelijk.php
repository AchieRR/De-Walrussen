<?php
// zakelijk.php — Zakelijk: info + contactformulier (HTML/CSS/PHP only)
session_start();
if (empty($_SESSION['csrf'])) {
  $_SESSION['csrf'] = bin2hex(random_bytes(32));
}
$csrf = $_SESSION['csrf'];
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>De Walrus — Zakelijk</title>

  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Raleway:wght@600&family=Alex+Brush&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="zakelijk.css" />
</head>
<body class="theme-walrus-cream">
  <?php require __DIR__ . '/nav.php'; ?>

  <main class="page-content">
    <div class="page-title" aria-hidden="true">
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="">
      <h1 class="title-text">ZAKELIJK</h1>
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="">
    </div>

    <!-- HERO -->
    <section class="zakelijk-hero">
      <figure class="hero-item">
        <img src="https://res.cloudinary.com/tf-lab/image/upload/restaurant/c8eb54b1-e746-4a1e-8cb0-8e677bac8197/1ea6f09b-dbdb-409f-bc79-3d266b0bb929.jpg" alt="Sfeerimpressie De Walrus">
      </figure>
      <figure class="hero-item">
        <img src="https://vmn-missethoreca.imgix.net/uploads/2022/06/de-walrus-sneek.jpg?auto=compress%2Cformat&q=50&w=1200" alt="De Walrus Sneek">
      </figure>
    </section>

    <!-- INTRO -->
    <section class="zakelijk-content">
      <h2 class="lead-h">Vergaderen zonder kantoorsleur</h2>
      <p class="lead-p">
        Zoek je een plek waar je team wél energie van krijgt? Bij De Walrus vergader je midden in het centrum van
        Leeuwarden of Sneek, met goede koffie, snelle service en ruimtes die fijn aanvoelen. Na afloop blijf je
        moeiteloos hangen voor lunch, diner of borrel.
      </p>
      <p class="lead-p">
        We denken mee van opstelling tot techniek. Privéruimtes tot 100 personen, arrangementen die werken,
        en maatwerk als je iets bijzonders wilt — van een compacte brainstorm tot een borrel met bites.
      </p>

      <h3>Waarom hier boeken?</h3>
      <ul class="usp-list">
        <li>Vergaderarrangement vanaf € 13,75 p.p.</li>
        <li>Privéruimtes beschikbaar (tot 100 personen)</li>
        <li>Beide locaties in hartje centrum</li>
        <li>Alles geregeld: pennen, beamer, flip-overs, statafels</li>
        <li>Combineer met lunch, diner of borrel</li>
        <li>Ook voor presentaties, recepties en jubilea</li>
      </ul>

      <h3>Arrangementen</h3>
      <p>We hebben kant-en-klare opties, maar maatwerk kan altijd.</p>
      <p class="cta-wrap">
        <a href="arrangementen.php" class="btn-red">Bekijk alle arrangementen</a>
      </p>
    </section>

    <div class="section-divider" aria-hidden="true"></div>

    <!-- FORMULIER -->
    <section class="apply-form" aria-labelledby="zakelijk-form-titel">
      <h2 id="zakelijk-form-titel">Neem contact met ons op</h2>
      <p class="form-intro">
        Bel Leeuwarden: <a href="tel:0582137740">058 213 7740</a> · Sneek: <a href="tel:0515438100">0515 438 100</a>.
        Of stuur je vraag via het formulier hieronder.
      </p>

      <form action="Bedankt/Contactbedankt.php" method="post" novalidate>
        <!-- CSRF -->
        <input type="hidden" name="csrf" value="<?= htmlspecialchars($csrf, ENT_QUOTES, 'UTF-8') ?>">
        <!-- Honeypot -->
        <div style="position:absolute;left:-9999px;width:1px;height:1px;overflow:hidden" aria-hidden="true">
          <label>Laat dit veld leeg: <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
        </div>

        <h3 class="form-subtitle">Persoonlijke gegevens <span class="req-note">(<span class="req">*</span> = verplicht)</span></h3>
        <div class="form-row-3">
          <div class="form-field">
            <label for="voornaam">Voornaam<span class="req" aria-hidden="true">*</span></label>
            <input type="text" id="voornaam" name="voornaam" autocomplete="given-name" required>
          </div>
          <div class="form-field">
            <label for="tussenvoegsel">Tussenvoegsel</label>
            <input type="text" id="tussenvoegsel" name="tussenvoegsel" autocomplete="additional-name" placeholder="van, de, van der…">
          </div>
          <div class="form-field">
            <label for="achternaam">Achternaam<span class="req" aria-hidden="true">*</span></label>
            <input type="text" id="achternaam" name="achternaam" autocomplete="family-name" required>
          </div>
        </div>

        <h3 class="form-subtitle">Contact <small class="muted">Vul <strong>e-mail</strong> of <strong>telefoon</strong> in</small></h3>
        <div class="form-row">
          <div class="form-field">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" autocomplete="email" placeholder="jij@voorbeeld.nl">
          </div>
          <div class="form-field">
            <label for="telefoon">Telefoon (NL)</label>
            <input
              type="tel"
              id="telefoon"
              name="telefoon"
              autocomplete="tel"
              inputmode="tel"
              pattern="^(?:0\d{9}|(?:\+|00)31\d{9})$"
              placeholder="0612345678, +31612345678 of 0031612345678"
              title="Voer 0612345678, +31612345678 of 0031612345678 in.">
          </div>
        </div>
        <!-- Let op: server-side controleren dat minstens één van beide is ingevuld (zie Contactbedankt.php) -->

        <h3 class="form-subtitle">Locatie</h3>
        <div class="form-row">
          <div class="form-field">
            <label for="locatie">Voorkeurslocatie<span class="req" aria-hidden="true">*</span></label>
            <select id="locatie" name="locatie" required>
              <option value="" disabled selected>Kies een locatie</option>
              <option value="Leeuwarden">De Walrus Leeuwarden</option>
              <option value="Sneek">De Walrus Sneek</option>
              <option value="Beide">Beide</option>
            </select>
          </div>
        </div>

        <h3 class="form-subtitle">Omschrijving</h3>
        <div class="form-field">
          <label for="onderwerp">Onderwerp<span class="req" aria-hidden="true">*</span></label>
          <textarea id="onderwerp" name="onderwerp" rows="1" placeholder="Afspraak maken… (etc.)" required></textarea>
        </div>
        <div class="form-field">
          <label for="bericht">Bericht<span class="req" aria-hidden="true">*</span></label>
          <textarea id="bericht" name="bericht" rows="8" placeholder="Algemene informatie…" required></textarea>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn-submit">Versturen</button>
        </div>
      </form>
    </section>
  </main>

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

      <div class="infobar-brand">
        <span class="walrus">De Walrus</span>
        <span class="grandcafe">— GRAND CAFÉ —</span>
      </div>
    </div>
  </footer>
</body>
</html>
