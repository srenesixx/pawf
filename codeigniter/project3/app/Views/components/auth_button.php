<?php
helper('auth');

$currentPath = trim(service('uri')->getPath(), '/');
$loginUrl = $loginUrl ?? base_url('login');
$logoutUrl = $logoutUrl ?? base_url('logout');
$checkPath = $checkPath ?? 'login';
?>

<li class="nav-item">
    <?php if (logged_in()): ?>
        <a class="nav-link" href="<?= $logoutUrl ?>">Logout</a>
    <?php else: ?>
        <a class="nav-link <?= $currentPath === $checkPath ? 'active' : '' ?>" href="<?= $loginUrl ?>">Login</a>
    <?php endif; ?>
</li>