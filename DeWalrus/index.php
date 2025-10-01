
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>De Walrus</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Raleway:wght@600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Homepage.css" />
</head>

<body class="theme-walrus-cream">

  <!-- ============== HEADER / NAV ============== -->
<?php require_once __DIR__ . '/nav.php'; ?>



  <!-- ============== HERO / SLIDER ============== -->
  <section class="slider-wrap" id="galerij" aria-label="Fotogalerij">
    <!-- Radios (state) -->
    <input type="radio" name="slides" id="slide-1" checked>
    <input type="radio" name="slides" id="slide-2">
    <input type="radio" name="slides" id="slide-3">
    <input type="radio" name="slides" id="slide-4">

    <div class="slider">
      <ul class="slides">
        <li class="slide slide-1">
          <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/16/f4/46/74/sfeerimpressie.jpg?w=900&h=600&s=1" alt="De Walrus Leeuwarden — terras aan het Gouverneursplein">
          <div class="caption">
            <h3>De Walrus Leeuwarden</h3>
            <p>Geniet aan het Gouverneursplein — dagelijks open tot laat.</p>
          </div>
        </li>

        <li class="slide slide-2">
          <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/18/8d/3d/98/de-walrus-sneek-voorzijde.jpg?w=900&h=600&s=1" alt="De Walrus Sneek — gezellig in de binnenstad">
          <div class="caption">
            <h3>De Walrus Sneek</h3>
            <p>Sfeervol in het hart van Sneek — zeven dagen per week.</p>
          </div>
        </li>

        <li class="slide slide-3">
          <img src="https://res.cloudinary.com/dfav3rj8t/image/upload/v1727712345/walrus-diner.jpg" alt="Sfeervol diner bij kaarslicht">
          <div class="caption">
            <h3>Sfeervol Diner</h3>
            <p>Klassiekers en moderne gerechten — vers en met zorg.</p>
          </div>
        </li>

        <li class="slide slide-4">
          <img src="https://www.dewalrus.nl/mediadepot/4905b5653616/610/740/min/NHLStedenShootBig-13-1024x683.jpg" alt="Boottocht met borrel arrangement">
          <div class="caption">
            <h3>Boot &amp; Borrel</h3>
            <p>Gezellig boottochtje, verzorgd met lekkere drankjes.</p>
          </div>
        </li>
      </ul>

      <!-- Controls -->
      <label for="slide-4" class="control prev ctrl-1" aria-label="Vorige dia">
        <img src="https://img.icons8.com/ios-filled/80/ffffff/chevron-left.png" alt="">
      </label>
      <label for="slide-2" class="control next ctrl-1" aria-label="Volgende dia">
        <img src="https://img.icons8.com/ios-filled/80/ffffff/chevron-right.png" alt="">
      </label>

      <label for="slide-1" class="control prev ctrl-2" aria-label="Vorige dia">
        <img src="https://img.icons8.com/ios-filled/80/ffffff/chevron-left.png" alt="">
      </label>
      <label for="slide-3" class="control next ctrl-2" aria-label="Volgende dia">
        <img src="https://img.icons8.com/ios-filled/80/ffffff/chevron-right.png" alt="">
      </label>

      <label for="slide-2" class="control prev ctrl-3" aria-label="Vorige dia">
        <img src="https://img.icons8.com/ios-filled/80/ffffff/chevron-left.png" alt="">
      </label>
      <label for="slide-4" class="control next ctrl-3" aria-label="Volgende dia">
        <img src="https://img.icons8.com/ios-filled/80/ffffff/chevron-right.png" alt="">
      </label>

      <label for="slide-3" class="control prev ctrl-4" aria-label="Vorige dia">
        <img src="https://img.icons8.com/ios-filled/80/ffffff/chevron-left.png" alt="">
      </label>
      <label for="slide-1" class="control next ctrl-4" aria-label="Volgende dia">
        <img src="https://img.icons8.com/ios-filled/80/ffffff/chevron-right.png" alt="">
      </label>

      <div class="dots" aria-hidden="true">
        <label for="slide-1" class="dot d1"></label>
        <label for="slide-2" class="dot d2"></label>
        <label for="slide-3" class="dot d3"></label>
        <label for="slide-4" class="dot d4"></label>
      </div>
    </div>
  </section>

  <!-- ============== CONTENT ============== -->
  <main class="page-content">
    <section class="section intro">
      <h2 class="title-text">Welkom bij De Walrus</h2>
      <p class="lead">
        Grand café met twee locaties: <strong>Leeuwarden</strong> (Gouverneursplein) en <strong>Sneek</strong> (Leeuwenburg).
        Kom voor koffie met taart, lunch, borrel of een uitgebreid diner. We zijn 7 dagen per week open tot laat.
      </p>
    </section>

    <section class="section features">
      <div class="feature">
        <h3>Menukaart</h3>
        <p>Van burgers en salades tot seizoensgerechten. Kindermenu en vegetarische opties aanwezig.</p>
        <a class="link-arrow" href="Menukaart.php">Bekijk menukaart</a>
      </div>
      <div class="feature">
        <h3>Arrangementen</h3>
        <p>High tea, borrel, boottochten en groepsmenu’s. Ideaal voor verjaardagen, teamuitjes of familie.</p>
        <a class="link-arrow" href="Arrangements.php">Alle arrangementen</a>
      </div>
      <div class="feature">
        <h3>Zakelijk</h3>
        <p>Vergaderen, presenteren of borrelen? We denken mee over opstelling, techniek en catering.</p>
        <a class="link-arrow" href="Zakelijk.php">Zakelijke mogelijkheden</a>
      </div>
    </section>

    <section class="section split">
      <div class="split-text">
        <h3>Over De Walrus</h3>
        <p>
          De Walrus is een laagdrempelig grand café met een warme sfeer. We houden van
          <em>goed eten, gastvrijheid</em> en een gezellige borrel. Overdag een fijne plek om af te spreken;
          ’s avonds schuif je aan voor diner of een drankje op het terras.
        </p>
        <ul class="bullets">
          <li>Dagelijks open, keuken de hele dag in bedrijf</li>
          <li>Groepen welkom – van 8 tot ±100 personen</li>
          <li>Centrale locaties in binnenstad Leeuwarden &amp; Sneek</li>
        </ul>
        <a class="btn-primary" href="Reserveren.php">Tafel reserveren</a>
      </div>
      <div class="split-media">
        <img src="https://res.cloudinary.com/dfav3rj8t/image/upload/v1727712452/walrus-interieur.jpg" alt="Sfeervol interieur van De Walrus">
      </div>
    </section>
  </main>

  <!-- ============== INFOBAR (ongemoeid) ============== -->
  <footer class="infobar">
    <div class="infobar-top-text">Kom langs of bel ons — Bekijk onze socials</div>
    <div class="info-content">
      <div class="info-section">
        <h4>De Walrus Leeuwarden</h4>
        <br>
        <p>
          <a href="https://maps.app.goo.gl/et95Syd9dZWNj1GJ8" target="_blank" rel="noopener">
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
        <br>
        <p>
          <a href="https://maps.app.goo.gl/i8CJM3hCyei7eCMG7" target="_blank" rel="noopener">
            Leeuwenburg 11<br>
            8601 CG Sneek
          </a><br><br>
          Zondag t/m Zaterdag van 10:00 tot 01:00<br><br>
          <strong>Tel:</strong> <a href="tel:05151438100">05151-438100</a><br>
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
          <a href="https://maps.app.goo.gl/et95Syd9dZWNj1GJ8" target="_blank" rel="noopener">
            <img src="https://res.cloudinary.com/laad-media-b-v/image/upload/s--J6Q_KcqC--/c_scale,dpr_auto,f_auto,q_auto:best/v1/Afbeeldingen%20knooppunten/266-8911/Grand-Caf%C3%A9_De_Walrus_Leeuwarden" alt="De Walrus Leeuwarden">
          </a>
          <a href="https://maps.app.goo.gl/i8CJM3hCyei7eCMG7" target="_blank" rel="noopener">
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
