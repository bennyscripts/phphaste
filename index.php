<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

require 'vendor/autoload.php';

function renderWebpage($webpage) {
  require_once "$webpage";
}

$hash = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 8);
$apiKey = "jju5ghlajdfbg";
$app = new \Slim\App;
$container = $app->getContainer();
$container['renderer'] = new PhpRenderer("protected/templates");

$app->get('/', function (Request $request, Response $response) {
  return $response->withRedirect('/new');
});

$app->get('/new', function (Request $request, Response $response) {
  return $this->renderer->render($response, "/new.php");
});

$app->post('/new', function (Request $request, Response $response) {
  global $apiKey;
  global $hash;

  $key = $request->getHeader("api-key")[0];
  $payload=[];

  if (strval($apiKey) == strval($key)) {
    $text = $request->getHeader("text")[0];

    $hasteFile = fopen("raw/$hash.ph", "w") or die("failed to create haste");
    fwrite($hasteFile, $text);
    fclose($hasteFile);

    array_push($payload, array("code"=>200, "link"=>"https://haste.ghost.cool/$hash"));
  } else {
    array_push($payload, array("code"=>401, "message"=>"Unauthorised"));
  }

  return $response->withJson($payload, 200);
});

foreach (scandir("raw/") as $file) {
  $file = str_replace(".ph", "", $file);
  $app->get("/$file", function (Request $request, Response $response) {
    $currentfile = substr($_SERVER["REQUEST_URI"], 1) . ".ph";

    return $this->renderer->render($response, "/haste.php", ["file"=>$currentfile]);
  });
}

$app->run();
?>
