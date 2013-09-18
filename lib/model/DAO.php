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

  static function get_country_indicator($code, $indicator_code) {
    global $APP;
    $statement = $APP->pdo->prepare('select * from ValueView where region=? and indid=? order by period');
    $statement->execute(array($code, $indicator_code));
    return $statement->fetchAll();
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

  static function get_dataset($code) {
    global $APP;
    $statement = $APP->pdo->prepare('select * from Datasets where dsid=?');
    $statement->execute(array($code));
    return $statement->fetch();
  }

  static function get_dataset_indicators($code) {
    global $APP;
    $statement = $APP->pdo->prepare('select indid, indicator_name, count(dsid) as num from ValueView where dsid=? group by indid, indicator_name order by indicator_name');
    $statement->execute(array($code));
    return $statement->fetchAll();
  }

  static function get_indicators() {
    global $APP;
    $statement = $APP->pdo->prepare('select * from Indicators order by indid');
    $statement->execute();
    return $statement->fetchAll();
  }

  static function get_indicator($code) {
    global $APP;
    $statement = $APP->pdo->prepare('select * from Indicators where indid=?');
    $statement->execute(array($code));
    return $statement->fetch();
  }

}