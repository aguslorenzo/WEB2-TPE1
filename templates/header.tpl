<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parques Nacionales de Argentina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="{BASE_URL}parks">Parques</a>{* preguntar *}
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{BASE_URL}provinces">Provincias</a>{* preguntar *}
  </li>
  {if !isset($smarty.session.USER_ID)}
    <li class="nav-item">
      <a class="nav-link" aria-current="page" href="login">Login</a>
    </li>
  {else} 
    <li class="nav-item ml-auto">
      <a class="nav-link" aria-current="page" href="logout">Logout ({$smarty.session.USER_EMAIL})</a>
    </li>
  {/if}

</ul>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>