<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Site Layout</title>
   @vite(['resources/sass/app.scss'])
</head>

<body>
   <h1>CMS Portfolio</h1>
   <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
         Dropdown button
      </button>
      <ul class="dropdown-menu">
         <li><a class="dropdown-item" href="#">Action</a></li>
         <li><a class="dropdown-item" href="#">Another action</a></li>
         <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
   </div>

   <h1>Tooltip</h1>
   <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top"
      data-bs-title="Tooltip on top">
      Tooltip on top
   </button>
   <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="right"
      data-bs-title="Tooltip on right">
      Tooltip on right
   </button>
   <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom"
      data-bs-title="Tooltip on bottom">
      Tooltip on bottom
   </button>
   <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="left"
      data-bs-title="Tooltip on left">
      Tooltip on left
   </button>

   <h1>Popover</h1>
   <button type="button" class="btn btn-lg btn-danger" data-bs-toggle="popover" data-bs-title="Popover title"
      data-bs-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button>
   @vite(['resources/js/app.js'])
</body>

</html>