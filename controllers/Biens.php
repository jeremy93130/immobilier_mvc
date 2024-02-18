<?php

class Biens extends Controller
{
    public function index()
    {
        // On charge le model Bien
        $this->loadModel('Bien');

        $biens = $this->Bien->getAll();

        $this->render('index',['biens'=>$biens]);
    }

    public function etages($id,$slug){
    }
}
