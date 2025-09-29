<?php
// (optioneel) PHP-logica later; nu puur markup.
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>De Walrus — Arrangementen</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Raleway:wght@600&family=Alex+Brush&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="Arrengements.css" />
</head>
<body class="theme-walrus-cream"> <!-- foto-achtergrond ingeschakeld -->
  <!-- Header / Navbar -->
  <header>
    <nav class="topnav" role="navigation" aria-label="Hoofdmenu">
      <div class="nav-left">
        <a href="Solliciteren.php" class="nav-btn btn-solliciteren">Solliciteren</a>
        <a href="Menukaart.php" class="nav-btn btn-menukaart">Menukaart</a>
        <a href="Arrangements.php" class="nav-btn btn-arrangementen">Arrangementen</a>
      </div>

      <a href="index.php" class="logo" aria-label="De Walrus Homepage">
        <span class="walrus">De Walrus</span>
        <span class="grandcafe">— GRAND CAFÉ —</span>
      </a>

      <div class="nav-right">
        <a href="Zakelijk.php" class="nav-btn btn-zakelijk">Zakelijk</a>
        <a href="Contact.php" class="nav-btn btn-contact">Contact</a>
        <a href="Reserveren.php" class="nav-btn btn-reserveren">Reserveren</a>
      </div>
    </nav>
  </header>

  <!-- ruimte onder fixed header -->
  <div class="header-gap" aria-hidden="true"></div>

  <main class="page-content">
    <!-- Titel met lijnen links/rechts -->
    <div class="page-title" aria-hidden="true">
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="">
      <h1 class="title-text">Arrangementen</h1>
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="">
    </div>

    <!-- Intro + grid met kaarten -->
    <section class="section">
      <h2>Onze arrangementen</h2>
      <p class="lead">Kies wat past bij je gezelschap. Alle arrangementen zijn te boeken in Leeuwarden <a href="tel:0582137740">058 213 7740</a> en Sneek <a href="tel:0515438100">0515 438 100</a>.</p>

      <div class="arr-grid">
        <!-- High Tea -->
        <article class="arr-card">
          <img src="img/high-tea.jpg" alt="High Tea">
          <div class="arr-card-content">
            <h3>High Tea</h3>
            <div class="meta">2 uur • €25 p.p.</div>
            <p>Zoete en hartige lekkernijen met diverse theesoorten.</p>
            <div class="cta">
              <a class="btn btn-primary" href="Reserveren.php">Reserveren</a>
              <a class="btn" href="hightea.php">Meer info</a>
            </div>
          </div>
        </article>

        <!-- Walking Diner -->
        <article class="arr-card">
          <img src="img/walking-diner.jpg" alt="Walking Diner Buffet">
          <div class="arr-card-content">
            <h3>Walking Diner Buffet</h3>
            <div class="meta">Avond • €40 p.p.</div>
            <p>Diverse kleine gangen, ideaal voor groepen.</p>
            <div class="cta">
              <a class="btn btn-primary" href="Reserveren.php">Reserveren</a>
              <a class="btn" href="walkingdiner.php">Meer info</a>
            </div>
          </div>
        </article>

        <!-- Live Cooking -->
        <article class="arr-card">
          <img src="https://www.dewalrus.nl/mediadepot/184ff8d30f0/610/740/min/LucasKemperWalrusSneekLR-172.jpg" alt="Live Cooking Buffet">
          <div class="arr-card-content">
            <h3>Live Cooking Buffet</h3>
            <div class="meta">Op maat • vanaf €20 p.p.</div>
            <p>Onze chefs bereiden jouw gerechten live aan station.</p>
            <div class="cta">
              <a class="btn btn-primary" href="Reserveren.php">Reserveren</a>
              <a class="btn" href="livecooking.php">Meer info</a>
            </div>
          </div>
        </article>

        <!-- Bierproeverij -->
        <article class="arr-card">
          <img src="img/beer-arr.jpg" alt="Bier Arrangement">
          <div class="arr-card-content">
            <h3>Bier Arrangement</h3>
            <div class="meta">Tasting • €30 p.p.</div>
            <p>Selectie ambachtelijke bieren met bijpassende hapjes.</p>
            <div class="cta">
              <a class="btn btn-primary" href="Reserveren.php">Reserveren</a>
              <a class="btn" href="bierarrangement.php">Meer info</a>
            </div>
          </div>
        </article>

        <!-- High Wine -->
        <article class="arr-card">
          <img src="img/high-wine.jpg" alt="High Wine">
          <div class="arr-card-content">
            <h3>High Wine</h3>
            <div class="meta">Middag/avond • €32,50 p.p.</div>
            <p>Wijnproeverij met bijpassende bites.</p>
            <div class="cta">
              <a class="btn btn-primary" href="Reserveren.php">Reserveren</a>
              <a class="btn" href="highwine.php">Meer info</a>
            </div>
          </div>
        </article>

        <!-- Vergadering -->
        <article class="arr-card">
          <img src="img/meeting.jpg" alt="Vergadering">
          <div class="arr-card-content">
            <h3>Vergadering</h3>
            <div class="meta">Op maat • prijs in overleg</div>
            <p>Rustige ruimtes met techniek en catering-opties.</p>
            <div class="cta">
              <a class="btn btn-primary" href="Reserveren.php">Reserveren</a>
              <a class="btn" href="vergadering.php">Meer info</a>
            </div>
          </div>
        </article>

        <!-- boot & borrel -->
        <article class="arr-card">
          <img src="img/boot-borrel.jpg" alt="Boot & Borrel">
          <div class="arr-card-content">
            <h3>Boot & Borrel</h3>
            <div class="meta">2 uur • €45 p.p.</div>
            <p>Rondvaart met hapjes en drankjes aan boord.</p>
            <div class="cta">
              <a class="btn btn-primary" href="Reserveren.php">Reserveren</a>
              <a class="btn" href="bootborrel.php">Meer info</a>
            </div>
          </div>
        </article>

        <!-- Bioscoop Arrangement -->
        <article class="arr-card">
          <img src="img/cinema-arr.jpg" alt="Bioscoop Arrangement">
          <div class="arr-card-content">
            <h3>Bioscoop Arrangement</h3>
            <div class="meta">Avond • €35 p.p.</div>
            <p>Film kijken met een borrelplank en drankjes.</p>
            <div class="cta">
              <a class="btn btn-primary" href="Reserveren.php">Reserveren</a>
              <a class="btn" href="bioscoop.php">Meer info</a>
            </div>
          </div>
        </article>

        <!-- Theater Sneek - Arrangement -->
        <article class="arr-card">
          <img src="img/theater-arr.jpg" alt="Theater Sneek Arrangement">
          <div class="arr-card-content">
            <h3>Theater Sneek Arrangement</h3>
            <div class="meta">Avond • €50 p.p.</div>
            <p>Diner en voorstelling in Theater Sneek.</p>
            <div class="cta">
              <a class="btn btn-primary" href="Reserveren.php">Reserveren</a>
              <a class="btn" href="theatersneek.php">Meer info</a>
            </div>
          </div>
        </article>
      </div>
    </section>

    <div class="section-divider" aria-hidden="true"></div>
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
          <a href="https://www.facebook.com/DeWalrusSneek/?locale=nl_NL" target="_blank" rel="noopener">
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
