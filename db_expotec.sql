-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 07-Abr-2020 às 17:03
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.14

DROP DATABASE IF EXISTS DB_EXPOTEC;
CREATE DATABASE DB_EXPOTEC;

USE DB_EXPOTEC;

CREATE TABLE TB_DUELOS(
  DUE_CODIGO int(11) NOT NULL AUTO_INCREMENT,
  DUE_SAL_CODIGO int(11) NOT NULL,
  DUE_STATUS int(1) NOT NULL,
  PRIMARY KEY (`DUE_CODIGO`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

CREATE TABLE TB_SALAS(
  SAL_CODIGO int(11) NOT NULL AUTO_INCREMENT,
  SAL_NOME varchar(36) NOT NULL,
  SAL_FOTO varchar(50) NOT NULL,
  PRIMARY KEY (SAL_CODIGO)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
