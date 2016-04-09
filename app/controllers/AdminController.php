<?php
class AdminController extends BaseController{
  public function getDashboard(){
    return View::make('backend.administrator.index');
  }
}
