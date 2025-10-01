<?php
// Verwacht variabele $base:
// - op de overzichtspagina in de root: $base = 'Sollicitatievactures/';
// - op de vacaturepagina's in deze map: $base = '';
if (!isset($base)) { $base = ''; }
?>
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
        <li><a href="<?= $base ?>1Keukenhulp.php">&gt; Keukenhulp/Afwasser</a></li>
        <li><a href="<?= $base ?>1Kok.php">&gt; Kok</a></li>
        <li><a href="<?= $base ?>1Medewerkerbediening.php">&gt; Medewerker Bediening</a></li>
        <li><a href="<?= $base ?>1Supervisorbediening.php">&gt; Supervisor Bediening</a></li>
        <li><a href="<?= $base ?>1Schoonmaak.php">&gt; Schoonmaak</a></li>
        <li><a href="<?= $base ?>1Restaurantmanager.php">&gt; Restaurant Manager</a></li>
      </ul>

      <div class="open-sollicitatie">
        <span>Staat jouw vacature hier niet tussen?</span>
        <a class="open-link-like" href="<?= $base ?>1Opensollicitatie.php">&gt; Open sollicitatie</a>
      </div>
    </div>
  </div>
</section>
