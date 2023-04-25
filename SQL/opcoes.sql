CREATE TABLE Opcoes(
  idOpcao INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  idPergunta INT NOT NULL,
  descricao VARCHAR(100) NOT NULL,
  FOREIGN KEY (idPergunta) REFERENCES Perguntas (idPergunta)
);