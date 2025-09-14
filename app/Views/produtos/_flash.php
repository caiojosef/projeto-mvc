<?php if (isset($_SESSION['flash'])): ?>
  <div class="flash <?= $_SESSION['flash']['tipo'] ?>">
    <?= $_SESSION['flash']['mensagem'] ?>
  </div>
  <?php unset($_SESSION['flash']); ?>
<?php endif; ?>