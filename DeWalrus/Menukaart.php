<?php
// DeWalrus/Menukaart.php — Menukaart met crème buitenrand en groen krijtbord binnen
require __DIR__ . '/db.php';

function e($v){ return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
function euro($x){ return '€ ' . number_format((float)$x, 2, ',', '.'); }

/* Tabs bovenaan */
$subTabs = ['Diner','Maaltijdsalades','Soepen','Lunch'];
$currentSub = (isset($_GET['s']) && in_array($_GET['s'], $subTabs, true)) ? $_GET['s'] : 'Diner';

/* Categorie-volgorde per tab (links in de zijlijst) */
$catOrder = [
  'Diner'            => ['DESSERT','VEGETARISCHE GERECHTEN','VIS GERECHTEN','VLEESGERECHTEN','VOORGERECHTEN','KIDSMENU'],
  'Maaltijdsalades'  => ['LUNCH EN DINER SALADES'],
  'Soepen'           => ['LUNCH EN DINER SOEPEN'],
  'Lunch'            => ['BROODJES','LUNCHSPECIALS',"TOSTI'S",'KIDSMENU'],
];

/* Bestaande categorieën voor huidige tab ophalen */
$catsStmt = $pdo->prepare("SELECT DISTINCT category FROM menu_items WHERE is_active=1 AND subcategory=?");
$catsStmt->execute([$currentSub]);
$foundCats = array_column($catsStmt->fetchAll(), 'category');

/* Sorteer categorieën volgens gewenste volgorde */
$orderedCats = array_values(array_filter($catOrder[$currentSub], fn($c) => in_array($c, $foundCats, true)));
if (empty($orderedCats)) $orderedCats = $foundCats; // fallback

/* Items ophalen en per categorie groeperen */
$orderSql = empty($orderedCats)
  ? "category, sort_order, name"
  : "FIELD(category," . implode(',', array_map(fn($c)=>$pdo->quote($c), $orderedCats)) . "), sort_order, name";

$stmt = $pdo->prepare("SELECT category, name, description, price
                       FROM menu_items
                       WHERE is_active=1 AND subcategory=?
                       ORDER BY $orderSql");
$stmt->execute([$currentSub]);
$rows = $stmt->fetchAll();

$byCat = [];
foreach ($rows as $r) $byCat[$r['category']][] = $r;

/* Eerste zichtbare categorie (voor 'één tegelijk' UI) */
$firstCat = $orderedCats[0] ?? null;
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>De Walrus — Menukaart</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Raleway:wght@600&family=Alex+Brush&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="Menukaart.css" />
</head>
<body class="theme-walrus-cream">
  <!-- Header (LAAT IK STAAN) -->
  <header>
    <nav class="topnav" role="navigation" aria-label="Hoofdmenu">
      <div class="nav-left">
        <a href="Solliciteren.php" class="nav-btn btn-solliciteren">Solliciteren</a>
        <a href="Menukaart.php" class="nav-btn">Menukaart</a>
        <a href="Arrangements.php" class="nav-btn">Arrangementen</a>
      </div>

      <a href="index.php" class="logo" aria-label="De Walrus Homepage">
        <span class="walrus">De Walrus</span>
        <span class="grandcafe">— GRAND CAFÉ —</span>
      </a>

      <div class="nav-right">
        <a href="Zakelijk.php" class="nav-btn">Zakelijk</a>
        <a href="Contact.php" class="nav-btn">Contact</a>
        <a href="Reserveren.php" class="nav-btn btn-reserveren">Reserveren</a>
      </div>
    </nav>
  </header>
  <div class="header-gap" aria-hidden="true"></div>

  <main class="page-content">
    <!-- Pagina titel (LAAT IK STAAN) -->
    <div class="page-title" aria-hidden="true">
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="">
      <h1 class="title-text">MENUKAART</h1>
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="">
    </div>

    <!-- Subcategory tabs -->
    <div class="menu-tabs" role="tablist" aria-label="Menukaart secties">
      <?php foreach ($subTabs as $t): ?>
        <a class="menu-tab <?= $t === $currentSub ? 'active' : '' ?>"
           role="tab"
           aria-selected="<?= $t === $currentSub ? 'true' : 'false' ?>"
           href="?s=<?= urlencode($t) ?>"><?= strtoupper($t) ?></a>
      <?php endforeach; ?>
    </div>

    <!-- ======= STAGE (crème buiten) + BOARD (groen krijtbord binnen) ======= -->
    <section class="menu-stage">
      <div class="menu-wrap">
        <!-- Linker kolom: categorieën -->
        <aside class="menu-side" aria-label="Categorieën">
          <div class="menu-side-inner">
            <ul class="menu-cat-nav" role="tablist" aria-orientation="vertical">
              <?php foreach ($orderedCats as $c): 
                $id = 'cat-'.md5($c);
                $isActive = ($c === $firstCat) ? 'true' : 'false';
              ?>
                <li>
                  <a class="cat-link <?= $c===$firstCat?'active':'' ?>"
                     role="tab"
                     aria-selected="<?= $isActive ?>"
                     data-target="#<?= e($id) ?>"
                     href="#<?= e($id) ?>"><?= e($c) ?></a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </aside>

        <!-- Rechter kolom: groene krijtbord content -->
        <div class="menu-board" role="region" aria-live="polite">
          <?php foreach ($orderedCats as $c):
            if (empty($byCat[$c])) continue;
            $id = 'cat-'.md5($c);
            $isActive = ($c === $firstCat);
          ?>
            <section id="<?= e($id) ?>"
                     class="menu-category <?= $isActive?'is-active':'' ?>"
                     role="tabpanel"
                     aria-labelledby="h-<?= e($id) ?>">
              <h3 id="h-<?= e($id) ?>" class="menu-cat-title"><?= e($c) ?></h3>
              <ul class="menu-items">
                <?php foreach ($byCat[$c] as $it): ?>
                  <li class="menu-item">
                    <div class="mi-head">
                      <span class="mi-name"><?= e($it['name']) ?></span>
                      <?php if ((float)$it['price'] > 0): ?>
                        <span class="mi-price"><?= euro($it['price']) ?></span>
                      <?php endif; ?>
                    </div>
                    <?php if (!empty($it['description'])): ?>
                      <p class="mi-desc"><?= e($it['description']) ?></p>
                    <?php endif; ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            </section>
          <?php endforeach; ?>

          <?php if (empty($orderedCats)): ?>
            <div class="menu-empty">
              <p>Geen menu-items gevonden.</p>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
    <!-- ======= EINDE STAGE + BOARD ======= -->
  </main>

  <!-- Footer (LAAT IK STAAN) -->
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

  <!-- Mini script: één categorie tegelijk zichtbaar -->
  <script>
    (function(){
      const links = document.querySelectorAll('.cat-link');
      const panels = document.querySelectorAll('.menu-category');
      function show(targetSel){
        panels.forEach(p => p.classList.remove('is-active'));
        links.forEach(l => l.classList.remove('active'));
        const panel = document.querySelector(targetSel);
        const link = Array.from(links).find(a => a.dataset.target === targetSel);
        if(panel){ panel.classList.add('is-active'); }
        if(link){ link.classList.add('active'); link.setAttribute('aria-selected','true'); }
        window.setTimeout(()=>panel?.scrollIntoView({behavior:'smooth', block:'start'}), 50);
      }
      links.forEach(a=>{
        a.addEventListener('click', (e)=>{
          e.preventDefault();
          const t = a.getAttribute('data-target');
          links.forEach(l=>l.setAttribute('aria-selected','false'));
          show(t);
          history.replaceState(null, '', t); // nette URL-anchor
        });
      });
    })();
  </script>
</body>
</html>
