<html>
  <head>
    <title>phphaste — New</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="phphaste">
    <meta name="twitter:description" content="A free and open source hastebin server built in PHP and Slim.">
    <meta name="twitter:image" content="https://i.imgur.com/RI6Pa2Y.png">
    <meta name="theme-color" content="#95BFCA">

    <link rel="stylesheet" href="/assets/style.css?v=24">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/styles/default.min.css">

    <script src="https://kit.fontawesome.com/faad56354a.js" crossorigin="anonymous"></script>
  </head>
  <body style="color: #7f8d94; background-color: #141e24; font-size: 16px; margin: 0; height: 100%; font-family: Consolas;">
    <div style="width: 80vw;">
      <div class="linenos">></div>
      <pre><textarea form="form" id="textarea" placeholder="Start typing here...."></textarea></pre>
    </div>
    <div class="top-right">
      <div class="text-center p-3" style="background-color: #17242775; height: auto;">
        <h4 class="font-italic pb-0 mb-0" style="color: #95BFCA;"><a href="/"><span style="color: #6c9fac;"><b>php</b></span>haste</a></h4>
      </div>
      <div class="row no-gutters">
        <div class="col-4">
          <form id="form" onsubmit="createHaste(); return false;" class="mb-0">
            <button onmouseover="buttonInformation('Save haste')" onmouseout="hideButtonInformation()" form="form" type="submit"><i class="far fa-save"></i></button>
          </form>
        </div>
        <div class="col-4">
          <button onmouseover="buttonInformation('New haste')" onmouseout="hideButtonInformation()" class="button" onclick="newHaste()"><i class="far fa-plus-square"></i></button>
        </div>
        <div class="col-4">
          <button onmouseover="buttonInformation('Share haste')" onmouseout="hideButtonInformation()" class="button" onclick="shareHaste()"><i class="far fa-share-square"></i></button>
        </div>
      </div>
      <div id="btnInfoBox" style="display: none; background-color: #2a4149; font-size: 87.6%;" class="p-2 text-center"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>
    <script src="/assets/main.js?v=4"></script>
  </body>
</html>
