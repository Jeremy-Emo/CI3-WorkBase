<h1>CECI EST UN TEST</h1>
<?php if($this->currentController == 'home'): ?>
  <p>Home</p>
<?php elseif($this->currentController == 'auth'): ?>
  <p>Auth</p>
<?php endif; ?>

<p><?php print_r($test) ?></p>
