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
      $dados['preco'],
      $dados['imagem']
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

  public function buscarTodos(): array
  {
    $sql = "SELECT * FROM produtos ORDER BY preco";
    $stmt = $this->pdo->query($sql);
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $dadosProdutos = array_map(function ($produto) {
      return $this->formarObjeto($produto);
    }, $produtos);

    return $dadosProdutos;
  }

  public function buscarProduto(int $id): Produto
  {
    $sql = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    return $this->formarObjeto($produto);
  }

  public function deletar(int $id): void
  {
    $sql = "DELETE FROM produtos WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }

  public function salvar(Produto $produto)
  {
    if ($produto->getId() === null) {
      $sql = "INSERT INTO produtos (tipo, nome, descricao, preco, imagem) VALUES (:tipo, :nome, :descricao, :preco, :imagem)";
    } else {
      $sql = "UPDATE produtos SET tipo = :tipo, nome = :nome, descricao = :descricao, preco = :preco, imagem = :imagem WHERE id = :id";
    }

    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':tipo', $produto->getTipo(), PDO::PARAM_STR);
    $stmt->bindValue(':nome', $produto->getNome(), PDO::PARAM_STR);
    $stmt->bindValue(':descricao', $produto->getDescricao(), PDO::PARAM_STR);
    $stmt->bindValue(':preco', $produto->getPreco(), PDO::PARAM_STR);
    $stmt->bindValue(':imagem', $produto->getImagem(), PDO::PARAM_STR);

    if ($produto->getId() !== null) {
      $stmt->bindValue(':id', $produto->getId(), PDO::PARAM_INT);
    }

    $stmt->execute();
  }
}
