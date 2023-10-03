<?php
require_once APP_ROOT.'/app/services/CategoryService.php';
class CategoryController{
    public function index(){

        $CategoryService = new CategoryService();
        $categories = $CategoryService->getAllCategory();

        include APP_ROOT.'/app/views/home/index.php';
    }
}