<?php
require __DIR__ . '/db.php';

function e($v){ return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
function euro($x){ return '€ ' . number_format((float)$x, 2, ',', '.'); }

$subTabs = ['Diner','Maaltijdsalades','Soepen','Lunch'];
$currentSub = (isset($_GET['s']) && in_array($_GET['s'], $subTabs, true)) ? $_GET['s'] : 'Diner';

$catOrder = [
  'Diner'            => ['DESSERT','VEGETARISCHE GERECHTEN','VIS GERECHTEN','VLEESGERECHTEN','VOORGERECHTEN','KIDSMENU'],
  'Maaltijdsalades'  => ['LUNCH EN DINER SALADES'],
  'Soepen'           => ['LUNCH EN DINER SOEPEN'],
  'Lunch'            => ['BROODJES','LUNCHSPECIALS',"TOSTI'S",'KIDSMENU'],
];

$catsStmt = $pdo->prepare("SELECT DISTINCT category FROM menu_items WHERE is_active=1 AND subcategory=?");
$catsStmt->execute([$currentSub]);
$foundCats = array_column($catsStmt->fetchAll(), 'category');

$orderedCats = array_values(array_filter($catOrder[$currentSub] ?? [], fn($c) => in_array($c, $foundCats, true)));
if (empty($orderedCats)) $orderedCats = $foundCats;

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

$firstCat = $orderedCats[0] ?? null;

session_start();
if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(32));
$csrf = $_SESSION['csrf'];
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>De Walrus — Menukaart</title>

  <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;600;700&family=Playfair+Display:wght@400;700;900&family=Raleway:wght@600&family=Alex+Brush&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="Menukaart.css" />
  <link rel="stylesheet" href="Reserveren.css" />

  <style>
  <?php
    // toon alleen het bijbehorende panel wanneer radio checked is
    foreach ($orderedCats as $idx => $c){
      $i = $idx + 1;
      echo "#tab-$i:checked ~ .menu-board .panels #panel-$i{display:block;}";
      // highlight bijbehorend label links
      echo "#tab-$i:checked ~ .menu-side label[for='tab-$i']{outline:2px solid rgba(0,0,0,.16); background:rgba(0,0,0,.08);}";
    }
  ?>
  </style>
</head>
<body class="theme-walrus-cream">

<?php require_once __DIR__ . '/nav.php'; ?>

<main class="page-content">
  <div class="page-title" aria-hidden="true">
    <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="">
    <h1 class="title-text">MENUKAART</h1>
    <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="">
  </div>

  <div class="menu-tabs" role="tablist" aria-label="Menukaart secties">
    <?php foreach ($subTabs as $t): ?>
      <a class="menu-tab <?= $t === $currentSub ? 'active' : '' ?>"
         role="tab"
         aria-selected="<?= $t === $currentSub ? 'true' : 'false' ?>"
         href="?s=<?= urlencode($t) ?>"><?= strtoupper($t) ?></a>
    <?php endforeach; ?>
  </div>

  <section class="menu-stage">
    <div class="menu-wrap">
      <?php
        // radios MOETEN vóór sidebar en board staan zodat CSS (~) beide kan aansturen
        foreach ($orderedCats as $idx => $c):
          $i = $idx + 1;
          $checked = ($c === $firstCat) ? 'checked' : '';
      ?>
        <input type="radio" name="cat" id="tab-<?= $i ?>" class="cat-radio" <?= $checked ?> />
      <?php endforeach; ?>

      <aside class="menu-side" aria-label="Categorieën">
        <div class="menu-side-inner">
          <ul class="menu-cat-nav" role="tablist" aria-orientation="vertical">
            <?php foreach ($orderedCats as $idx => $c): $i=$idx+1; ?>
              <li>
                <label class="cat-link" for="tab-<?= $i ?>"><?= e($c) ?></label>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </aside>

      <div class="menu-board" role="region" aria-live="polite">
        <div class="panels">
        <?php foreach ($orderedCats as $idx => $c):
          if (empty($byCat[$c])) continue; $i=$idx+1; ?>
          <section id="panel-<?= $i ?>" class="menu-category" role="tabpanel" aria-labelledby="h-panel-<?= $i ?>">
            <h3 id="h-panel-<?= $i ?>" class="menu-cat-title"><?= e($c) ?></h3>
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
          <div class="menu-empty"><p>Geen menu-items gevonden.</p></div>
        <?php endif; ?>
        </div>
      </div>
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
