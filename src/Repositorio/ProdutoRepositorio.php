<?php


class ProdutoRepositorio
{

  public function __construct(private PDO $pdo)
  {
  }

  public function opcoesCafe(): array
  {
    $sql = "SELECT * FROM produtos WHERE tipo = 'Cafe' ORDER BY preco";
    $stmt = $this->pdo->query($sql);
    $produtosCafe = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $dadosCafe = array_map(function ($cafe) {
      return new Produto(
        (int) $cafe['id'],
        $cafe['tipo'],
        $cafe['nome'],
        $cafe['descricao'],
        $cafe['imagem'],
        (float) $cafe['preco']
      );
    }, $produtosCafe);

    return $dadosCafe;
  }

  public function opcoesAlmoco(): array
  {
    $sql = "SELECT * FROM produtos WHERE tipo = 'Almoço' ORDER BY preco";
    $stmt = $this->pdo->query($sql);
    $produtosAlmoco = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $dadosAlmoco = array_map(function ($almoco) {
      return new Produto(
        (int) $almoco['id'],
        $almoco['tipo'],
        $almoco['nome'],
        $almoco['descricao'],
        $almoco['imagem'],
        (float) $almoco['preco']
      );
    }, $produtosAlmoco);

    return $dadosAlmoco;
  }
}
