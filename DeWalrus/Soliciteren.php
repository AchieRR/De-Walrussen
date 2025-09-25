<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>De Walrus — Soliciteren</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Raleway:wght@600&family=Alex+Brush&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="Soliciteren.css" />
</head>
<body>
  <!-- Header / Navbar -->
  <header>
    <nav class="topnav" role="navigation" aria-label="Hoofdmenu">
      <div class="nav-left">
        <a href="Soliciteren.php" class="nav-btn btn-solliciteren">Soliciteren</a>
        <a href="Menukaart.php" class="nav-btn btn-menukaart">Menukaart</a>
        <a href="Arrangements.php" class="nav-btn btn-arrangementen" aria-current="page">Arrangements</a>
      </div>

      <a href="Homepage.php" class="logo" aria-label="De Walrus Homepage">
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


  <div class="header-gap" aria-hidden="true"></div>
  <main class="page-content">
   <!-- HERO: tekst links + grote video rechts -->
<section class="hero-section">
  <div class="hero-text">
    <h1>Benieuwd hoe je eerste werkdag bij De Walrus is?</h1>
    <p>
      In deze video laten we je precies zien hoe het eraan toe gaat:
      het team, de sfeer en wat je op je eerste dag kunt verwachten.
      Heb je daarna nog vragen? Stel ze gerust hieronder bij het formulier!
    </p>
  </div>

  <div class="hero-video" aria-label="Introductievideo De Walrus">
    <div class="video-outer">
      <iframe
        src="https://www.youtube.com/watch?v=C8Qkj52bfZE"
        title="Je eerste werkdag bij De Walrus"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen
      ></iframe>
    </div>
  </div>
</section>

<!-- FORMULIER -->
<section class="apply-form" aria-labelledby="sollicitatie-titel">
  <h2 id="sollicitatie-titel">Solliciteer via dit formulier!</h2>
  <form action="#" method="post" enctype="multipart/form-data" novalidate>
    <div class="form-row">
      <div class="form-field">
        <label for="naam">Naam*</label>
        <input type="text" id="naam" name="naam" placeholder="Voor- en achternaam" required>
      </div>
      <div class="form-field">
        <label for="email">E-mail*</label>
        <input type="email" id="email" name="email" placeholder="jij@voorbeeld.nl" required>
      </div>
    </div>

    <div class="form-row">
      <div class="form-field">
        <label for="telefoon">Telefoon</label>
        <input type="tel" id="telefoon" name="telefoon" placeholder="06 12345678" pattern="^(\+?\d[\d\s-]{7,})$">
      </div>
      <div class="form-field">
        <label for="locatie">Voorkeurslocatie*</label>
        <select id="locatie" name="locatie" required>
          <option value="" disabled selected>Kies een locatie</option>
          <option value="Leeuwarden">De Walrus Leeuwarden</option>
          <option value="Sneek">De Walrus Sneek</option>
          <option value="Beide">Beide</option>
        </select>
      </div>
    </div>

    <div class="form-field">
      <label for="motivatie">Motivatie*</label>
      <textarea id="motivatie" name="motivatie" rows="6" placeholder="Vertel kort iets over jezelf en waarom je bij ons wil werken." required></textarea>
    </div>

    <div class="form-row">
      <div class="form-field">
        <label for="cv">CV (PDF of DOC)</label>
        <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx">
      </div>
      <div class="form-field">
        <label for="startdatum">Beschikbaar vanaf</label>
        <input type="date" id="startdatum" name="startdatum">
      </div>
    </div>

    <label class="checkbox">
      <input type="checkbox" required>
      Ik ga akkoord met het verwerken van mijn gegevens volgens de privacyverklaring.
    </label>

    <button type="submit" class="btn-submit">Versturen</button>

    <!-- Tip: vervang action="#" door je eigen verwerkings-endpoint of formulierdienst -->
  </form>
</section>

  </main>
  <!-- einde midden -->

  <!-- Infobar / Footer -->
  <footer class="infobar">
    <div class="infobar-top-text">Kom langs of bel ons — Bekijk onze socials</div>

    <div class="info-content">
      <div class="info-section">
        <h4>De Walrus Leeuwarden</h4>
        <br>
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
        <br>
        <p>
          <a href="https://www.google.com/maps/place/Grand+Caf%C3%A9+De+Walrus+-+Sneek" target="_blank" rel="noopener">
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
