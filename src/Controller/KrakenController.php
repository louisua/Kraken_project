<?php

namespace App\Controller;

use App\Repository\KrakenRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class KrakenController
{

    private $krakenRepository;

    public function __construct(KrakenRepository $krakenRepository)
    {
        $this->krakenRepository = $krakenRepository;
    }

    /**
     * @Route("/kraken", name="kraken_list", methods={"POST"})
     */
    public function addOrDeleteKraken(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        var_dump($request);
        var_dump($data);

        // check if we has id in request
        if(!empty($data) && property_exists($data, 'id')) {
            $id = $data['id'];

            // id is required and must be > 0
            if ($id < 1) {
                throw new NotFoundHttpException('Expecting required parameters!');
            }

            $this->krakenRepository->deleteKraken($id);

            return new JsonResponse(['status' => 'Kraken deleted!'], Response::HTTP_DELETED);

        } else {

            $name = $data['name'];
            $age = $data['age'];
            $size = $data['size'];
            $weight = $data['weight'];

            // name is required 
            if (empty($name)) {
                throw new NotFoundHttpException('Expecting required parameters!');
            }

            $this->krakenRepository->saveKraken($name, $age, $size, $weight);

            return new JsonResponse(['status' => 'Kraken created!'], Response::HTTP_CREATED);
        }
    }
}