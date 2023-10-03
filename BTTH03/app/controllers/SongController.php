<?php
require_once APP_ROOT.'/app/services/SongService.php';
class SongController{
    public function index(){

        $SongService = new SongService();
        $songs = $SongService->getAllSong();

        include APP_ROOT.'/app/views/home/index.php';
    }
}