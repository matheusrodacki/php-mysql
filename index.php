<?php

$produtoCafe = [
  [
    "nome" => "Café Cremoso",
    "descricao" => "Café cremoso irresistivelmente suave e que envolve seu paladar",
    "preco" => 5.00,
    "foto" => "img/cafe-cremoso.jpg"
  ],
  [
    "nome" => "Café com Leite",
    "descricao" => "Café com leite quente e cremoso, perfeito para começar o dia",
    "preco" => 6.00,
    "foto" => "img/cafe-com-leite.jpg"
  ],
  [
    "nome" => "Café Expresso",
    "descricao" => "Café expresso forte e encorpado, perfeito para quem gosta de um café mais forte",
    "preco" => 4.00,
    "foto" => "img/cappuccino.jpg"
  ],
  [
    "nome" => "Café Gelado",
    "descricao" => "Café gelado com chantilly e calda de caramelo, perfeito para os dias quentes",
    "preco" => 7.00,
    "foto" => "img/cafe-gelado.jpg"
  ]
];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="css/reset.css" />
  <link rel="stylesheet" href="css/index.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <title>Serenatto - Cardápio</title>
</head>

<body>
  <main>
    <section class="container-banner">
      <div class="container-texto-banner">
        <img src="img/logo-serenatto.png" class="logo" alt="logo-serenatto" />
      </div>
    </section>
    <h2>Cardápio Digital</h2>
    <section class="container-cafe-manha">
      <div class="container-cafe-manha-titulo">
        <h3>Opções para o Café</h3>
        <img class="ornaments" src="img/ornaments-coffee.png" alt="ornaments" />
      </div>
      <div class="container-cafe-manha-produtos">
        <?php
        foreach ($produtoCafe as $produto) {
        ?>
          <div class="container-produto">
            <div class="container-foto">
              <img src="<?= $produto['foto']; ?>" />
            </div>
            <p><?= $produto['nome']; ?></p>
            <p><?= $produto['descricao']; ?></p>
            <p><?= 'R$ ' . $produto['preco']; ?></p>
          </div>
        <?php
        }
        ?>
      </div>
    </section>
    <section class="container-almoco">
      <div class="container-almoco-titulo">
        <h3>Opções para o Almoço</h3>
        <img class="ornaments" src="img/ornaments-coffee.png" alt="ornaments" />
      </div>
      <div class="container-almoco-produtos">
        <div class="container-produto">
          <div class="container-foto">
            <img src="img/bife.jpg" />
          </div>
          <p>Bife</p>
          <p>Bife, arroz com feijão e uma deliciosa batata frita</p>
          <p>R$ 27.90</p>
        </div>
        <div class="container-produto">
          <div class="container-foto">
            <img src="img/prato-peixe.jpg" />
          </div>
          <p>Filé de peixe</p>
          <p>Filé de peixe salmão assado, arroz, feijão verde e tomate.</p>
          <p>R$ 24.99</p>
        </div>
        <div class="container-produto">
          <div class="container-foto">
            <img src="img/prato-frango.jpg" />
          </div>
          <p>Frango</p>
          <p>
            Saboroso frango à milanesa com batatas fritas, salada de repolho e
            molho picante
          </p>
          <p>R$ 23.00</p>
        </div>
        <div class="container-produto">
          <div class="container-foto">
            <img src="img/fettuccine.jpg" />
          </div>
          <p>Fettuccine</p>
          <p>
            Prato italiano autêntico da massa do fettuccine com peito de
            frango grelhado
          </p>
          <p>R$ 22.50</p>
        </div>
      </div>
    </section>
  </main>
</body>

</html>