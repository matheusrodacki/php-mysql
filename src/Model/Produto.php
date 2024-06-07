<?php

class Produto
{
  // Propriedades da classe Produto
  private $id;
  private $tipo;
  private $nome;
  private $descricao;
  private $imagem;
  private $preco;

  // Construtor da classe Produto
  public function __construct($id, $tipo, $nome, $descricao, $imagem, $preco)
  {
    $this->id = $id;
    $this->tipo = $tipo;
    $this->nome = $nome;
    $this->descricao = $descricao;
    $this->imagem = $imagem;
    $this->preco = $preco;
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

  public function setImagem($imagem)
  {
    $this->imagem = $imagem;
  }
}