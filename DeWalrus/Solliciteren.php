<?php
// DeWalrus/Solliciteren.php — Vacatures + formulier
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>De Walrus — Solliciteren</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Raleway:wght@600&family=Alex+Brush&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="Solliciteren.css" />
</head>
<body class="theme-walrus-cream">

<?php require __DIR__ . '/nav.php'; ?>

<main class="page-content">
  <!-- Titel (NIET AANRAKEN) -->
  <div class="page-title" aria-hidden="true">
    <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="">
    <h1 class="title-text">SOLLICITATIES</h1>
    <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="">
  </div>

  <!-- HERO -->
  <section class="hero-section">
    <div class="hero-side-text">
      <h1>Kom je werken bij De Walrus?</h1>
      <p>
        Is ons grand café al bekend terrein, of lonkt het juist als iets nieuws om te ontdekken?
        We hebben regelmatig verschillende functies open. Denk aan de keuken (chef, sous-chef, keukenhulp),
        de bar, of de bediening op de vloer. Je werkt samen in een hecht team waar goede service
        en gezelligheid hand in hand gaan.
      </p>
      <p>
        Voel je je aangesproken, maar staat de perfecte functie er even niet tussen? Geen probleem.
        Stuur gerust een open sollicitatie en vertel kort waar jij in uitblinkt. We kijken graag mee
        of er een plek in het team past bij jouw talent en beschikbaarheid.
      </p>
      <p>
        Solliciteer via het formulier onderaan deze pagina, dan nodigen we je graag uit voor een kennismaking.
        De koffie is van ons ☕. Laat meteen even weten welke dagen jou het beste uitkomen – wel zo makkelijk
        voor het plannen.
      </p>

      <figure class="hero-photo">
        <img
          src="https://imgs.search.brave.com/sYaaTczU5Xpkc9U1aKX_BYRln7qanY1xqKueMYAEoB4/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93c2Zw/dWJsaWMuYmxvYi5j/b3JlLndpbmRvd3Mu/bmV0L3Byb2Qtbmwv/aW1hZ2VzL3NsaWRl/cjEyOTB4NzI3L3dh/bHJ1cy1sZWV1d2Fy/ZGVuLXdpam5zcGlq/cy1iaWVyLmpwZw"
          alt="Sfeerimpressie werken bij De Walrus">
        <figcaption>Werken bij De Walrus – DE WALRUSSEN</figcaption>
      </figure>
    </div>

    <div class="hero-video" aria-label="Introductievideo De Walrus">
      <h1 class="video-lead">
        In deze video laten we je precies zien hoe het eraan toe gaat: het team, de sfeer en wat je
        op je eerste dag kunt verwachten.
      </h1>
      <div class="video-outer">
        <iframe
          src="https://www.youtube.com/embed/C8Qkj52bfZE"
          title="Je eerste werkdag bij De Walrus"
          loading="lazy"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowfullscreen
        ></iframe>
      </div>

      <div class="below-video">
        <h2>Benieuwd hoe je eerste werkdag bij De Walrus is?</h2>
        <p class="intro-small">
          Je leert snel je collega’s kennen, ontdekt onze manier van werken en proeft de
          sfeer van het grand café. We helpen je op weg zodat je je bij De Walrus al gauw
          helemaal thuis voelt.
        </p>

        <p class="vacature-intro">Ontdek ook onze vacatures:</p>
        <ul class="vacature-links">
          <li><a href="Sollicitatievactures/1Keukenhulp.php">&gt; Keukenhulp/Afwasser</a></li>
          <li><a href="Sollicitatievactures/1Kok.php">&gt; Kok</a></li>
          <li><a href="Sollicitatievactures/1Medewerkerbediening.php">&gt; Medewerker Bediening</a></li>
          <li><a href="Sollicitatievactures/1Supervisorbediening.php">&gt; Supervisor Bediening</a></li>
          <li><a href="Sollicitatievactures/1Schoonmaak.php">&gt; Schoonmaak</a></li>
          <li><a href="Sollicitatievactures/1Restaurantmanager.php">&gt; Restaurant Manager</a></li>
        </ul>

        <div class="open-sollicitatie">
          <span>Staat jouw vacature hier niet tussen?</span>
          <a class="open-link-like" href="Sollicitatievactures/1Opensollicitatie.php">&gt; Open sollicitatie</a>
        </div>
      </div>
    </div>
  </section>

  <div class="section-divider" aria-hidden="true"></div>

  <!-- FORMULIER -->
  <section class="apply-form" aria-labelledby="sollicitatie-titel">
    <h2 id="sollicitatie-titel">Solliciteer via dit formulier!</h2>
    <p class="form-intro">
      Heb je vragen over de mogelijkheden of kom je er niet uit met solliciteren?
      Je kunt ons telefonisch bereiken in Leeuwarden op
      <a href="tel:0582137740">058 213 7740</a> of in Sneek op
      <a href="tel:0515438100">0515 438 100</a>.
      We zien je sollicitatie graag tegemoet!
    </p>

    <form action="Bedankt/Solliciterenbedankt.php" method="post" novalidate>
      <!-- Persoonlijk -->
      <h3 class="form-subtitle">Persoonlijke gegevens</h3>
      <div class="form-row-3">
        <div class="form-field">
          <label for="voornaam">Voornaam*</label>
          <input type="text" id="voornaam" name="voornaam" autocomplete="given-name" required>
        </div>
        <div class="form-field">
          <label for="tussenvoegsel">Tussenvoegsel</label>
          <input type="text" id="tussenvoegsel" name="tussenvoegsel" autocomplete="additional-name" placeholder="van, de, van der…">
        </div>
        <div class="form-field">
          <label for="achternaam">Achternaam*</label>
          <input type="text" id="achternaam" name="achternaam" autocomplete="family-name" required>
        </div>
      </div>

      <!-- Contact -->
      <h3 class="form-subtitle">Contact</h3>
      <div class="form-row">
        <div class="form-field">
          <label for="email">E-mail*</label>
          <input type="email" id="email" name="email" autocomplete="email" placeholder="jij@voorbeeld.nl" required>
        </div>
        <div class="form-field">
          <label for="telefoon">Telefoon (NL)*</label>
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

      <!-- Adres -->
      <h3 class="form-subtitle">Adres</h3>
      <div class="form-row-4">
        <div class="form-field">
          <label for="straat">Straat*</label>
          <input type="text" id="straat" name="straat" autocomplete="address-line1" required>
        </div>
        <div class="form-field">
          <label for="huisnummer">Huisnummer*</label>
          <input type="text" id="huisnummer" name="huisnummer" autocomplete="address-line2" required>
        </div>
        <div class="form-field">
          <label for="postcode">Postcode*</label>
          <input
            type="text" id="postcode" name="postcode"
            autocomplete="postal-code" placeholder="1234 AB"
            pattern="^[1-9][0-9]{3}\\s?[A-Za-z]{2}$" required
            title="Voer een geldige Nederlandse postcode in, bijv. 1234 AB.">
        </div>
        <div class="form-field">
          <label for="woonplaats">Woonplaats*</label>
          <input type="text" id="woonplaats" name="woonplaats" autocomplete="address-level2" required>
        </div>
      </div>

      <!-- Over jezelf -->
      <h3 class="form-subtitle">Over jezelf</h3>
      <div class="form-field">
        <label for="leeftijd">Leeftijd*</label>
        <input
          type="number" id="leeftijd" name="leeftijd"
          min="16" max="80" step="1"
          placeholder="Min leeftijd is 16"
          inputmode="numeric" required
          oninvalid="this.setCustomValidity('Je moet minimaal 16 jaar zijn.')"
          oninput="this.setCustomValidity('')">
      </div>

      <!-- Dienstverband -->
      <h3 class="form-subtitle">Dienstverband</h3>
      <div class="form-row">
        <div class="form-field">
          <label for="dienstverband">Dienstverband*</label>
          <select id="dienstverband" name="dienstverband" required>
            <option value="" disabled selected>Kies een optie</option>
            <option>Fulltime</option>
            <option>Parttime</option>
          </select>
        </div>
        <div class="form-field">
          <label for="maxuren">Max. uren per week</label>
          <input type="number" id="maxuren" name="maxuren" min="1" max="40" placeholder="bijv. 24" title="Maximaal aantal uren per week">
        </div>
      </div>

      <!-- Functie -->
      <h3 class="form-subtitle">Functie</h3>
      <div class="form-field">
        <label for="functie">Functie*</label>
        <select id="functie" name="functie" required>
          <option value="" disabled selected>Kies een functie</option>
          <option value="Keukenhulp/Afwasser">Keukenhulp/Afwasser</option>
          <option value="Kok">Kok</option>
          <option value="Medewerker bediening">Medewerker Bediening</option>
          <option value="Supervisor bediening">Supervisor Bediening</option>
          <option value="Schoonmaak">Schoonmaak</option>
          <option value="Restaurantmanager">Restaurant Manager</option>
          <option value="Anders">Anders</option>
        </select>
      </div>

      <!-- Motivatie -->
      <h3 class="form-subtitle">Motivatie</h3>
      <div class="form-field">
        <label for="motivatie">Motivatie*</label>
        <textarea id="motivatie" name="motivatie" rows="10" placeholder="Vertel kort iets over jezelf en waarom je bij ons wil werken." required></textarea>
      </div>

      <!-- Locatie -->
      <h3 class="form-subtitle">Locatie</h3>
      <div class="form-row">
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

      <!-- Hoe ben je bij ons terecht gekomen -->
      <h3 class="form-subtitle">Hoe ben je bij ons terecht gekomen?</h3>
      <div class="form-field form-field-checklist">
        <label class="sr-only">Bron van je sollicitatie</label>
        <div class="checklist">
          <label><input type="checkbox" name="bron[]" value="vriend"> Via een vriend, familielid, kennis</label>
          <label><input type="checkbox" name="bron[]" value="medewerker"> Via een huidige medewerker van De Walrus</label>
          <label><input type="checkbox" name="bron[]" value="gouden-tip"> Via de Gouden Tip</label>
          <label><input type="checkbox" name="bron[]" value="social"> Social media</label>
          <label><input type="checkbox" name="bron[]" value="nieuwsbrief"> Nieuwsbrief van De Walrus</label>
          <label><input type="checkbox" name="bron[]" value="vacaturebank"> Vacaturebank (bv. Indeed)</label>
          <label><input type="checkbox" name="bron[]" value="poster"> Poster / Flyer</label>
          <label class="checklist-anders">
            <input type="checkbox" name="bron[]" value="anders">
            Anders…
            <input type="text" name="bron_anders" placeholder="(optioneel) licht kort toe">
          </label>
        </div>
      </div>

      <!-- Privacy + verzenden -->
      <label class="checkbox">
        <input type="checkbox" required>
        Ik ga akkoord met het verwerken van mijn gegevens volgens de privacyverklaring.
      </label>

      <div class="form-actions">
        <button type="submit" class="btn-submit">Versturen</button>
      </div>
    </form>
  </section>
</main>

<div class="section-divider" aria-hidden="true"></div>

<!-- INFOBAR (NIET AANRAKEN) -->
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
          Leeuwenburg 11<br>8601 CG Sneek
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
