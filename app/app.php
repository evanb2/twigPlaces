<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Places.php";

    session_start();
    if (empty($_SESSION['list_of_places'])) {
        $_SESSION['list_of_places'] = array();
    }

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('result_place.php', array('places' => Place::getAll()));
    });

    $app->post("/result_place", function() use ($app) {
        $place = new Place($_POST['place']);
        $place->save();
        return $app['twig']->render('create_places.php', array('newplace' => $place));
    });

    $app->post("/delete_places", function() use ($app) {
        Place::deleteAll();
        return $app['twig']->render('delete_places.php');
    });

    return $app;

?>
