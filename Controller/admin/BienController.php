<?php
/**
 * Summary of namespace Controller
 */
namespace Controller\Admin;

use Model\Entity\Bien;
use Service\ImageHandler;
use Form\BienHandleRequest;
use Controller\BaseController;
use Model\Repository\BienRepository;

/**
 * Summary of ProductController
 */
class ProductController extends BaseController
{
    private BienRepository $bienRepository;
    private BienHandleRequest $formBien;
    private Bien $bien;

    public function __construct()
    {
        $this->bienRepository = new BienRepository;
        $this->formBien = new BienHandleRequest;
        $this->bien = new Bien;
    }

    public function list(Bien $bien)
    {
        $products = $this->bienRepository->findAll($bien);

        $this->render("admin/biens/biens.html.php", [
            "h1" => "Liste des produits",
            "products" => $products
        ]);
    }

    public function new()
    {
        $bien = $this->bien;

        $this->formBien->handleInsertFormBien($bien);

        if ($this->formBien->isSubmitted() && $this->formBien->isValid()) {

            ImageHandler::handlePhoto($bien);

            $this->bienRepository->insertBien($bien);

            return redirection(addLink("home"));
        }

        $errors = $this->formBien->getErrorsForm();

        return $this->render("biens/biens.html.php", [
            "h1" => "Ajouter une nouvelle propriété",
            "biens" => $bien,
            "errors" => $errors,
        ]);
    }

    /**
     * Summary of edit
     * @param mixed $id
     * @return void
     */
    public function edit($id)
    {
        if (!empty($id) && is_numeric($id)) {

            /**
             * @var Bien
             */
            $product = $this->bien;

            $this->formBien->handleEditForm($product);

            if ($this->formBien->isSubmitted() && $this->formBien->isValid()) {
                $this->bienRepository->updateBien($product);
                return redirection(addLink("home"));
            }

            $errors = $this->formBien->getErrorsForm();
            return $this->render("product/formBien.html.php", [
                "h1" => "Update de l'utilisateur n° $id",
                "product" => $product,
                "errors" => $errors
            ]);
        }
        return redirection("/errors/404.php");
    }

    public function delete($id)
    {
        if (!empty($id) && $id > 0) {
            if (is_numeric($id)) {

                $product = $this->bien;
            } else {
                $this->setMessage("danger", "ERREUR 404 : la page demandé n'existe pas");
            }
        } else {
            $this->setMessage("danger", "ERREUR 404 : la page demandé n'existe pas");
        }

        $this->render("product/formBien.html.php", [
            "h1" => "Suppresion du produit n°$id ?",
            "product" => $product,
            "mode" => "suppression"
        ]);
    }
}