<?php

namespace App\Controllers;

use App\Models\CarModel;
use App\Models\QuoteModel;
use CodeIgniter\Controller;

class CarController extends Controller {
  protected $carModel;
  protected $quoteModel;

  public function __construct(){
    $this->carModel = new CarModel();
    $this->quoteModel = new QuoteModel();
  }

  public function about(){
    $this->fetchCars();
    $data['cars'] = $this->carModel->findAll();
    return view('about', );
  }

  public function fetchCars(){
    $apiUrl = 'https://app.dev.aws.dinggo.com.au/phptest/cars';

    $creds = [
      'username' => 'shreejairaj@gmail.com',
      'key' => 'shreejairaj'
    ];

    $client = \Config\Services::curlrequest();

    try{
      $response = $client->post($apiUrl, [
        'json' => $creds,
        'headers' => [
          'Accept' => 'application/json',
        ],
        'timeout' => 30 
      ]);

      if ($response->getStatusCode() !== 200){
        return redirect()->back()->with('error', 'Failed to fetch data fromn API');
      }

      $data = json_decode($response->getBody(), true);

      if(isset($data['success']) && $data['success'] === 'ok' && isset($data['cars'])){
        foreach ($data['cars'] as $car){

          if(empty($car['vin'])){
            continue; // Skip record if VIN is missing
          }

          $carData = (object) [
            'license_plate' => $car['licensePlate'] ?? null,
            'license_state' => $car['licenseState'] ?? null,
            'vin'=> $car['vin'] ?? null,
            'year'=> $car['year'] ?? null,
            'colour'=> $car['colour'] ?? null,
            'make' => $car['make'] ?? null,
            'model' => $car['model'] ?? null,
            'created_at'    => (string) date('Y-m-d H:i:s'),
          ];

          // Check if VIN already exists
           $existingCar = $this->carModel->where('vin', $car['vin'])->first();

          if ($existingCar){
            $this->carModel->update($existingCar['id'], $carData);
          } else {
            // $this->carModel->insert($carData );
            $this->carModel->set($carData);
          }
          // $this->carModel->insert(
          //   // ['vin' => $car['vin']],
          //   $carData
          // );
        
        }
        return redirect()->to('/about')
          ->with('message','Cars data fetch and saved successfully!')
          ->with('data', $data['cars']);
      } else {
        $errorMessage = $data['message'] ?? 'Unknown error occurred';
        return redirect()->back()->with('error', $errorMessage);
      }
    } catch (\Exception $e) {
      return redirect()->back()->with('error', 'An error occurred: '.$e->getMessage());
    }

  }

  // Display cars
  public function index(){
    $data['cars'] = $this->carModel->findAll();
    return view('/app/Views/cars/index.php', $data);
  }

  // Display quotes
  public function viewQuotes($car_id){
    $data['car'] = $this->carModel->where('car_id', $car_id)->first();
    $data['quotes'] = $this->quoteModel->where('car_id', $car_id)->findAll();
    return view('quotes/index', $data);
  }
}

