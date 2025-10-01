<?php
// nav.php — Één bron van waarheid voor de navigatie

// Bepaal huidige file als $current, tenzij die al gezet is door de caller
if (!isset($current)) {
  $current = basename($_SERVER['PHP_SELF']);
}

// Voorkom “Cannot redeclare” als een pagina toch al een active() had
if (!function_exists('active')) {
  function active($file, $current){
    if ($current === 'index.php') return '';     // homepage: geen active-state
    return $current === $file ? ' active' : '';
  }
}
?>
<header>
  <nav class="topnav" role="navigation" aria-label="Hoofdmenu">
    <a href="../index.php" class="logo" aria-label="De Walrus Homepage">
      <span class="walrus">De Walrus</span>
      <span class="grandcafe">— GRAND CAFÉ —</span>
    </a>

    <ul class="nav-list">
      <li><a href="../Menukaart.php"    class="nav-btn<?php echo active('../Menukaart.php', $current); ?>">Menukaart</a></li>
      <li><a href="Arrangements.php" class="nav-btn<?php echo active('Arrangements.php', $current); ?>">Arrangementen</a></li>
      <li><a href="Zakelijk.php"     class="nav-btn<?php echo active('Zakelijk.php', $current); ?>">Zakelijk</a></li>
      <li><a href="Contact.php"      class="nav-btn<?php echo active('Contact.php', $current); ?>">Contact</a></li>

      <li class="push-right">
        <a href="Solliciteren.php" class="nav-btn<?php echo active('Solliciteren.php', $current); ?>">Solliciteren</a>
        <a href="Reserveren.php"  class="nav-btn<?php echo active('Reserveren.php',  $current); ?>">Reserveren</a>
      </li>
    </ul>
  </nav>
</header>
<div class="header-gap" aria-hidden="true"></div>

