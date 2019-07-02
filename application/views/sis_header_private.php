<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
  <html lang="es" class="no-js">
  <head>
    <!-- Mobile Specific Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
      <!--
      CSS
      ============================================= -->
      <link rel="stylesheet" href="<?= base_url('assets/css/panel.css');?>">
        <script type="text/javascript">
     
        </script>
    </head>
    <body>
        <header>
          <div class="container">
              <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="#"><img style="margin-top: -12px;" src="<?= base_url('assets/img/logo2.png');?>" alt="" title="" /></a>
                  </div>
                  <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                      <li class="active"><a href="#">Home</a></li>
                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Vehículos <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="<?= base_url('Movil/mostrar');?>">Moviles</a></li>
                          <li><a href="<?= base_url('Chofer/mostrar');?>">Choferes</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Personas <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Clientes</a></li>
                          <li><a href="#">Empresas</a></li>
                          <li><a href="#">Convenios</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Documentos <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Talonarios</a></li>
                          <li><a href="#">Vales</a></li>
                          <li><a href="#">Reportes</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Administración <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Balance</a></li>
                          <li><a href="#">Pagos</a></li>
                          <li><a href="#">Consulta</a></li>
                        </ul>
                      </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
                      <li><a href="<?= base_url('Usuarios/logout') ?>"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a></li>
                    </ul>
                  </div>
                </div>
              </nav>
            </div>
        </header>