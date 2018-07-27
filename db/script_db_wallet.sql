DROP DATABASE `objetiveti`;
-- -----------------------------------------------------
-- Schema objetiveti
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `objetiveti` DEFAULT CHARACTER SET utf8 ;
USE `objetiveti` ;

-- -----------------------------------------------------
-- Table `objetiveti`.`banner`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `objetiveti`.`banner` (
  `idbanner` INT NOT NULL AUTO_INCREMENT,
  `ds_pre_titulo` VARCHAR(100) NOT NULL,
  `ds_titulo` VARCHAR(50) NOT NULL,
  `ds_caminho_img_banner` VARCHAR(255) NOT NULL,
  `ds_link_video` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idbanner`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `objetiveti`.`depoimento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `objetiveti`.`depoimento` (
  `iddepoimento` INT NOT NULL AUTO_INCREMENT,
  `ds_nome_entrevistado` VARCHAR(255) NOT NULL,
  `ds_depoimento` VARCHAR(300) NOT NULL,
  `ds_caminho_img_entrevistado` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`iddepoimento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `objetiveti`.`info_empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `objetiveti`.`info_empresa` (
  `idinfo_empresa` INT NOT NULL AUTO_INCREMENT,
  `ds_razao_social` VARCHAR(200) NOT NULL,
  `ds_nome_fantasia` VARCHAR(45) NOT NULL,
  `ds_endereco` VARCHAR(100) NOT NULL,
  `ds_num_endereco` VARCHAR(10) NOT NULL,
  `ds_complemento_endereco` VARCHAR(10) NULL,
  `ds_cep` VARCHAR(8) NOT NULL,
  `ds_bairro` VARCHAR(30) NOT NULL,
  `ds_municipio` VARCHAR(100) NOT NULL,
  `ds_estado` VARCHAR(2) NOT NULL,
  `ds_caminho_img_logo` VARCHAR(255) NOT NULL,
  `ds_site` VARCHAR(255) NOT NULL,
  `ds_email` VARCHAR(200) NOT NULL,
  `ds_ddd` VARCHAR(2) NOT NULL,
  `ds_telefone` VARCHAR(9) NOT NULL,
  PRIMARY KEY (`idinfo_empresa`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `objetiveti`.`faqs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `objetiveti`.`faqs` (
  `idfaqs` INT NOT NULL AUTO_INCREMENT,
  `ds_pergunta` VARCHAR(255) NOT NULL,
  `ds_resposta` VARCHAR(255) NOT NULL,
  `qt_select_util` INT NULL,
  `qt_select_inutil` INT NULL,
  PRIMARY KEY (`idfaqs`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `objetiveti`.`newsletter`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `objetiveti`.`newsletter` (
  `idnewsletter` INT NOT NULL AUTO_INCREMENT,
  `ds_email` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idnewsletter`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `objetiveti`.`tipo_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `objetiveti`.`tipo_usuario` (
  `idtipo_usuario` INT NOT NULL AUTO_INCREMENT,
  `ds_tipo_usuario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idtipo_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `objetiveti`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `objetiveti`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `ds_nome` VARCHAR(45) NOT NULL,
  `ds_login` VARCHAR(45) NOT NULL,
  `ds_senha` VARCHAR(15) NOT NULL,
  `ds_caminho_img` VARCHAR(100) NOT NULL,
  `tipo_usuario_idtipo_usuario` INT NOT NULL,
  PRIMARY KEY (`idusuario`),
  INDEX `fk_usuario_tipo_usuario_idx` (`tipo_usuario_idtipo_usuario` ASC),
  CONSTRAINT `fk_usuario_tipo_usuario`
    FOREIGN KEY (`tipo_usuario_idtipo_usuario`)
    REFERENCES `objetiveti`.`tipo_usuario` (`idtipo_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `objetiveti`.`pagina_principal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `objetiveti`.`pagina_principal` (
  `idpagina_principal` INT NOT NULL AUTO_INCREMENT,
  `ds_titulo` VARCHAR(100) NOT NULL,
  `ds_palavras_chaves` VARCHAR(2000) NOT NULL,
  PRIMARY KEY (`idpagina_principal`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `objetiveti`.`pagina_tipo_conta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `objetiveti`.`pagina_tipo_conta` (
  `idpagina_tipo_conta` INT NOT NULL AUTO_INCREMENT,
  `ds_titulo` VARCHAR(100) NOT NULL,
  `ds_palavras_chaves` VARCHAR(2000) NOT NULL,
  PRIMARY KEY (`idpagina_tipo_conta`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `objetiveti`.`pagina_faq`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `objetiveti`.`pagina_faq` (
  `idpagina_faq` INT NOT NULL AUTO_INCREMENT,
  `ds_titulo` VARCHAR(100) NOT NULL,
  `ds_palavras_chaves` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idpagina_faq`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `objetiveti`.`contatos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `objetiveti`.`contatos` (
  `idcontatos` INT NOT NULL AUTO_INCREMENT,
  `ds_telefone` VARCHAR(20) NOT NULL,
  `ds_whatsapp` VARCHAR(20) NOT NULL,
  `ds_email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcontatos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `objetiveti`.`redes_sociais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `objetiveti`.`redes_sociais` (
  `idredes_sociais` INT NOT NULL AUTO_INCREMENT,
  `ds_facebook` VARCHAR(255) NOT NULL,
  `ds_youtube` VARCHAR(255) NOT NULL,
  `ds_instagram` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idredes_sociais`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `objetiveti`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `objetiveti`.`categoria` (
  `idcategoria` INT NOT NULL,
  `ds_categoria` VARCHAR(100) NOT NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `objetiveti`.`post_blog`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `objetiveti`.`post_blog` (
  `idpost_blog` INT NOT NULL AUTO_INCREMENT,
  `ds_titulo` VARCHAR(255) NOT NULL,
  `ds_conteudo` TEXT NOT NULL,
  `ds_caminho_img_destaque` VARCHAR(255) NOT NULL,
  `ds_palavras_chaves` TEXT NOT NULL,
  `categoria_ds_categoria` VARCHAR(100) NOT NULL,
  `data_hora` DATETIME NOT NULL,
  PRIMARY KEY (`idpost_blog`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `objetiveti`.`pagina_blog`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `objetiveti`.`pagina_blog` (
  `idpagina_blog` INT NOT NULL AUTO_INCREMENT,
  `ds_titulo` VARCHAR(255) NOT NULL,
  `ds_palavras_chaves` VARCHAR(2000) NOT NULL,
  PRIMARY KEY (`idpagina_blog`))
ENGINE = InnoDB;