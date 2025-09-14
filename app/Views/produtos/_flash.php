<!-- Partial de mensagens (placeholder) -->
<?php if (!empty($flash)): ?>
  <div class="flash"><?= htmlspecialchars($flash['msg'] ?? '') ?></div>
<?php endif; ?>
