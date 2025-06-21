<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Weather extends CI_Controller
{

    public function index()
    {
        // If form submitted, get city name
        $city = $this->input->get('city');
        if (empty($city)) {
            $city = 'Mumbai';
        }


        // API Key (from OpenWeatherMap)
        $apiKey = '06dd13c229393dc856b08cb4c31bb2cd';

        // Build API URL
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

        // Initialize cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL request
        $response = curl_exec($ch);

        // Check for errors
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            $data['error'] = 'Curl error: ' . $error_msg;
            $data['weather'] = null;
        } else {
            $data['error'] = null;
            $data['weather'] = json_decode($response, true);
        }

        // Close cURL
        curl_close($ch);

        // Pass city name also to view
        $data['city'] = $city;

        // Load view
        $this->load->view('weather_view', $data);
    }
}
