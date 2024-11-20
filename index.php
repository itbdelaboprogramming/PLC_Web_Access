<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="output.css" rel="stylesheet">
  <link href="public/css/styles.css" rel="stylesheet">
  <link rel="stylesheet" href="./components/navbar/navbar.css">

  <title>PLC Web Access</title>
</head>

<body>
  <div id="body" class="w-full flex h-svh max-h-svh">

    <?php
    include('./components/navbar/navbar.php')
    ?>

    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

    switch ($page) {
      case 'home':
        include './pages/home.php';
        break;
      case 'energy':
        include './pages/energy.php';
        break;
      default:
        include './pages/home.php';
    }
    ?>


</body>

</html>