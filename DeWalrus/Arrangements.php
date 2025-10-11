<?php ?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>De Walrus — Arrangementen</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Raleway:wght@600&family=Alex+Brush&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Arrengements.css" />
</head>
<body class="theme-walrus-cream">
  <?php require __DIR__ . '/nav.php'; ?>

  <main class="page-content">
    <div class="page-title" aria-hidden="true">
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="">
      <h1 class="title-text">ARRANGEMENTEN</h1>
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="">
    </div>

    <section class="section">
      <h2>Onze Arrangementen</h2>
      <p class="lead">
        Kies wat past bij je gezelschap. Alle arrangementen zijn te boeken in Leeuwarden
        <a href="tel:0582137740">058 213 7740</a> en Sneek
        <a href="tel:0515438100">0515 438 100</a>.
      </p>

      <div class="arr-grid">
        <article class="arr-card">
          <img src="https://www.dewalrus.nl/mediadepot/392b5b14c0c/610/740/min/WalrusLeeuwardenLR11.jpg" alt="High Tea">
          <div class="arr-card-content">
            <h3>High Tea</h3>
            <div class="meta">Leeuwarden / Sneek</div>
            <p>Zoete en hartige lekkernijen met diverse theesoorten.</p>
            <div class="cta">
              <a class="btn btn-primary" href="reserveren.php?type=high-tea">Reserveren</a>
              <a class="btn btn-ghost" href="Arrangementen/hightea.php">Meer info</a>
            </div>
          </div>
        </article>

        <article class="arr-card">
          <img src="https://www.dewalrus.nl/mediadepot/1861375e626/610/740/min/WalrusLeeuwardenLR85.jpg" alt="Walking Diner Buffet">
          <div class="arr-card-content">
            <h3>Walking Diner Buffet</h3>
            <div class="meta">Leeuwarden / Sneek</div>
            <p>Diverse kleine gangen, ideaal voor groepen.</p>
            <div class="cta">
              <a class="btn btn-primary" href="reserveren.php?type=walking-diner">Reserveren</a>
              <a class="btn btn-ghost" href="Arrangementen/walkingdiner.php">Meer info</a>
            </div>
          </div>
        </article>

        <article class="arr-card">
          <img src="https://www.dewalrus.nl/mediadepot/184ff8d30f0/610/740/min/LucasKemperWalrusSneekLR-172.jpg" alt="Live Cooking Buffet">
          <div class="arr-card-content">
            <h3>Live Cooking Buffet</h3>
            <div class="meta">Sneek</div>
            <p>Onze chefs bereiden jouw gerechten live aan station.</p>
            <div class="cta">
              <a class="btn btn-primary" href="reserveren.php?type=live-cooking">Reserveren</a>
              <a class="btn btn-ghost" href="Arrangementen/livecooking.php">Meer info</a>
            </div>
          </div>
        </article>

        <article class="arr-card">
          <img src="https://www.dewalrus.nl/mediadepot/179a8514be2/610/740/min/kleinLucasKemperWalrusSneekLR-370-.jpg" alt="Bier Arrangement">
          <div class="arr-card-content">
            <h3>Bier Arrangement</h3>
            <div class="meta">Leeuwarden / Sneek</div>
            <p>Selectie ambachtelijke bieren met bijpassende hapjes.</p>
            <div class="cta">
              <a class="btn btn-primary" href="reserveren.php?type=bier">Reserveren</a>
              <a class="btn btn-ghost" href="Arrangementen/bier.php">Meer info</a>
            </div>
          </div>
        </article>

        <article class="arr-card">
          <img src="https://www.dewalrus.nl/mediadepot/194a6a4e3b4/610/740/min/LucasKemperWalrusSneekLR-297.jpg" alt="High Wine">
          <div class="arr-card-content">
            <h3>High Wine</h3>
            <div class="meta">Leeuwarden / Sneek</div>
            <p>Wijnproeverij met bijpassende bites.</p>
            <div class="cta">
              <a class="btn btn-primary" href="reserveren.php?type=high-wine">Reserveren</a>
              <a class="btn btn-ghost" href="Arrangementen/highwine.php">Meer info</a>
            </div>
          </div>
        </article>

        <article class="arr-card">
          <img src="https://www.dewalrus.nl/mediadepot/183782fa5e0/610/740/min/LucasKemperWalrusSneekLR-173.jpg" alt="Dinermenu's voor groepen">
          <div class="arr-card-content">
            <h3>Dinermenu's voor groepen</h3>
            <div class="meta">Leeuwarden / Sneek</div>
            <p>Rustige ruimtes met techniek en catering-opties.</p>
            <div class="cta">
              <a class="btn btn-primary" href="reserveren.php?type=diner">Reserveren</a>
              <a class="btn btn-ghost" href="Arrangementen/dinermenu.php">Meer info</a>
            </div>
          </div>
        </article>

        <article class="arr-card">
          <img src="https://www.dewalrus.nl/mediadepot/4905b5653616/610/740/min/NHLStedenShootBig-13-1024x683.jpg" alt="Boot & Borrel">
          <div class="arr-card-content">
            <h3>Boot & Borrel</h3>
            <div class="meta">Leeuwarden</div>
            <p>Rondvaart met hapjes en drankjes aan boord.</p>
            <div class="cta">
              <a class="btn btn-primary" href="reserveren.php?type=borrel-boot&loc=Leeuwarden">Reserveren</a>
              <a class="btn btn-ghost" href="Arrangementen/bootborrel.php">Meer info</a>
            </div>
          </div>
        </article>

        <article class="arr-card">
          <img src="https://www.dewalrus.nl/mediadepot/3918629cddd/610/740/min/DEWALRUSfinal-selectie173.jpg" alt="Bioscoop Arrangement">
          <div class="arr-card-content">
            <h3>Bioscoop Arrangement</h3>
            <div class="meta">Leeuwarden / Sneek</div>
            <p>Film kijken met een borrelplank en drankjes.</p>
            <div class="cta">
              <a class="btn btn-primary" href="reserveren.php?type=bioscoop">Reserveren</a>
              <a class="btn btn-ghost" href="Arrangementen/bioscoop.php">Meer info</a>
            </div>
          </div>
        </article>

        <article class="arr-card">
          <img src="https://www.dewalrus.nl/mediadepot/48951c007943/610/740/min/theater-sneek-zaal4183119197.jpg" alt="Theater Sneek Arrangement">
          <div class="arr-card-content">
            <h3>Theater Sneek Arrangement</h3>
            <div class="meta">Sneek</div>
            <p>Diner en voorstelling in Theater Sneek.</p>
            <div class="cta">
              <a class="btn btn-primary" href="reserveren.php?type=theater-sneek&loc=Sneek">Reserveren</a>
              <a class="btn btn-ghost" href="Arrangementen/theatersneek.php">Meer info</a>
            </div>
          </div>
        </article>
      </div>
    </section>

    <div class="section-divider" aria-hidden="true"></div>
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
          <strong>Email:</strong> <a href="mailto:info@dewalrussneek.nl">info@dewalrussneek.nl</a>
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
