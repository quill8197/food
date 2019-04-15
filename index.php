<?php
/**
 * Created by PhpStorm.
 * User: Quill McConnell
 * Date: 4/15/2019
 * Time: 12:58 PM
 * Description: practice routing
 */

    // Turn on error reporting
    ini_set('display_error', 1);
    error_reporting(E_ALL);

    // Require autoload file
    require_once ('vendor/autoload.php');

    // Create an instance of the base class
    $f3 = Base::instance();

    // Turn on Fat-free error reporting
    $f3->set('DEBUG', 3);

    // Define a default route
    $f3->route('GET /', function()
    {
        // Display home view
        $view = new Template();
        echo $view->render('views/home.html');
    });

    // Define a breakfast route
    $f3->route('GET /breakfast', function()
    {
        // Display breakfast view
        $view = new Template();
        echo $view->render('views/breakfast.html');
    });

    // Define a continental breakfast route
    $f3->route('GET /breakfast/continental', function()
    {
        // Display continental breakfast view
        $view = new Template();
        echo $view->render('views/bfast-cont.html');
    });

    // Define a lunch route
    $f3->route('GET /lunch', function()
    {
        // Display lunch view
        $view = new Template();
        echo $view->render('views/lunch.html');
    });

    // Define a brunch buffet route
    $f3->route('GET /lunch/brunch/buffet', function()
    {
        // Display brunch buffet view
        $view = new Template();
        echo $view->render('views/buffet.html');
    });

    // Run Fat-Free
    $f3->run();
