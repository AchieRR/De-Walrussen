<?php
// nav.php — Één bron van waarheid voor de navigatie

// Zet $BASE. Als je site in een submap draait (bv. /DeWalrus/), zet dat pad hier.
// Voor domein root (bv. https://walrus.host/) gewoon '/'.
if (!isset($BASE)) {
  $BASE = '/';
}

// Bepaal huidige file voor active state
if (!isset($current)) {
  $current = basename($_SERVER['PHP_SELF']);
}

// Active helper
if (!function_exists('active')) {
  function active($file, $current) {
    if ($current === 'index.php') return ''; // homepage heeft geen active
    return $current === $file ? ' active' : '';
  }
}
?>
<header>
  <nav class="topnav" role="navigation" aria-label="Hoofdmenu">
    <a href="<?= $BASE ?>index.php" class="logo" aria-label="De Walrus Homepage">
      <span class="walrus">De Walrus</span>
      <span class="grandcafe">— GRAND CAFÉ —</span>
    </a>

    <ul class="nav-list">
      <li><a href="<?= $BASE ?>Menukaart.php" class="nav-btn<?= active('Menukaart.php', $current) ?>">Menukaart</a></li>
      <li><a href="<?= $BASE ?>Arrangements.php" class="nav-btn<?= active('Arrangements.php', $current) ?>">Arrangementen</a></li>
      <li><a href="<?= $BASE ?>Zakelijk.php" class="nav-btn<?= active('Zakelijk.php', $current) ?>">Zakelijk</a></li>
      <li><a href="<?= $BASE ?>Contact.php" class="nav-btn<?= active('Contact.php', $current) ?>">Contact</a></li>

      <li class="push-right">
        <a href="<?= $BASE ?>Solliciteren.php" class="nav-btn<?= active('Solliciteren.php', $current) ?>">Solliciteren</a>
        <a href="<?= $BASE ?>Reserveren.php" class="nav-btn<?= active('Reserveren.php', $current) ?>">Reserveren</a>
      </li>
    </ul>
  </nav>
</header>
<div class="header-gap" aria-hidden="true"></div>
