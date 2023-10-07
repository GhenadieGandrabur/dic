<!DOCTYPE html>
<html>

<head>
  <title>Button Next to Input</title>
  <style>
    .input-container {
      display: flex;
      align-items: center;
    }

    input[type="text"] {
      flex: 1;
      padding: 10px;
    }

    button {
      padding: 10px;
    }
  </style>
</head>

<body>
  <div class="input-container">
    <input type="text" id="myInput">
    <button onclick="alert('Button Clicked')">Click</button>
  </div>
</body>

</html>