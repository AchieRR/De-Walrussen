<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>De Walrus — Reserveren</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Raleway:wght@600&family=Alex+Brush&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="Reserveren.css" />
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
    <!-- TITEL: links/rechts lijn, midden tekst -->
    <div class="page-title" aria-hidden="true">
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="" />
      <h1 class="title-text">Reserveren</h1>
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="" />
    </div>

    <!-- Intro + formulier -->
    <section class="apply-form" aria-labelledby="reserveren-titel">
      <h2 id="reserveren-titel">Leg je reservering vast!</h2>
      <p class="form-intro">
        Bel ons in Leeuwarden: <a href="tel:0582137740">058 213 7740</a> of in Sneek: <a href="tel:0515438100">0515 438 100</a>.
        Mailen kan ook: vul hieronder het formulier in.
      </p>

      <form action="Bedankt.php" method="post">
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
              pattern="^(?:0\\d{9}|(?:\\+|00)31\\d{9})$"
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
            <select id="locatie" name="locatie" required>
              <option value="" disabled selected>Kies een locatie</option>
              <option value="Leeuwarden">De Walrus Leeuwarden</option>
              <option value="Sneek">De Walrus Sneek</option>
            </select>
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
              <option>Bier Arrangement</option>              
              <option>Vergadering</option>
              <option>Workshop</option>
              <option>Evenement</option> 
              <option>Vergadering</option>              
              <option>Diner</option>
              <option>Lunch</option>             

            </select>
          </div>
        </div>

        <!-- Datum | Aantal | Tijd -->
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
              <option>10:00</option><option>10:15</option><option>10:30</option><option>10:45</option>
              <option>11:00</option><option>11:15</option><option>11:30</option><option>11:45</option>
              <option>12:00</option><option>12:15</option><option>12:30</option><option>12:45</option>
              <option>13:00</option><option>13:15</option><option>13:30</option><option>13:45</option>
              <option>14:00</option><option>14:15</option><option>14:30</option><option>14:45</option>
              <option>15:00</option><option>15:15</option><option>15:30</option><option>15:45</option>
              <option>16:00</option><option>16:15</option><option>16:30</option><option>16:45</option>
              <option>17:00</option><option>17:15</option><option>17:30</option><option>17:45</option>
              <option>18:00</option><option>18:15</option><option>18:30</option><option>18:45</option>
              <option>19:00</option><option>19:15</option><option>19:30</option><option>19:45</option>
              <option>20:00</option><option>20:15</option><option>20:30</option><option>20:45</option>
              <option>21:00</option><option>21:15</option><option>21:30</option><option>21:45</option>
              <option>22:00</option><option>22:15</option><option>22:30</option><option>22:45</option>
              <option>23:00</option><option>23:15</option><option>23:30</option><option>23:45</option>
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
