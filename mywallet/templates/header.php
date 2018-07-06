<!DOCTYPE html>

<html>

    <head>

        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>My Digital Wallet: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>My Digital Wallet</title>
        <?php endif ?>

        <script src="/js/jquery-1.11.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/scripts.js"></script>

    </head>

    <body class="container">

        <div class="container">

            <div id="top">
                <a href="/"><img alt="My Digital Wallet" src="/img/logo.gif"/></a>
            </div>
            

            <div id="middle">
