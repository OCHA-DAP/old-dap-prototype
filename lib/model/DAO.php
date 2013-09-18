<?php

class DAO {

  static function get_countries() {
    global $APP;
    $statement = $APP->pdo->prepare('select * from Regions order by regionid');
    $statement->execute();
    return $statement->fetchAll();
  }

  static function get_country($code) {
    global $APP;
    $statement = $APP->pdo->prepare('select * from Regions where regionid=?');
    $statement->execute(array($code));
    return $statement->fetch();
  }

  static function get_country_indicators($code) {
    global $APP;
    $statement = $APP->pdo->prepare('select indid, indicator_name, count(indid) as num from ValueView where region=? group by indid, indicator_name order by indicator_name');
    $statement->execute(array($code));
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