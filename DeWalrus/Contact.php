<?php
// DeWalrus/Contact.php
session_start();
if (empty($_SESSION['csrf'])) {
  $_SESSION['csrf'] = bin2hex(random_bytes(32));
}
$csrf = htmlspecialchars($_SESSION['csrf'], ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>De Walrus — Contact</title>

  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Raleway:wght@600&family=Alex+Brush&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Contact.css" />
</head>
<body class="theme-walrus-cream">
  <?php require __DIR__ . '/nav.php'; ?>

  <main class="page-content">
    <div class="page-title" aria-hidden="true">
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="" />
      <h1 class="title-text">CONTACT</h1>
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="" />
    </div>

    <section class="apply-form" aria-labelledby="contact-titel">
      <h2 id="contact-titel">Neem contact met ons op!</h2>
      <p class="form-intro">
        Bel Leeuwarden <a href="tel:0582137740">058 213 7740</a> of Sneek <a href="tel:0515438100">0515 438 100</a>.
        Mailen kan natuurlijk ook — gebruik het formulier hieronder.
      </p>

      <form action="Bedankt/Contactbedankt.php" method="post" novalidate>
        <input type="hidden" name="csrf" value="<?= $csrf ?>">

        <!-- Honeypot -->
        <div style="position:absolute;left:-9999px;top:auto;width:1px;height:1px;overflow:hidden" aria-hidden="true">
          <label for="website">Laat dit veld leeg</label>
          <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
        </div>

        <!-- Persoonlijke gegevens -->
        <h3 class="form-subtitle">Persoonlijke gegevens</h3>
        <div class="form-row-3">
          <div class="form-field">
            <label for="voornaam">Voornaam<span class="req" aria-hidden="true">*</span></label>
            <input type="text" id="voornaam" name="voornaam" autocomplete="given-name" required>
          </div>
          <div class="form-field">
            <label for="tussenvoegsel">Tussenvoegsel</label>
            <input type="text" id="tussenvoegsel" name="tussenvoegsel" autocomplete="additional-name" placeholder="van, de, van der…">
          </div>
          <div class="form-field">
            <label for="achternaam">Achternaam<span class="req" aria-hidden="true">*</span></label>
            <input type="text" id="achternaam" name="achternaam" autocomplete="family-name" required>
          </div>
        </div>

        <!-- Contact -->
        <h3 class="form-subtitle">Contact <span class="req" aria-hidden="true">*</span> <span class="req-note">(vul minimaal e-mail of telefoon in)</span></h3>
        <div class="form-row">
          <div class="form-field">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" autocomplete="email" placeholder="jij@voorbeeld.nl">
          </div>
          <div class="form-field">
            <label for="telefoon">Telefoon (NL)</label>
            <input
              type="tel"
              id="telefoon"
              name="telefoon"
              autocomplete="tel"
              inputmode="tel"
              pattern="^(?:0\\d{9}|(?:\\+|00)31\\d{9})$"
              placeholder="0612345678, +31612345678 of 0031612345678"
              title="Voer 0612345678, +31612345678 of 0031612345678 in.">
          </div>
        </div>

        <!-- Locatie -->
        <h3 class="form-subtitle">Locatie</h3>
        <div class="form-row">
          <div class="form-field">
            <label for="locatie">Voorkeurslocatie<span class="req" aria-hidden="true">*</span></label>
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
          <label for="onderwerp">Onderwerp<span class="req" aria-hidden="true">*</span></label>
          <textarea id="onderwerp" name="onderwerp" rows="1" placeholder="Afspraak maken… (etc.)" required></textarea>
        </div>
        <div class="form-field">
          <label for="bericht">Bericht<span class="req" aria-hidden="true">*</span></label>
          <textarea id="bericht" name="bericht" rows="8" placeholder="Algemene informatie…" required></textarea>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn-submit">Versturen</button>
        </div>
      </form>
    </section>

    <div class="section-divider" aria-hidden="true"></div>
  </main>

  <?php include __DIR__ . '/_footer.inc.html'; ?>
</body>
</html>
