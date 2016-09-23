<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__."/../inc/Connection.php";
    require_once __DIR__.'/../src/Stylist.php';
    require_once __DIR__."/../src/Client.php";

//Setup
    $app = new Silex\Application();
    $app['debug'] = true;
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

//Home Path
    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });


//Stylist Paths
    $app->get("/stylists", function() use ($app) {
        return $app['twig']->render('stylists.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->post("/stylists", function() use ($app) {
        $stylist = new Stylist($id = null, $_POST['name']);
        $stylist->save();
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->get("/stylists/{id}", function($id) use ($app) {
        $stylist = Stylist::find($id);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });

//Client Paths
    $app->get("/clients", function() use ($app) {
        return $app['twig']->render('clients.html.twig', array('tasks' => Client::getAll()));
    });

    $app->post("/clients", function() use ($app) {
        $id = null;
        $name = $_POST['name'];
        $stylist_id = $_POST['stylist_id'];
        $client = new Client($id, $name, $stylist_id);
        $client->save();
        $stylist = Stylist::find($stylist_id);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });


//End Paths

    return $app;

?>
