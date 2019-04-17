<?php
/**
* Created by PhpStorm.
* User: Quill McConnell
* Date: 4/15/2019
* Time: 12:58 PM
* Description: practice routing
*/

// Start a session
session_start();

// Turn on error reporting
ini_set('display_error', 1);
error_reporting(E_ALL);

// Require autoload file
require_once ('vendor/autoload.php');

// Include header
//include('views/head.html');

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

// Define a route with a parameter
$f3->route('GET /@item', function($f3, $params)
{
    $item = $params['item'];
    $foodsWeServe = array('spaghetti', 'enchiladas', 'pad tai', 'lumpia');

    if (!in_array($item, $foodsWeServe))
    {
        echo "We don't serve $item.";
    }

    switch ($item)
    {
        case 'spaghetti':
            echo "<h3>I like $item with meatballs.</h3>";
            break;
        case 'pizza':
            echo "<h3>Pepperoni or veggie?</h3>";
            break;
        case 'tacos':
            echo "<h3>We don't have $item</h3>";
            break;
        case 'bagel':
            $f3->reroute("/breakfast/continental");
            break;
        default:
            $f3->error(404);
    }
});

// Define a route that takes 2 parameters
$f3->route('GET /@first/@last', function($f3, $params)
{
    $first = ucfirst($params['first']);
    $last = ucfirst($params['last']);
    echo "<h1>Hello, $first $last!</h1>";
});

// Define an order route
$f3->route('GET /order', function()
{
    // Display order view
    $view = new Template();
    echo $view->render('views/form1.html');
});

// Define an order process route
$f3->route('POST /order-process', function()
{
    //print_r($_POST);
    $_SESSION['food'] = $_POST['food'];

    // Display order-process view
    $view = new Template();
    echo $view->render('views/form2.html');
});

// Define a summary route
$f3->route('POST /summary', function()
{
    // Display summary view
    $view = new Template();
    echo $view->render('views/summary.html');
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
