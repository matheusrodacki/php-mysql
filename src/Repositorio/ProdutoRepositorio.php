<?php


class ProdutoRepositorio
{

  public function __construct(private PDO $pdo)
  {
  }

  private function formarObjeto($dados)
  {
    return new Produto(
      $dados['id'],
      $dados['tipo'],
      $dados['nome'],
      $dados['descricao'],
      $dados['imagem'],
      $dados['preco']
    );
  }

  public function opcoesCafe(): array
  {
    $sql = "SELECT * FROM produtos WHERE tipo = 'Cafe' ORDER BY preco";
    $stmt = $this->pdo->query($sql);
    $produtosCafe = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $dadosCafe = array_map(function ($cafe) {
      return $this->formarObjeto($cafe);
    }, $produtosCafe);

    return $dadosCafe;
  }

  public function opcoesAlmoco(): array
  {
    $sql = "SELECT * FROM produtos WHERE tipo = 'Almoço' ORDER BY preco";
    $stmt = $this->pdo->query($sql);
    $produtosAlmoco = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $dadosAlmoco = array_map(function ($almoco) {
      return $this->formarObjeto($almoco);
    }, $produtosAlmoco);

    return $dadosAlmoco;
  }

  public function buncarTodos(): array
  {
    $sql = "SELECT * FROM produtos ORDER BY preco";
    $stmt = $this->pdo->query($sql);
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $dadosProdutos = array_map(function ($produto) {
      return $this->formarObjeto($produto);
    }, $produtos);

    return $dadosProdutos;
  }

  public function deletar(int $id): void
  {
    $sql = "DELETE FROM produtos WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }
}
