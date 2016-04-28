<?php

class LaporanController extends BaseController {
    public function getShowLaporan(){
        return View::make('frontend.laporan');
    }
}
