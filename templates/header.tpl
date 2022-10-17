<!DOCTYPE html>
<html lang="en">

<head>
  <base href="{BASE_URL}">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parques Nacionales de Argentina</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
  <nav class= "d-flex justify-content-lg-between bg-info">
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link link-dark" href="parks">Parques</a>{* preguntar *}
      </li>
      <li class="nav-item">
        <a class="nav-link link-dark" href="provinces">Provincias</a>{* preguntar *}
      </li>
      <li class="nav-item">
        {if !isset($smarty.session.IS_LOGGED)}
        <li class="nav-item">
          <a class="nav-link link-dark" aria-current="page" href="login">Login</a>
        </li>
      {else}
        <li class="nav-item ml-auto">
          <a class="nav-link link-dark" aria-current="page" href="logout">Logout ({$smarty.session.USER_EMAIL})</a>
        </li>
      {/if}
    </ul>
    <div class= "ml-auto align-self-center">
      <h4 class= "">Parques Nacionales de Argentina</h4>
    </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>