<?php
include_once(__DIR__ ."\..\models\ItemModel.php");

class ItemController {
  private $itemModel;

  public function __construct()
  {
    $this->itemModel = new ItemModel();
  }

  public function getItems() {
    $items = $this->itemModel->getAllItems();
    return $items;
  }
}