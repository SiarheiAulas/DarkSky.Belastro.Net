<?php
namespace App\Services;

/**
 Расчитывает расстояние между точками по формуле гаверсинуса
 */
class DistanceCalculator
{
	
	function calculate_distance($lat1, $lat2, $long1, $long2){
		
		$earth_radius = 6371; //км

		// перевод в радианы

		$lat1_rad = deg2rad($lat1);
		$lat2_rad = deg2rad($lat2);
		$long1_rad = deg2rad($long1);
		$long2_rad = deg2rad($long2);

		// вычисление разности координат

		$delta_lat = $lat2_rad - $lat1_rad;
		$delta_long = $long2_rad - $long1_rad;

		// d = 2 * R * arcsin(sqrt(sin²(Δφ/2) + cos(φ₁) * cos(φ₂) * sin²(Δλ/2)))

		$distance = 2*$earth_radius*asin(sqrt(sin($delta_lat / 2) ** 2 + cos($lat1_rad) * cos($lat2_rad) * sin($delta_long / 2) ** 2));

		// округление до 2 знаков после запятой

		$distance = round($distance , 2);

		return $distance;
	}
}