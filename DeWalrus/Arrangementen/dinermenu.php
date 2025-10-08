<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>De Walrus — Diner Menu</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Raleway:wght@600&family=Alex+Brush&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="meerinfo.css" />
</head>
<body class="theme-walrus-cream"> <!-- foto-achtergrond ingeschakeld -->
<?php
  $BASE = '/'; 
  require dirname(__DIR__) . '/nav.php';
?>

  <div class="header-gap" aria-hidden="true"></div>

  <main class="page-content">
        <!-- TITEL: links/rechts lijn, midden tekst -->
    <div class="page-title" aria-hidden="true">
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="" />
      <h1 class="title-text">DINER MENU</h1>
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="" />
    </div>
    
  <div class="foto-naast-tekst" style="margin-bottom:32px;display:flex;align-items:center;gap:36px;">
    <img src="JOUW-FOTO-URL-HIER" alt="Arrangement afbeelding" style="width:360px;max-width:100%;border-radius:14px;box-shadow:0 6px 24px rgba(0,0,0,0.10);" />
    <div>
      <h2>Naam van het arrangement</h2>
      <p>Korte beschrijving van het arrangement. Vertel wat het is, voor wie het geschikt is en waarom het bijzonder is.</p>
      <p>Extra informatie, bijvoorbeeld locatie, samenstelling, of mogelijkheden tot combineren met andere opties.</p>
    </div>
  </div>

  <h3>Wat kun je verwachten?</h3>
  <ul>
    <li>Mogelijkheid 1</li>
    <li>Mogelijkheid 2</li>
    <li>Mogelijkheid 3</li>
    <li>Etc.</li>
  </ul>
  <p>Heb je speciale wensen of wil je het arrangement uitbreiden? Neem contact met ons op via <a href="mailto:info@dewalrusleeuwarden.nl">info@dewalrusleeuwarden.nl</a> of bel naar <a href="tel:0582137740">058 - 21 377 40</a>.</p>

  <p><a class="btn btn-primary" href="/Reserveren.php">Reserveer nu</a></p>
  </main>

  

  <!-- Infobar / Footer -->
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
            Leeuwenburg 11<br>
            8601 CG Sneek
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
