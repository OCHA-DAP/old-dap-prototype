<?php

class DAO {

  static function get_countries() {
    global $APP;
    $statement = $APP->pdo->prepare('select * from Regions order by regionid');
    $statement->execute();
    return $statement->fetchAll();
  }

  static function get_datasets() {
    global $APP;
    $statement = $APP->pdo->prepare('select * from Datasets order by dsid');
    $statement->execute();
    return $statement->fetchAll();
  }

  static function get_indicators() {
    global $APP;
    $statement = $APP->pdo->prepare('select * from Indicators order by indid');
    $statement->execute();
    return $statement->fetchAll();
  }

}