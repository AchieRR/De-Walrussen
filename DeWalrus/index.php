<?php // index.php — NAV gelijk aan Menukaart; slider zonder JS; Reserveer-knoppen met ?loc=... ?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>De Walrus</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Raleway:wght@600&family=Alex+Brush&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="Homepage.css" />

  <meta name="description" content="Grand-Café De Walrus in Leeuwarden & Sneek. Lunch, borrel, diner, arrangementen en groepen. Dagelijks open van 10:00–01:00 uur."/>
</head>
<body class="theme-walrus-cream">

  <!-- HEADER / NAV (ongewijzigd via nav.php) -->
  <?php require_once __DIR__ . '/nav.php'; ?>

  <main class="page-content">
    <!-- Welkom -->
    <section class="section intro">
      <h2 class="title-text">Welkom bij De Walrus</h2>
      <p class="lead">
        Grand-café op twee toplocaties. Koffie met taart, lunch, borrel of uitgebreid diner — alles kan.
        Dagelijks open van <strong>10:00–01:00</strong>.
      </p>
      <div class="cta-row">
        <a class="btn-primary" href="Reserveren.php">Tafel reserveren</a>
        <a class="btn" href="Menukaart.php">Bekijk menukaart</a>
        <a class="btn" href="Arrangements.php">Alle arrangementen</a>
      </div>
    </section>

    <!-- Slider (2 slides, CSS-only) -->
    <section class="slider-wrap" id="galerij" aria-label="Fotogalerij">
      <!-- Radios (state) -->
      <input type="radio" name="slides" id="slide-1" checked>
      <input type="radio" name="slides" id="slide-2">

      <div class="slider">
        <ul class="slides">
          <!-- LEEUWARDEN -->
          <li class="slide slide-1">
            <img loading="eager" src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/16/f4/46/74/sfeerimpressie.jpg?w=1600&h=1000&s=1" alt="De Walrus Leeuwarden — terras aan het Gouverneursplein">
            <div class="caption">
              <h3>De Walrus Leeuwarden</h3>
              <p>Geniet aan het Gouverneursplein — dagelijks open tot laat.</p>
            </div>
          </li>

          <!-- SNEEK -->
          <li class="slide slide-2">
            <img loading="lazy" src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/18/8d/3d/98/de-walrus-sneek-voorzijde.jpg?w=1600&h=1000&s=1" alt="De Walrus Sneek — pand aan de Leeuwenburg">
            <div class="caption">
              <h3>De Walrus Sneek</h3>
              <p>Sfeervol in het hart van Sneek — zeven dagen per week.</p>
            </div>
          </li>
        </ul>

        <!-- Controls — twee pijlen per actieve slide -->
        <!-- Als slide-1 actief is -->
        <label for="slide-2" class="control prev ctrl-1-prev" aria-label="Vorige dia">
          <img src="https://img.icons8.com/ios-filled/96/ffffff/chevron-left.png" alt="">
        </label>
        <label for="slide-2" class="control next ctrl-1-next" aria-label="Volgende dia">
          <img src="https://img.icons8.com/ios-filled/96/ffffff/chevron-right.png" alt="">
        </label>

        <!-- Als slide-2 actief is -->
        <label for="slide-1" class="control prev ctrl-2-prev" aria-label="Vorige dia">
          <img src="https://img.icons8.com/ios-filled/96/ffffff/chevron-left.png" alt="">
        </label>
        <label for="slide-1" class="control next ctrl-2-next" aria-label="Volgende dia">
          <img src="https://img.icons8.com/ios-filled/96/ffffff/chevron-right.png" alt="">
        </label>

        <div class="dots" aria-hidden="true">
          <label for="slide-1" class="dot d1"></label>
          <label for="slide-2" class="dot d2"></label>
        </div>
      </div>
    </section>

    <!-- Menukaart / Arrangementen / Zakelijk -->
    <section class="section features">
      <div class="feature">
        <h3>Menukaart</h3>
        <p>Van burgers & salades tot seizoensgerechten. Vegetarisch en vegan opties aanwezig.</p>
        <a class="link-arrow" href="Menukaart.php">Bekijk menukaart</a>
      </div>
      <div class="feature">
        <h3>Arrangementen</h3>
        <p>High tea, borrel, boottochten en groepsmenu’s. Perfect voor feest of teamuitje.</p>
        <a class="link-arrow" href="Arrangements.php">Alle arrangementen</a>
      </div>
      <div class="feature">
        <h3>Zakelijk</h3>
        <p>Vergaderen/presenteren? Privéruimtes, techniek en catering geregeld.</p>
        <a class="link-arrow" href="Zakelijk.php">Zakelijke mogelijkheden</a>
      </div>
    </section>

    <!-- Kies je locatie -->
    <section class="section locations" id="locaties" aria-labelledby="locaties-title">
      <h3 id="locaties-title" class="section-title">Kies je locatie</h3>
      <div class="location-grid">
        <article class="location-card">
          <img loading="lazy" src="https://res.cloudinary.com/laad-media-b-v/image/upload/s--J6Q_KcqC--/c_scale,dpr_auto,f_auto,q_auto:best/v1/Afbeeldingen%20knooppunten/266-8911/Grand-Caf%C3%A9_De_Walrus_Leeuwarden" alt="De Walrus Leeuwarden — Gouverneursplein 37">
          <div class="loc-body">
            <h4>De Walrus Leeuwarden</h4>
            <p class="loc-meta">
              Gouverneursplein 37, 8911 HH Leeuwarden<br>
              <strong>Open:</strong> dagelijks 10:00–01:00<br>
              <strong>Tel:</strong> <a href="tel:0582137740">058-2137740</a><br>
              <strong>E-mail:</strong> <a href="mailto:info@dewalrusleeuwarden.nl">info@dewalrusleeuwarden.nl</a>
            </p>
            <div class="loc-actions">
              <a class="btn-primary" href="Reserveren.php?loc=Leeuwarden">Reserveer</a>
              <a class="btn" href="https://maps.app.goo.gl/et95Syd9dZWNj1GJ8" target="_blank" rel="noopener">Route</a>
            </div>
          </div>
        </article>

        <article class="location-card">
          <img loading="lazy" src="https://res.cloudinary.com/laad-media-b-v/image/upload/s--dLwzwzgP--/c_scale,dpr_auto,f_auto,q_auto:best/v1/Afbeeldingen%20knooppunten/513-8601/Grand-Caf%C3%A9_De_Walrus_Sneek" alt="De Walrus Sneek — Leeuwenburg 11">
          <div class="loc-body">
            <h4>De Walrus Sneek</h4>
            <p class="loc-meta">
              Leeuwenburg 11, 8601 CG Sneek<br>
              <strong>Open:</strong> dagelijks 10:00–01:00<br>
              <strong>Tel:</strong> <a href="tel:0515438100">0515-438100</a><br>
              <strong>E-mail:</strong> <a href="mailto:info@dewalrussneek.nl">info@dewalrussneek.nl</a>
            </p>
            <div class="loc-actions">
              <a class="btn-primary" href="Reserveren.php?loc=Sneek">Reserveer</a>
              <a class="btn" href="https://maps.app.goo.gl/i8CJM3hCyei7eCMG7" target="_blank" rel="noopener">Route</a>
            </div>
          </div>
        </article>
      </div>
      <p class="small subtle">Privéruimtes: Leeuwarden tot ±50 personen, Sneek tot ±100 personen.</p>
    </section>

    <!-- Arrangementen -->
    <section class="section gallery" aria-labelledby="gal-title">
      <h3 id="gal-title" class="section-title">Arrangementen</h3>
      <p class="lead" style="margin-bottom:12px;">Klik op een tegel voor details &amp; reserveren.</p>

      <div class="arr-tiles-grid">
        <a class="arr-tile" href="Arrangementen/Bier.php">
          <img loading="lazy" src="https://www.dewalrus.nl/mediadepot/179a8514be2/610/740/min/kleinLucasKemperWalrusSneekLR-370-.jpg" alt="Bier Arrangement">
          <div class="arr-caption"><h4>Bier Arrangement</h4><p>Leeuwarden / Sneek</p></div>
        </a>

        <a class="arr-tile" href="Arrangementen/bioscoop.php">
          <img loading="lazy" src="https://www.dewalrus.nl/mediadepot/3918629cddd/610/740/min/DEWALRUSfinal-selectie173.jpg" alt="Bioscoop Arrangement">
          <div class="arr-caption"><h4>Bioscoop</h4><p>Leeuwarden / Sneek</p></div>
        </a>

        <a class="arr-tile" href="Arrangementen/bootborrel.php">
          <img loading="lazy" src="https://www.dewalrus.nl/mediadepot/4905b5653616/610/740/min/NHLStedenShootBig-13-1024x683.jpg" alt="Boot & Borrel">
          <div class="arr-caption"><h4>Boot &amp; Borrel</h4><p>Leeuwarden</p></div>
        </a>

        <a class="arr-tile" href="Arrangementen/dinermenu.php">
          <img loading="lazy" src="https://www.dewalrus.nl/mediadepot/183782fa5e0/610/740/min/LucasKemperWalrusSneekLR-173.jpg" alt="Dinermenu">
          <div class="arr-caption"><h4>Dinermenu</h4><p>Leeuwarden / Sneek</p></div>
        </a>

        <a class="arr-tile" href="Arrangementen/hightea.php">
          <img loading="lazy" src="https://www.dewalrus.nl/mediadepot/392b5b14c0c/610/740/min/WalrusLeeuwardenLR11.jpg" alt="High Tea">
          <div class="arr-caption"><h4>High Tea</h4><p>Leeuwarden / Sneek</p></div>
        </a>

        <a class="arr-tile" href="Arrangementen/highwine.php">
          <img loading="lazy" src="https://www.dewalrus.nl/mediadepot/194a6a4e3b4/610/740/min/LucasKemperWalrusSneekLR-297.jpg" alt="High Wine">
          <div class="arr-caption"><h4>High Wine</h4><p>Leeuwarden / Sneek</p></div>
        </a>

        <a class="arr-tile" href="Arrangementen/livecooking.php">
          <img loading="lazy" src="https://www.dewalrus.nl/mediadepot/184ff8d30f0/610/740/min/LucasKemperWalrusSneekLR-172.jpg" alt="Live Cooking Buffet">
          <div class="arr-caption"><h4>Live Cooking</h4><p>Leeuwarden / Sneek</p></div>
        </a>

        <a class="arr-tile" href="Arrangementen/theatersneek.php">
          <img loading="lazy" src="https://www.dewalrus.nl/mediadepot/48951c007943/610/740/min/theater-sneek-zaal4183119197.jpg" alt="Theater Sneek arrangement">
          <div class="arr-caption"><h4>Theater Sneek</h4><p>Sneek</p></div>
        </a>

        <a class="arr-tile" href="Arrangementen/walkingdiner.php">
          <img loading="lazy" src="https://www.dewalrus.nl/mediadepot/1861375e626/610/740/min/WalrusLeeuwardenLR85.jpg" alt="Walking Diner">
          <div class="arr-caption"><h4>Walking Diner</h4><p>Leeuwarden / Sneek</p></div>
        </a>
      </div>

      <div class="gallery-cta">
        <a class="btn" href="Arrangements.php">Alle arrangementen</a>
        <a class="btn-primary" href="Reserveren.php">Reserveer direct</a>
      </div>
    </section>

    <!-- Over de Walrus -->
    <section class="section split">
      <div class="split-text">
        <h3>Over De Walrus</h3>
        <p>Laagdrempelig grand-café met warme sfeer. Overdag afspreken, ’s avonds dineren of borrelen.</p>
        <ul class="bullets">
          <li>Dagelijks open, keuken de hele dag in bedrijf</li>
          <li>Privéruimtes: Leeuwarden tot ±50 p., Sneek tot ±100 p.</li>
          <li>Centraal in binnenstad Leeuwarden & Sneek</li>
        </ul>
        <a class="btn-primary" href="Reserveren.php">Tafel reserveren</a>
      </div>
      <div class="split-media">
        <img loading="lazy" src="https://cdn.thefork.com/tf-lab/image/upload/w_1920,c_fill,q_auto,f_auto/restaurant/3e8fbc0a-43cf-4bad-8b7c-6fe265990eaa/dcdf9fc3-d936-4341-be0b-ca891dcb0d95.jpg" alt="Sfeervol interieur van De Walrus">
      </div>
    </section>
  </main>

  <!-- INFOBAR -->
  <?php include __DIR__ . '/_footer.inc.html'; ?>
</body>
</html>
