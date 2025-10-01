<?php // gedeeld sollicitatieformulier ?>
<section class="apply-form" aria-labelledby="sollicitatie-titel">
  <h2 id="sollicitatie-titel">Solliciteer via dit formulier!</h2>
  <p class="form-intro">
    Heb je vragen over de mogelijkheden of kom je er niet uit met solliciteren?
    Bel Leeuwarden <a href="tel:0582137740">058 213 7740</a> of Sneek <a href="tel:0515438100">0515 438 100</a>.
  </p>

  <form action="../Bedankt/Solliciterenbedankt.php" method="post" novalidate>
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
        <input type="tel" id="telefoon" name="telefoon" autocomplete="tel" inputmode="tel"
               pattern="^(?:0\d{9}|(?:\+|00)31\d{9})$"
               placeholder="0612345678, +31612345678 of 0031612345678" required
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
        <input type="text" id="postcode" name="postcode" autocomplete="postal-code" placeholder="1234 AB"
               pattern="^[1-9][0-9]{3}\s?[A-Za-z]{2}$" required
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
      <input type="number" id="leeftijd" name="leeftijd" min="16" max="80" step="1"
             placeholder="Min leeftijd is 16" inputmode="numeric" required
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
      <input type="checkbox" name="privacy_ok" value="1" required>
      Ik ga akkoord met het verwerken van mijn gegevens volgens de privacyverklaring.
    </label>

    <div class="form-actions">
      <button type="submit" class="btn-submit">Versturen</button>
    </div>
  </form>
</section>
