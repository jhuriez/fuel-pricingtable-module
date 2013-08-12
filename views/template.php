<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Backend for module PricingTable</title>

        <?= \Asset::render('layout'); ?>
        <?= \Asset::render('js_top'); ?>
    </head>

    <body>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Pricing Table</a>
                <div class="nav-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/pricingtable/backend/">Dashboard</a></li>
                        <li><a href="/pricingtable/backend/theme">Themes</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>

        <div class="container">

            <?php if($dataGlobal['use_message'] && \Messages::any()): ?>
                <?php foreach(array('info', 'success', 'warning', 'error') as $type): ?>
                    <?php foreach (\Messages::instance()->get($type) as $message): ?>
                        <div class="alert alert-<?= $message['type']; ?>"><?= $message['body']; ?></div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                <?php \Messages::reset(); ?>
            <?php endif; ?>


            <?php if (isset($partials['content'])): ?>
                <div class="content">
                    <?= $partials['content']; ?>
                </div>
            <?php endif; ?>
        </div><!-- /.container -->

        <?= \Asset::render('js_footer'); ?>
    </body>
</html>