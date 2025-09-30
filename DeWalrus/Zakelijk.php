<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/> <!-- mobiel schaal -->
  <title>De Walrus — Zakelijk</title>

  <!-- Fonts --> <!-- externe lettertypes -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Raleway:wght@600&family=Alex+Brush&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="Zakelijk.css" /> <!-- koppel css -->
</head>
<body class="theme-walrus-cream"> <!-- themaklasse -->
  <!-- Header / Navbar -->
  <header>
    <nav class="topnav" role="navigation" aria-label="Hoofdmenu"> <!-- hoofdmenu -->
      <div class="nav-left">
        <a href="Solliciteren.php" class="nav-btn btn-solliciteren">Solliciteren</a>
        <a href="Menukaart.php" class="nav-btn btn-menukaart">Menukaart</a>
        <a href="Arrangements.php" class="nav-btn btn-arrangementen">Arrangementen</a>
      </div>

      <a href="index.php" class="logo" aria-label="De Walrus Homepage"> <!-- home link -->
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

  <!-- Ruimte onder de vaste header zodat content niet eronder valt -->
  <div class="header-gap" aria-hidden="true"></div> <!-- spacer onder header -->

  <main class="page-content">
         <!-- Titel met lijnen links/rechts -->
    <div class="page-title" aria-hidden="true"> <!-- decoratieve titel -->
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="">
      <h1 class="title-text">ZAKELIJK</h1>
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="">
    </div>


<!-- beginnen met wat je wilt-->





<h><img src="https://res.cloudinary.com/tf-lab/image/upload/restaurant/c8eb54b1-e746-4a1e-8cb0-8e677bac8197/1ea6f09b-dbdb-409f-bc79-3d266b0bb929.jpg" alt="" width="750" height="333"></h>

<h><img src="https://vmn-missethoreca.imgix.net/uploads/2022/06/de-walrus-sneek.jpg?auto=compress%2Cformat&q=50&w=600"></h>

<h1>Vergaderen, maar wel even weg uit de sleur van ‘het kantoor’?</h1>
<p1>Dan wil je vergaderen op een mooie locatie die niet aanvoelt als je kantoor! Bij De Walrus kun je het noodzakelijke met het aangename combineren. Want in ons Grand Café in Leeuwarden en Sneek ontmoet je elkaar op een toegankelijke manier, heb je andere gesprekken en kun je gelijk blijven lunchen, dineren of borrelen.</p1>

<h1>Vergaderen in Sneek of Leeuwarden? De feiten op een rij:</h1>

<p>-Vergaderarrangement vanaf €13,75 per persoon!</p>
<p>-Meerdere (prive)ruimtes tot 100 personen beschikbaar</p>
<p>-Beide restaurants liggen in hartje centrum</p>
<p>-Combineer jouw meeting met een lunch, diner of borrel. Alles onder één dak</p>
<p>-Alle zakelijke benodigdheden: van pennen tot beamers en van flipovers tot statafels</p>
<p>-Ook jouw presentatie, brainstorm, receptie en jubileum bij De Walrus</p>


<h1>Vergadering met lunch, diner of borrel in Sneek of Leeuwarden?</h1>


<p>Net als bij elke locatie voor vergaderingen en zakelijke evenementen kun je bij ons ook privé-ruimtes reserveren. Of, pak met je collega’s een tafel in één van de gezellige hoeken in het restaurant in Sneek of Leeuwarden.
</p>

<p>We hebben alvast verschillende arrangementen samengesteld, maar denken ook graag met je mee. Bitterballen na 30 minuten of Gin-Tonics bij het vragenrondje? Alles kan en alles mag. En de zakelijke benodigdheden? Die hebben we ook: van pennen tot beamers en van flipovers tot statafels.
</p>

<p>Voor groepen tot vijftig hebben we diverse arrangementen samengesteld. Is de groep groter of heb je andere wensen? Geen probleem! Neem contact op voor een arrangement op maat.</p>


<h1>Bekijk de arrangementen</h1>

<p><a href="Arrangements.php" class="nav-btn btn-Arrangements">Arrangements</a>
  




</p>






     <!-- FORMULIER -->
    <section class="apply-form" aria-labelledby="sollicitatie-titel">
      <h2 id="sollicitatie-titel">Neem contact met ons op!</h2>
      <p class="form-intro">
        Onze telefoon staat bíjna altijd aan en je kan ons bereiken in Leeuwarden op 
        <a href="tel:0582137740">058 213 7740</a> of in Sneek op
        <a href="tel:0515438100">0515 438 100</a>.
        Een mailtje sturen mag natuurlijk ook! Vul daarvoor het formulier hieronder in.
      </p>

      <form action="Bedankt.php" method="post"  novalidate>
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
              pattern="^(?:0\d{9}|(?:\+?31)\d{9})$"
              placeholder="0612345678 of +31612345678"
              required
              title="Voer 0612345678 in of +31612345678.">
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

 
 
 
 
  </main>
  <!-- einde midden -->

  <!-- Infobar / Footer -->
  <footer class="infobar"> <!-- visuele footer -->
    <div class="infobar-top-text">Kom langs of bel ons — Bekijk onze socials</div>

    <div class="info-content">
      <div class="info-section"> <!-- vestiging lwd -->
        <h4>De Walrus Leeuwarden</h4>
        <br>
        <p>
          <a href="https://www.google.com/maps/place/Grand+Caf%C3%A9+De+Walrus+-+Leeuwarden" target="_blank" rel="noopener"> <!-- nieuwe tab veilig -->
            Gouverneursplein 37<br>
            8911 HH Leeuwarden
          </a><br><br>
          Zondag t/m Zaterdag van 10:00 tot 01:00<br><br>
          <strong>Tel:</strong> <a href="tel:0582137740">058-2137740</a><br>
          <strong>Email:</strong> <a href="mailto:info@dewalrusleeuwarden.nl">info@dewalrusleeuwarden.nl</a>
        </p>
        <div class="socials">
          <a href="https://www.facebook.com/DeWalrusLeeuwarden/?locale=nl_NL" target="_blank" rel="noopener">
            <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/facebook.svg" class="social-icon" alt="Facebook"> <!-- vector icoon -->
          </a>
          <a href="https://www.instagram.com/dewalrusleeuwarden/" target="_blank" rel="noopener">
            <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/instagram.svg" class="social-icon" alt="Instagram">
          </a>
        </div>
      </div>

      <div class="info-section"> <!-- vestiging sneek -->
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

      <div class="right-side"> <!-- visuals en maps -->
        <div class="infobar-right-text">Leuk dat je bent geweest</div>
        <div class="city-images">
          <a href="https://www.google.com/maps/place/Grand+Caf%C3%A9+De+Walrus+-+Leeuwarden" target="_blank" rel="noopener">
            <img src="https://res.cloudinary.com/laad-media-b-v/image/upload/s--J6Q_KcqC--/c_scale,dpr_auto,f_auto,q_auto:best/v1/Afbeeldingen%20knooppunten/266-8911/Grand-Caf%C3%A9_De_Walrus_Leeuwarden" alt="De Walrus Leeuwarden"> <!-- cdn optimalisatie -->
          </a>
          <a href="https://www.google.com/maps/place/Grand+Caf%C3%A9+De+Walrus+-+Sneek" target="_blank" rel="noopener">
            <img src="https://res.cloudinary.com/laad-media-b-v/image/upload/s--dLwzwzgP--/c_scale,dpr_auto,f_auto,q_auto:best/v1/Afbeeldingen%20knooppunten/513-8601/Grand-Caf%C3%A9_De_Walrus_Sneek" alt="De Walrus Sneek">
          </a>
        </div>
      </div>
    </div>

    <div class="infobar-brand"> <!-- merk lockup -->
      <span class="walrus">De Walrus</span>
      <span class="grandcafe">— GRAND CAFÉ —</span>
    </div>
  </footer>
</body>
</html>
