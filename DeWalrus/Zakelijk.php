<?php
// DeWalrus/Zakelijk.php — Zakelijke info + contactformulier
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>De Walrus — Zakelijk</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Raleway:wght@600&family=Alex+Brush&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="Zakelijk.css" />
</head>
<body class="theme-walrus-cream">
  <!-- NAV zoals homepage -->
  <?php require __DIR__ . '/nav.php'; ?>

  <main class="page-content">
    <!-- Titel (NIET AANRAKEN) -->
    <div class="page-title" aria-hidden="true">
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="">
      <h1 class="title-text">ZAKELIJK</h1>
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="">
    </div>

    <!-- Hero afbeeldingen -->
    <section class="zakelijk-hero">
      <figure>
        <img src="https://res.cloudinary.com/tf-lab/image/upload/restaurant/c8eb54b1-e746-4a1e-8cb0-8e677bac8197/1ea6f09b-dbdb-409f-bc79-3d266b0bb929.jpg" alt="Sfeerimpressie De Walrus">
      </figure>
      <figure>
        <img src="https://vmn-missethoreca.imgix.net/uploads/2022/06/de-walrus-sneek.jpg?auto=compress%2Cformat&q=50&w=600" alt="De Walrus Sneek">
      </figure>
    </section>

    <!-- Intro & USP’s -->
    <section class="zakelijk-content">
      <h2 class="lead-h">Vergaderen, maar wel even weg uit de sleur van ‘het kantoor’?</h2>
      <p class="lead-p">
        Dan wil je vergaderen op een mooie locatie die niet aanvoelt als je kantoor! Bij De Walrus kun je het noodzakelijke met het aangename combineren.
        In ons Grand Café in Leeuwarden en Sneek ontmoet je elkaar op een toegankelijke manier, heb je andere gesprekken en kun je direct blijven lunchen, dineren of borrelen.
      </p>

      <h3>Vergaderen in Sneek of Leeuwarden? De feiten op een rij:</h3>
      <ul class="usp-list">
        <li>Vergaderarrangement vanaf € 13,75 per persoon</li>
        <li>Meerdere (privé)ruimtes tot 100 personen beschikbaar</li>
        <li>Beide restaurants liggen in hartje centrum</li>
        <li>Combineer je meeting met een lunch, diner of borrel — alles onder één dak</li>
        <li>Alle zakelijke benodigdheden: van pennen tot beamers en van flip-overs tot statafels</li>
        <li>Ook voor presentatie, brainstorm, receptie en jubileum</li>
      </ul>

      <h3>Vergadering met lunch, diner of borrel?</h3>
      <p>
        Net als bij elke locatie voor vergaderingen en zakelijke evenementen kun je bij ons ook privéruimtes reserveren.
        Of pak met je collega’s een tafel in één van de gezellige hoeken in het restaurant in Sneek of Leeuwarden.
        We hebben verschillende arrangementen klaarstaan, maar denken ook graag met je mee —
        bitterballen na 30 minuten of gin-tonics bij het vragenrondje? Alles kan.
      </p>
      <p>
        Voor groepen tot vijftig hebben we diverse arrangementen samengesteld. Is de groep groter of heb je andere wensen?
        Geen probleem! Neem contact op voor een arrangement op maat.
      </p>

      <p class="cta-wrap">
        <a href="Arrangements.php" class="btn-red">Bekijk alle Arrangementen</a>
      </p>
    </section>

             <h3><img src="https://vmn-missethoreca.imgix.net/uploads/2015/10/42.jpg?auto=compress%2Cformat&q=50"></h3>
           
   
    <div class="section-divider" aria-hidden="true"></div>

    <!-- FORMULIER -->
    <section class="apply-form" aria-labelledby="zakelijk-form-titel">
      <h2 id="zakelijk-form-titel">Neem contact met ons op!</h2>
      <p class="form-intro">
        Onze telefoon staat bijna altijd aan. Je bereikt ons in Leeuwarden op
        <a href="tel:0582137740">058 213 7740</a> of in Sneek op
        <a href="tel:0515438100">0515 438 100</a>.
        Mailen kan natuurlijk ook — vul het formulier hieronder in.
      </p>

      <form action="Bedankt.php" method="post" novalidate>
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

        <!-- Locatie -->
        <h3 class="form-subtitle">Locatie</h3>
        <div class="form-row">
          <div class="form-field">
            <label for="locatie">Voorkeurslocatie<span aria-hidden="true">*</span></label>
            <select id="locatie" name="locatie" required>
              <option value="" disabled selected>Kies een locatie</option>
              <option value="Leeuwarden">De Walrus Leeuwarden</option>
              <option value="Sneek">De Walrus Sneek</option>
              <option value="Beide">Beide</option>
            </select>
          </div>
        </div>

        <!-- Omschrijving -->
        <h3 class="form-subtitle">Omschrijving</h3>
        <div class="form-field">
          <label for="onderwerp">Onderwerp<span aria-hidden="true">*</span></label>
          <textarea id="onderwerp" name="onderwerp" rows="1" placeholder="Afspraak maken… (etc.)" required></textarea>
        </div>
        <div class="form-field">
          <label for="bericht">Bericht<span aria-hidden="true">*</span></label>
          <textarea id="bericht" name="bericht" rows="8" placeholder="Algemene informatie…" required></textarea>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn-submit">Versturen</button>
        </div>
      </form>
    </section>
  </main>

  <!-- INFOBAR (NIET AANRAKEN) -->
  <footer class="infobar">
    <div class="infobar-top-text">Kom langs of bel ons — Bekijk onze socials</div>

    <div class="info-content">
      <div class="info-section">
        <h4>De Walrus Leeuwarden</h4>
        <p>
          <a href="https://www.google.com/maps/place/Grand+Caf%C3%A9+De+Walrus+-+Leeuwarden" target="_blank" rel="noopener">
            Gouverneursplein 37<br>
            8911 HH Leeuwarden
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
            Leeuwenburg 11<br>
            8601 CG Sneek
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
