<style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f4f4f4;
    }
    .queue {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    h1 {
      text-align: center;
    }
    .queue-form {
      text-align: center;
    }
    .queue-form input[type="email"] {
      padding: 10px;
      margin: 10px;
      width: 300px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }
    .queue-form input[type="submit"] {
      padding: 10px 20px;
      border: none;
      background-color: #4CAF50;
      color: white;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="queue">
    <h1>Inscrivez-vous pour être informé de l'ouverture du site web PET'S</h1>
    <p>Nous vous enverrons un e-mail dès que notre site web e-commerce de produits pour animaux de compagnie sera lancé!</p>
    <form class="queue-form" action="inscription.php" method="post">
      <input type="email" name="email" placeholder="Votre adresse e-mail" required>
      <input type="submit" value="S'inscrire">
    </form>
  </div>