<?php

class Produto
{


  // Construtor da classe Produto
  public function __construct(private ?int $id, private string $tipo, private string $nome, private string $descricao, private float $preco, private string $imagem = 'logo-serenatto.png')
  {
  }

  // Métodos getters e setters para as propriedades
  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getNome()
  {
    return $this->nome;
  }

  public function setNome($nome)
  {
    $this->nome = $nome;
  }

  public function getPreco()
  {
    return $this->preco;
  }

  public function getPrecoFormatado(): string
  {
    return 'R$ ' . number_format($this->preco, 2);
  }

  public function setPreco($preco)
  {
    $this->preco = $preco;
  }

  public function getTipo()
  {
    return $this->tipo;
  }

  public function setTipo($tipo)
  {
    $this->tipo = $tipo;
  }

  public function getDescricao()
  {
    return $this->descricao;
  }

  public function setDescricao($descricao)
  {
    $this->descricao = $descricao;
  }

  public function getImagem()
  {
    return $this->imagem;
  }

  public function getCaminhoImagem()
  {
    return 'img/' . $this->imagem;
  }

  public function setImagem($imagem)
  {
    $this->imagem = $imagem;
  }
}
